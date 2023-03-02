<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\DrawService;
use App\Services\UserService;
use App\Models\Draw;

class DrawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(DrawService $drawService, UserService $userService)
    {
        $isActive = "N";
        $userID = [
            'Józef' => $userService->getID('Józef'),
            'Maria' => $userService->getID('Maria'),
            'Jolanta' => $userService->getID('Jolanta'),
            'Krzysztof' => $userService->getID('Krzysztof'),
            'Mateusz' => $userService->getID('Mateusz'),
            'Bartłomiej' => $userService->getID('Bartłomiej'),
            'Magdalena' => $userService->getID('Magdalena')
        ];
        $groupID = $drawService->getIdGroup();
        $dateOfDraw = ['2020-09-27', '2021-10-31', '2022-10-30'];
        $idDraw = $drawService->idDraw();

        $draws = [
            [
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $userID['Józef'],
                'selected_person'=> $userID['Jolanta'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[0]
            ],
            [
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $userID['Maria'],
                'selected_person'=> $userID['Józef'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[0]
            ],
            [
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $userID['Jolanta'],
                'selected_person'=> $userID['Krzysztof'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[0]
            ],
            [
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $userID['Krzysztof'],
                'selected_person'=> $userID['Bartłomiej'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[0]
            ],
            [
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $userID['Mateusz'],
                'selected_person'=> $userID['Magdalena'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[0]
            ],
            [
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $userID['Bartłomiej'],
                'selected_person'=> $userID['Maria'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[0]
            ],
            [
                'id_draw' => $idDraw,
                'is_active' => $isActive,
                'person_drawing' => $userID['Magdalena'],
                'selected_person'=> $userID['Mateusz'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[0]
            ],
            [
                'id_draw' => $idDraw +1,
                'is_active' => $isActive,
                'person_drawing' => $userID['Józef'],
                'selected_person'=> $userID['Krzysztof'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[1]
            ],
            [
                'id_draw' => $idDraw +1,
                'is_active' => $isActive,
                'person_drawing' => $userID['Maria'],
                'selected_person'=> $userID['Jolanta'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[1]
            ],
            [
                'id_draw' => $idDraw +1,
                'is_active' => $isActive,
                'person_drawing' => $userID['Jolanta'],
                'selected_person'=> $userID['Mateusz'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[1]
            ],
            [
                'id_draw' => $idDraw +1,
                'is_active' => $isActive,
                'person_drawing' => $userID['Krzysztof'],
                'selected_person'=> $userID['Józef'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[1]
            ],
            [
                'id_draw' => $idDraw +1,
                'is_active' => $isActive,
                'person_drawing' => $userID['Mateusz'],
                'selected_person'=> $userID['Bartłomiej'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[1]
            ],
            [
                'id_draw' => $idDraw +1,
                'is_active' => $isActive,
                'person_drawing' => $userID['Bartłomiej'],
                'selected_person'=> $userID['Magdalena'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[1]
            ],
            [
                'id_draw' => $idDraw +1,
                'is_active' => $isActive,
                'person_drawing' => $userID['Magdalena'],
                'selected_person'=> $userID['Maria'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[1]
            ],
            [
                'id_draw' => $idDraw +2,
                'is_active' => $isActive,
                'person_drawing' => $userID['Józef'],
                'selected_person'=> $userID['Mateusz'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[2]
            ],
            [
                'id_draw' => $idDraw +2,
                'is_active' => $isActive,
                'person_drawing' => $userID['Maria'],
                'selected_person'=> $userID['Magdalena'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[2]
            ],
            [
                'id_draw' => $idDraw +2,
                'is_active' => $isActive,
                'person_drawing' => $userID['Jolanta'],
                'selected_person'=> $userID['Bartłomiej'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[2]
            ],
            [
                'id_draw' => $idDraw +2,
                'is_active' => $isActive,
                'person_drawing' => $userID['Krzysztof'],
                'selected_person'=> $userID['Maria'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[2]
            ],
            [
                'id_draw' => $idDraw +2,
                'is_active' => $isActive,
                'person_drawing' => $userID['Mateusz'],
                'selected_person'=> $userID['Józef'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[2]
            ],
            [
                'id_draw' => $idDraw +2,
                'is_active' => $isActive,
                'person_drawing' => $userID['Bartłomiej'],
                'selected_person'=> $userID['Jolanta'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[2]
            ],
            [
                'id_draw' => $idDraw +2,
                'is_active' => $isActive,
                'person_drawing' => $userID['Magdalena'],
                'selected_person'=> $userID['Krzysztof'],
                'group_id' => $groupID,
                'date_of_draw' => $dateOfDraw[2]
            ]
        ];
        /*
        27-09-2020
        [
            'Józef' => 'Jolanta',
            'Maria' => 'Józef',
            'Jolanta' => 'Krzysztof',
            'Krzysztof' => 'Bartłomiej',
            'Mateusz' => 'Magdalena',
            'Bartłomiej' => 'Maria',
            'Magdalena' => 'Mateusz'
        ]
        31-10-2021
        [
            'Józef' => 'Krzysztof',
            'Maria' => 'Jolanta',
            'Jolanta' => 'Mateusz',
            'Krzysztof' => 'Józef',
            'Mateusz' => 'Bartłomiej',
            'Bartłomiej' => 'Magdalena',
            'Magdalena' => 'Maria'
        ]
        30-10-2022
        [
            'Józef' => 'Mateusz',
            'Maria' => 'Magdalena',
            'Jolanta' => 'Bartłomiej',
            'Krzysztof' => 'Maria',
            'Mateusz' => 'Józef',
            'Bartłomiej' => 'Jolanta'
            'Magdalena' => 'Krzysztof'
        ]
        */
        foreach($draws as $draw){
            Draw::create([
                'id_draw' => $draw['id_draw'],
                'is_active' => $draw['is_active'],
                'person_drawing' => $draw['person_drawing'],
                'selected_person'=> $draw['selected_person'],
                'group_id' => $draw['group_id'],
                'date_of_draw' => $draw['date_of_draw']
            ]);
        }
    }
}
