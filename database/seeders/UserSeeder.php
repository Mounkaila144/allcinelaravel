<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user']);
        $permission = Permission::create(['name' => 'delect']);

        $admin_role->givePermissionTo($permission);
        $admin=User::create(["name"=>"allcine","email"=>"allcine@gmail.com","password"=>bcrypt("allcine144")]);
        $user=User::create(["name"=>"Gerant","email"=>"gerant@gmail.com","password"=>bcrypt("gerant123")]);
        $admin->assignRole($admin_role);
        $user->assignRole($user_role);
    }
}
