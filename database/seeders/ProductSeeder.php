<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('products')->truncate();

       // $users = User::all()->pluck('id');

        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'user_id' =>1,
                'name' => $faker->name,
                'code' => Str::random(3),
                'price' => rand(100, 200),
                'quantity' => rand(1, 200),
                'image' => 'product' . rand(7, 12) . '.jpg',
            ];
        }

        DB::table('products')->insert($data);
    }
}
