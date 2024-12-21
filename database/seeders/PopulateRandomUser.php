<?php

namespace Database\Seeders;

use Core\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PopulateRandomUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://randomuser.me/api/')->json();

        $randomUserData = $response['results'][0];

        $user = User::create([
            'name' => $randomUserData['name']['first'],
            'email' => $randomUserData['email'],
            'password' => Hash::make($randomUserData['login']['password']),
        ]);

        dump($user->toArray());
        dump('user created by external api');
    }
}
