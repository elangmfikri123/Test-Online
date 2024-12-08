<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $permission = [
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
        ];

        foreach($permission as $permission)
            Permission::create([
                'name' => $permission
            ]);

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo([
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view courses',
        ]);

        //SUPER ADMIN
        $user = User::create([
            'name' => 'admin123',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Hellow1212')
        ]);

        $user->assignRole($teacherRole);
    }
}

