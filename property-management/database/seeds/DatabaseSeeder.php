<?php

use Illuminate\Database\Seeder;
use App\Room;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //rooms table seeder will only run if rooms table is empty
        $roomlist = Room::all();

        if($roomlist->count() == 0) {
            //seed first-floor rooms
            for ($i=101; $i <= 118 ; $i++) { 
                if($i % 2 == 0) {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'Two Queen'
                    ]);
                } else if($i <= 111) {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'Queen'
                    ]);
                } else {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'King'
                    ]);
                }
            }

            //seed second-floor rooms
            for ($i=201; $i <= 218 ; $i++) { 
                if($i % 2 == 0) {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'Two Queen'
                    ]);
                } else if($i <= 111) {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'Queen'
                    ]);
                } else {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'King'
                    ]);
                }
            }
            //seed third-floor rooms/suites
            for ($i=301; $i <= 314 ; $i++) { 
                if($i >= 310) {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'Exec Suite'
                    ]);
                } else if($i % 2 == 0) {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'King'
                    ]);
                } else {
                    DB::table('rooms')->insert([
                        'room_number' => strval($i),
                        'room_type' => 'Queen'
                    ]);
                }
            }
        }   
    }
}
