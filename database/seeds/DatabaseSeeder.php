<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        DB::table('users')->insert([
//            'name' => 'saif',
//            'email' => 'saif.smooker@gmail.com',
//            'password' => Hash::make('12345678'),
//        ]);
        // create permissions
        Permission::create(['name' => 'edit post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'create post']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
