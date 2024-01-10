<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => '$2y$12$iZOKBl35YoJZ5qVwBA8BTevoO7FvtAvfrhRqU51QJbvHN99VB4tpu'
            ]);

        Role::create(['name' => 'guest']);
        
        $role = Role::create(['name' => 'admin']);
        $user->syncRoles($role);

        $permissions = [
            'view index',
            
            'view permissions',
            'create permission',
            'store permission',
            'show permission',
            'edit permission',
            'update permission',
            'delete permission',

            'view roles',
            'create role',
            'store role',
            'show role',
            'edit role',
            'update role',
            'delete role',

            'view users',
            'create user',
            'store user',
            'show user',
            'edit user',
            'update user',
            'delete user',
 
            'view clients',
            'create client',
            'store client',
            'show client',
            'edit client',
            'update client',
            'delete client',

            'view services',
            'create service',
            'store service',
            'show service',
            'edit service',
            'update service',
            'delete service',

            'view features',
            'create feature',
            'store feature',
            'show feature',
            'edit feature',
            'update feature',
            'delete feature',

            'view project-categories',
            'create project-category',
            'store project-category',
            'show project-category',
            'edit project-category',
            'update project-category',
            'delete project-category',

            'view projects',
            'create project',
            'store project',
            'show project',
            'edit project',
            'update project',
            'delete project',

            'view questions',
            'create question',
            'store question',
            'show question',
            'edit question',
            'update question',
            'delete question',
        
            'view testimonials',
            'create testimonial',
            'store testimonial',
            'show testimonial',
            'edit testimonial',
            'update testimonial',
            'delete testimonial',

            'view post-categories',
            'create post-category',
            'store post-category',
            'show post-category',
            'edit post-category',
            'update post-category',
            'delete post-category',

            'view tags',
            'create tag',
            'store tag',
            'show tag',
            'edit tag',
            'update tag',
            'delete tag',

            'view posts',
            'create post',
            'store post',
            'show post',
            'edit post',
            'update post',
            'delete post',
        ];

        foreach($permissions as $perm) {
            $permission = Permission::create(['name' => $perm]);
            $permission->assignRole($role);
        }
    }
}
