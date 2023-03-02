<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\DrawService;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(DrawService $drawService)
    {
        $groupID = $drawService->getIdGroup();
        $users = [
            [
                'firstName' => 'Józef',
                'surname' => '',
                'email' => ''
            ],
            [
                'firstName' => 'Maria',
                'surname' => '',
                'email' => ''
            ],
            [
                'firstName' => 'Jolanta',
                'surname' => '',
                'email' => ''
            ],
            [
                'firstName' => 'Krzysztof',
                'surname' => '',
                'email' => ''
            ],
            [
                'firstName' => 'Mateusz',
                'surname' => '',
                'email' => ''
            ],
            [
                'firstName' => 'Bartłomiej',
                'surname' => '',
                'email' => ''
            ],
            [
                'firstName' => 'Magdalena',
                'surname' => '',
                'email' => ''
            ]
        ];

        foreach($users as $user){
            $id = User::create([
                'firstName' => $user['firstName'],
                'surname' => $user['surname'],
                'email' => $user['email'],
            ]);

            $id->groups()->attach($groupID);
        }
    }
}
