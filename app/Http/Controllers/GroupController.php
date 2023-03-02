<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGroupRequest;
use App\Services\GroupService;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GroupService $groupService)
    {
        return view('group.index', [
            'groups' => $groupService->getGroups(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request, GroupService $groupService)
    {
        $groupService->createGroup($request);

        return redirect()->route('group.index')
            ->with('alert', 'The group created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('group.edit', [
            'group' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroupRequest $request, Group $group, GroupService $groupService)
    {
        $groupService->updateGroup($request, $group);

        return redirect()->route('group.index')
            ->with('alert', 'The group was successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('group.index')
            ->with('alert', 'The group delete successfully.');
    }

    /**
     * Relogation to another group.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function relog($id, GroupService $groupService)
    {
        $groupService->relogGroup($id);
        
        return redirect()->route('group.index')
            ->with('alert', 'The group relog successfully.');
    }
}