<?php

namespace App\Services;
 
use App\Models\Group;
use Illuminate\Http\Request;
 
class GroupService
{
    public function getGroups()
    {
        $groups = Group::select('id', 'name', 'description', 'isActive')
            ->paginate(5) ?? [];

        return $groups;
    }
    
    public function createGroup(Request $request): Group
    {
        if($request->isActive == 'Y'){
            $this->changeActiveToNo();
        }

        $group = Group::create([
            'name' => $request->name, 
            'description' => $request->description, 
            'isActive' => $request->isActive,
        ]);

        return $group;  
    }

    public function updateGroup(Request $request, Group $group): Group
    {
        //zmieniam status wszystkich grup na nieaktywny
        if($request->isActive == 'Y'){
            $this->changeActiveToNo();
        }

        $group->name = $request->name;
        $group->description = $request->description;
        $group->isActive = $request->isActive;
        $group->save();

        return $group;
    }

    public function relogGroup($id)
    {
        $this->changeActiveToNo();

        Group::where('id', $id)->update(['isActive' => 'Y']);
    }

    public function changeActiveToNo()
    {
        Group::where('isActive', 'Y')->update(['isActive' => 'N']);
    }

    public function getAllGroups()
    {
        $groups = Group::select('id', 'name')->get();

        return $groups;
    }
} 