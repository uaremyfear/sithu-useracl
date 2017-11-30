<?php

namespace Sithu\UserAcl\Seeds;

use Illuminate\Database\Seeder;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserAclSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123')
            ]);

        $role = Role::create(['name' => 'SuperAdmin' ]);
        $user->roles()->sync($role);
    }
}