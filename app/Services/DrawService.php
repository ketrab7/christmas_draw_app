<?php

namespace App\Services;
 
use App\Models\Draw;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class DrawService
{
    //wygenerowanie id losowania
    public function idDraw()
    {
        $idLastDraw = Draw::select('id_draw')->distinct()->orderByDesc('id_draw')->limit(1)->get();

        if (!isset($idLastDraw[0]->id_draw)) {
            $idDraw = 1;
        } else {
            $idDraw = (int)$idLastDraw[0]->id_draw + 1;
        }

        return $idDraw;
    }

    //pobranie id aktywnej grupy
    public function getIdGroup($isActive = 'Y')
    {
        $idGroup = Group::where('isActive', $isActive)->first()->id;

        return $idGroup;
    }

    //pobranie ludzi którzy należą do aktywnej grupy
    public function getPeopleToDraw()
    {
        $isActive = $this->getIdGroup();
        $sql = "SELECT users.id FROM users 
                INNER JOIN group_user ON users.id = group_user.user_id
                WHERE group_user.group_id = ".$isActive;
        
        $users = DB::select($sql);
        
        return $users;
    }

    //losowanie
    public function drawPeople()
    {
        $personDrawing = $selectedPerson = $this->getPeopleToDraw();
        $result = [];

        if(count($personDrawing) > 1){
            shuffle($selectedPerson);
            $i = 0;
    
            //check shuffle, add person and selected person to result
            do {
                if($personDrawing[$i]->id == $selectedPerson[$i]->id){
                    shuffle($selectedPerson);
                    $i = 0;
                    unset($result);
                } else { 
                    $result[] = [
                        $personDrawing[$i]->id,
                        $selectedPerson[$i]->id
                    ];
                    $i++;
                }
            } while($i < count($personDrawing));
        }

        return $result;
    }

    //dodanie losowania do bazy 
    //method: draw
    public function createDraws()
    {
        $isActive = "Y";
        $drawPeople = $this->drawPeople();
        $idGroup = $this->getIdGroup();
        $dateOfDraw = date('Y-m-d');
        $idDraw = $this->idDraw();

        //resetowanie
        $this->resetDraws();
        
        foreach($drawPeople as $drawPerson){
            $createDraws[] = Draw::create([
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $drawPerson[0],
                'selected_person'=> $drawPerson[1],
                'group_id' => $idGroup,
                'date_of_draw' => $dateOfDraw
            ]);
        }

        if(!isset($createDraws)){
            $createDraws = [];
        }

        return $createDraws;
    }

    //resetowanie losowania
    //method: reset
    public function resetDraws()
    {
        $idActiveGroup = $this->getIdGroup();

        Draw::where('is_active', 'Y')
            ->where('group_id', $idActiveGroup)
            ->update(['is_active' => 'N']);
    }

    //funkcja zmieniająca isASctive na N dla poszczególnego ID osoby losującej
    public function changeActivePersonToNo($idPersonDrawing)
    {
        Draw::find($idPersonDrawing)
            ->update(['is_active' => 'N']);
    }

    //zwracam tabele z ID osób do losowania
    //method: index
    public function showPeopleToDraw()
    {
        $idPeopleToDraw = $this->getPeopleToDraw();
        
        foreach($idPeopleToDraw as $person){
            $id[] =  $person->id;
        }

        if(!isset($id)){
            $peopleToDraw = [];
        } else {
            $peopleToDraw = User::find($id);
        }
        
        return $peopleToDraw;
    }

    //zwracam wylosowaną osobę i zmieniam is_active na N
    //method: show
    public function showResultToIndividualPerson($id)
    {
        $idActiveGroup = $this->getIdGroup();

        $selectedPerson = Draw::select('id', 'selected_person')
            ->where('is_active', 'Y')
            ->where('group_id', $idActiveGroup)
            ->where('person_drawing', $id)->get();

        if(isset($selectedPerson[0]->selected_person)){
            $user = User::find($selectedPerson[0]->selected_person);
            $this->changeActivePersonToNo($selectedPerson[0]->id);
        } else {
            $user = [];
        }

        return $user;
    }

    //pobieram wszystkie idDraw losowania i ich daty dla aktywnej grupy w kolejności malejącej
    //method: showResult
    public function getOldDraws()
    {
        $idActiveGroup = $this->getIdGroup();
        $draws = [];

        $getOldDraws = Draw::select('id_draw', 'date_of_draw')
            ->distinct()
            ->where('group_id', $idActiveGroup)
            ->orderByDesc('id_draw')->get() ?? [];

        foreach ($getOldDraws as $getOldDraw){
            $draws[] = [
                'id_draw' => $getOldDraw->id_draw,
                'date_of_draw' => $getOldDraw->date_of_draw,
            ];
        }

        return $draws;
    }

    //zwracam losowanie na podstawie idlosowania
    //method: showResult
    public function showResults($idDraw)
    {
        $sql = "SELECT draws.id, id_draw, date_of_draw 
            ,pd.firstName AS person_drawing_name 
            ,sp.firstName AS selected_person_name 
            ,is_active FROM draws
            LEFT JOIN users AS pd ON draws.person_drawing = pd.id
            LEFT JOIN users AS sp ON draws.selected_person = sp.id
            WHERE draws.id_draw = ".$idDraw;
        
        $showResults = DB::select($sql) ?? [];

        return $showResults;
    }

    //pobranie ID ludzi którzy mogą jeszcze losować
    //method: index
    public function getPeopleWhoCanDraw()
    {
        $isActive = $this->getIdGroup();
        $sql = "SELECT users.id 
            FROM users 
            INNER JOIN group_user ON users.id = group_user.user_id 
            INNER JOIN draws ON users.id = draws.person_drawing 
            WHERE draws.is_active = 'Y' 
            AND group_user.group_id = ".$isActive;
        
        $users = DB::select($sql);
        
        foreach($users as $user){
            $id[] =  $user->id;
        }
        if(!isset($id)){
            $id = [];
        }

        return $id;
    }
} 