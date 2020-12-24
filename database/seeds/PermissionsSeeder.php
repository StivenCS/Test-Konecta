<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'userIndex']);
        Permission::create(['name' => 'userEdit']);
        Permission::create(['name' => 'userShow']);
        Permission::create(['name' => 'userCreate']);
        Permission::create(['name' => 'userDestroy']);
        Permission::create(['name' => 'clientIndex']);
        Permission::create(['name' => 'clientEdit']);
        Permission::create(['name' => 'clientShow']);
        Permission::create(['name' => 'clientCreate']);
        Permission::create(['name' => 'clientDestroy']);
        $admin = Role::create(['name' => 'Admin']);
        $seller = Role::create(['name' => 'Seller']);
        $seller->givePermissionTo([
            'clientIndex',
            'clientEdit',
            'clientShow',
            'clientCreate',
            'clientDestroy'
        ]);
        $admin->givePermissionTo(Permission::all());
        $user = User::find(1);
        $user->assignRole('Admin');
    }
}
