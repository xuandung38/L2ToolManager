<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'users_manage']);
        Permission::create(['name' => 'keys_manage']);
        Permission::create(['name' => 'keys_create']);
        Permission::create(['name' => 'keys_edit']);
        Permission::create(['name' => 'keys_delete']);
        Permission::create(['name' => 'keys_show']);
        Permission::create(['name' => 'accounts_manage']);
        Permission::create(['name' => 'accounts_create']);
        Permission::create(['name' => 'accounts_edit']);
        Permission::create(['name' => 'accounts_show']);
        Permission::create(['name' => 'accounts_delete']);
    }
}
