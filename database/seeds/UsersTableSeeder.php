<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'id' => 1,
            'name' => 'Amir Admin',
            'email' => 'amir_dautov95@mail.ru',
            'isActive' => 1,
            'password' => Hash::make('secretsecret')
        ]);

        $user = User::create([
            'id' => 2,
            'name' => 'Mark Smith User',
            'email' => 'mark@smith.com',
            'isActive' => 1,
            'password' => Hash::make('secretsecret')
        ]);

        $admin2 = User::create([
            'id' => 3,
            'name' => 'Elijah Hadasevich Admin',
            'email' => 'hadasevich.e@gmail.com',
            'isActive' => 1,
            'password' => Hash::make('secretsecret')
        ]);

        $user2 = User::create([
            'id' => 4,
            'name' => 'Arnold Wilson User',
            'email' => 'arnold@gmail.com',
            'isActive' => 1,
            'password' => Hash::make('secretsecret')
        ]);

        $admin->roles()->attach($adminRole->id);
        $admin2->roles()->attach($adminRole->id);
        $user->roles()->attach($userRole->id);
        $user2->roles()->attach($userRole->id);
    }
}
