<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 170; $i++) { 
            $email = "2005551";
            if($i < 10){
                $record          = User::firstOrNew(['email' => $email . "00".$i]);
                $record->password = bcrypt($email . "00".$i);
                $record->save();
            }

            if($i < 100){
                $record          = User::firstOrNew(['email' => $email . "0".$i]);
                $record->password = bcrypt($email . "0".$i);
                $record->save();
            }

            if($i < 1000){
                $record          = User::firstOrNew(['email' => $email . $i]);
                $record->password = bcrypt($email . $i);
                $record->save();
            }
            
        }

        for ($i=0; $i < 170; $i++) { 
            $email = "1905551";
            if($i < 10){
                $record          = User::firstOrNew(['email' => $email . "00".$i]);
                $record->password = bcrypt($email . "00".$i);
                $record->save();
            }

            if($i < 100){
                $record          = User::firstOrNew(['email' => $email . "0".$i]);
                $record->password = bcrypt($email . "0".$i);
                $record->save();
            }

            if($i < 1000){
                $record          = User::firstOrNew(['email' => $email . $i]);
                $record->password = bcrypt($email . $i);
                $record->save();
            }
            
        }

        for ($i=0; $i < 170; $i++) { 
            $email = "2105551";
            if($i < 10){
                $record          = User::firstOrNew(['email' => $email . "00".$i]);
                $record->password = bcrypt($email . "00".$i);
                $record->save();
            }

            if($i < 100){
                $record          = User::firstOrNew(['email' => $email . "0".$i]);
                $record->password = bcrypt($email . "0".$i);
                $record->save();
            }

            if($i < 1000){
                $record          = User::firstOrNew(['email' => $email . $i]);
                $record->password = bcrypt($email .$i);
                $record->save();
            }
            
        }
    }
}
