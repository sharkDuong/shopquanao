<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('profiles')->truncate();

        $users = User::all();

        $data = [];

        foreach ($users as $user) {
            $data[] = [
                'user_id' => $user->id,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
            ];
        }

        DB::table('profiles')->insert($data);
    }
}
