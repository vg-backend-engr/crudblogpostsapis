<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $randomNumber = random_int(1000, 9999); // Generates a cryptographically secure random integer between 1000 and 9999

        User::factory()->create([
           
            'email' => 'viewer' . $randomNumber . '@example.com', // Concatenated with a random number
            
        ]);
    }
}
