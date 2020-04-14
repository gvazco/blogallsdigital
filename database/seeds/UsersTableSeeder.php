<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);

        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Colaborador']);

        $moderatorRole = Role::create(['name' => 'Moderator', 'display_name' => 'Moderador']);


        $viewPostsPermission = Permission::create([
            'name' => 'View posts',
            'display_name' => 'Ver Publicaciones'
        ]);
        $createPostsPermission = Permission::create([
            'name' => 'Create posts',
            'display_name' => 'Crear Publicaciones'
        ]);
        $updatePostsPermission = Permission::create([
            'name' => 'Update posts',
            'display_name' => 'Actualizar Publicaciones'
        ]);
        $deletePostsPermission = Permission::create([
            'name' => 'Delete posts',
            'display_name' => 'Eliminar Publicaciones'
        ]);


        $viewUserPermission = Permission::create([
            'name' => 'View users',
            'display_name' => 'Ver Usuarios'
        ]);
        $createUserPermission = Permission::create([
            'name' => 'Create users',
            'display_name' => 'Crear Usuarios'
        ]);
        $updateUserPermission = Permission::create([
            'name' => 'Update users',
            'display_name' => 'Actualizar Usuarios'
        ]);
        $deleteUserPermission = Permission::create([
            'name' => 'Delete users',
            'display_name' => 'Eliminar Usuarios'
        ]);


        $viewRolesPermission = Permission::create([
            'name' => 'View roles',
            'display_name' => 'Ver Roles'
        ]);
        $createRolesPermission = Permission::create([
            'name' => 'Create roles',
            'display_name' => 'Crear Roles'
        ]);
        $updateRolesPermission = Permission::create([
            'name' => 'Update roles',
            'display_name' => 'Aztualizar Roles'
        ]);
        $deleteRolesPermission = Permission::create([
            'name' => 'Delete roles',
            'display_name' => 'Eliminar Roles'
        ]);

        $viewPermissionsPermission = Permission::create([
            'name' => 'View permissions',
            'display_name' => 'Ver permisos'
        ]);

        $updatePermissionsPermission = Permission::create([
            'name' => 'Update permissions',
            'display_name' => 'Actualizar permisos'
        ]);


        $admin = new User;
        $admin->name = 'Gustavo Vazco';
        $admin->email = 'gustavovazco@gmail.com';
        $admin->password = '198404';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Alexis Veco';
        $writer->email = 'alexveco@outlook.com';
        $writer->password = '198404';
        $writer->save();

        $writer->assignRole($writerRole);

    }
}
