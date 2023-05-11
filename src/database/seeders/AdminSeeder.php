<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = User::create(
            [
                'username' => 'admin',
                'first_name' => 'super',
                'last_name' => 'admin',
                'email' => 'admin@hmp.com',
                'address' => '1234 admin street',
                'phone' => '+2349055398429',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                // password
            ]
        );

        $user->assignRole('admin');
    }
}
