<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use App\Services\GroupService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $userService)
    {
        $users = $userService->getUsers();

        return view('user.index', [
            'users' => $users,
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GroupService $groupService)
    {
        $groups = $groupService->getAllGroups();
    
        return view('user.create', [
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, UserService $userService)
    {        
        $userService->createUser($request);
        
        return redirect()->route('user.index')
            ->with('alert', 'The user created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, GroupService $groupService, UserService $userService)
    {
        $groups = $groupService->getAllGroups();
        $checked = $userService->isChecked($groups, $user);

        return view('user.edit', [
            'user' => $user,
            'groups' => $groups,
            'checked' => $checked,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user, UserService $userService)
    {
        $userService->updateUser($request, $user);

        return redirect()->route('user.index')
            ->with('alert', 'The user was successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('user.index')
            ->with('alert', 'The user delete successfully.');
    }
}//https://www.itsolutionstuff.com/post/laravel-9-mail-laravel-9-send-email-tutorialexample.html