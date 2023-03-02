<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Draw;
use App\Models\User;
use App\Models\Group;
use App\Services\UserService;
use App\Services\GroupService;
use App\Services\DrawService;

class DrawController extends Controller
{
    /**
     * Display a dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DrawService $drawService)
    {    
        $peopleToDraw = $drawService->showPeopleToDraw();
        $getPeopleWhoCanDraw = $drawService->getPeopleWhoCanDraw();
        
        return view('draw.index', [
            'people' => $peopleToDraw,
            'peopleWhoCanDraw' => $getPeopleWhoCanDraw,
        ]);
    }

    /**
     * Show the result of the draw to individual people.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DrawService $drawService, $id)
    {    
        $user = $drawService->showResultToIndividualPerson($id);

        if(empty($user)){
            return redirect()->back()
            ->with('alert', 'Już losowałeś!');
        } else {
            return redirect()->back()
                ->with('message', $user->firstName);
        }  
    }
    
    /**
     * Randomly select people.
     *
     * @return \Illuminate\Http\Response
     */
    public function draw(DrawService $drawService)
    {    
        $drawService->createDraws();
        
        return redirect('/dashboard')
            ->with('alert', 'The draw created successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function reset(DrawService $drawService)
    {
        $drawService->resetDraws();

        return redirect('/dashboard')
            ->with('alert', 'The group was successfully reset.');
    }

    /**
     * Show result for active group
     *
     * @return \Illuminate\Http\Response
     */
    public function showResult(DrawService $drawService, $id = null)
    {
        $getOldDraws = $drawService->getOldDraws();

        if(isset($id)){
            //moving an element of an array to the beginning
            $found_key = array_search($id, array_column($getOldDraws, 'id_draw'));
            $getDraw = $getOldDraws[$found_key];
            unset($getOldDraws[$found_key]);
            array_unshift($getOldDraws, $getDraw);

            //get draw results
            $showResult = $drawService->showResults($id);
        } elseif(isset($getOldDraws[0]['id_draw'])){
            $showResult = $drawService->showResults($getOldDraws[0]['id_draw']);
        } else {
            $showResult = [];
        }
        
        return view('draw.show', [
            'oldDraws' => $getOldDraws,
            'result' => $showResult,
        ]);
    }
}