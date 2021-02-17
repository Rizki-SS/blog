<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'file-index',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-edit',
            'user-create',
            'user-delete',

            'category-list',
            'category-edit',
            'category-create',
            'category-delete',

            'post-list',
            'post-edit',
            'post-create',
            'post-delete',

            'laman-list',
            'laman-edit',
            'laman-create',
            'laman-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
