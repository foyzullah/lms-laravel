<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $user = new User();
        // $user->name = 'Super Admin';
        // $user->email = 'super@admin.com';
        // $user->password = bcrypt('password');

        // $user->save();


        // $role = Role::create(['name' => 'Super Admin']);
        // $permission = Permission::create(['name' => 'create_admin']);

        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);


        // $user->assignRole($role);


        $defaultPermissions = ['lead-management', 'create_admin'];

        foreach ($defaultPermissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.com');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.com');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.com');
        $this->create_user_with_role('Leads', 'Leads', 'lead@lms.com');

        Lead::factory(100)->create();

        $course = Course::create([
            'name' => 'Laravel',
            'description' => 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
            'image' => 'https://laravel.com/img/logomark.min.svg',
            'user_id' => $teacher->id
        ]);

        Curriculum::factory(10)->create();
    }

    private function create_user_with_role($type, $name, $email)
    {
        $role = Role::create([
            'name' => $type
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        if ($type === 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        } elseif ($type === 'Leads') {
            $role->givePermissionTo('lead-management');
        }
        $user->assignRole($role);

        return $user;
    }
}
