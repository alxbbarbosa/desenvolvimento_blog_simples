<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'active' => true,
                'name' => 'Admininistrador',
                'email' => 'admin@myblog.com.br',
                'password' => bcrypt('12345678')
        ]);
        foreach (Role::all() as $role) {
            $user->assignRole($role);
        }
    }
}