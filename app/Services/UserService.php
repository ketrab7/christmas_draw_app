<?php

namespace App\Services;
 
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
 
class UserService
{
    public function getUsers()
    {
        $users = User::select('id','firstName','surname','email')
            ->paginate(10) ?? [];

        return $users;
    }
    
    public function createUser(Request $request): User
    {
        $user = User::create([
            'firstName' => $request->firstName,
            'surname' => $request->surname,
            'email' => $request->email,
        ]);

        $groups = Group::find($request->groups);
        //dodanie grup do tabeli many to many
        $user->groups()->attach($groups);

        return $user;  
    }

    public function updateUser(Request $request, User $user): User
    {
        $user->firstName = $request->firstName;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->groups()->sync($request->groups);//aktualizacja zaznaczonych grup w many to many
        $user->save();

        return $user;
    }
    
    //która grupa jest zaznaczona na karcie edycji użytkownika
    public function isChecked($groups = [],User $user)
    {
        $checked = [];
        foreach($groups as $group){
            foreach($user->groups as $userGroup){
                if($userGroup->id == $group->id){
                    $checked[$group->id] = "true";
                    break;
                } else {
                    $checked[$group->id] = "false"; 
                }
            }
        }
        if(empty($checked)){
            foreach($groups as $group){
                $checked[$group->id] = "false"; 
            }
        }
        return $checked;
    }

    //pobranie id użytkownika
    public function getID($name)
    {
        $user = User::where('firstName', $name)->get();
        return $user[0]->id;
    }
}