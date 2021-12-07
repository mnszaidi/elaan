<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;

class PermissionsDemoSeeder extends Seeder {
	/**
	 * Create the initial roles and permissions.
	 *
	 * @return void
	 */
	public function run() {
		// Reset cached roles and permissions
		app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create Admin permissions
        Permission::create(['name' => 'Admin_list']);
        Permission::create(['name' => 'Admin_create']);
        Permission::create(['name' => 'Admin_edit']);
        Permission::create(['name' => 'Admin_upload']);
        Permission::create(['name' => 'Admin_download']);
        Permission::create(['name' => 'Admin_export']);
        Permission::create(['name' => 'Admin_show_deleted']);
        Permission::create(['name' => 'Admin_restore']);
        Permission::create(['name' => 'Admin_delete']);
        Permission::create(['name' => 'Admin_perm_delete']);

        // create Teacher permissions
        Permission::create(['name' => 'Teacher_list']);
        Permission::create(['name' => 'Teacher_create']);
        Permission::create(['name' => 'Teacher_edit']);
        Permission::create(['name' => 'Teacher_upload']);
        Permission::create(['name' => 'Teacher_download']);
        Permission::create(['name' => 'Teacher_export']);
        Permission::create(['name' => 'Teacher_show_deleted']);
        Permission::create(['name' => 'Teacher_restore']);
        Permission::create(['name' => 'Teacher_delete']);
        Permission::create(['name' => 'Teacher_perm_delete']);
        
        // create users permissions
        Permission::create(['name' => 'User_list']);
        Permission::create(['name' => 'User_create']);
        Permission::create(['name' => 'User_edit']);
        Permission::create(['name' => 'User_upload']);
        Permission::create(['name' => 'User_download']);
        Permission::create(['name' => 'User_export']);
        Permission::create(['name' => 'User_show_deleted']);
        Permission::create(['name' => 'User_restore']);
        Permission::create(['name' => 'User_delete']);
        Permission::create(['name' => 'User_perm_delete']);

        // create roles and assign existing permissions Admin
        $role1 = Role::create(['name' => 'Admin']);
        $role1->givePermissionTo('Admin_list');
        $role1->givePermissionTo('Admin_create');
        $role1->givePermissionTo('Admin_edit');
        $role1->givePermissionTo('Admin_upload');
        $role1->givePermissionTo('Admin_download');
        $role1->givePermissionTo('Admin_export');
        $role1->givePermissionTo('Admin_show_deleted');
        $role1->givePermissionTo('Admin_restore');
        $role1->givePermissionTo('Admin_delete');
        $role1->givePermissionTo('Admin_perm_delete');
        // create roles and assign existing permissions Teacher
        
        $role2 = Role::create(['name' => 'Teacher']);
        $role2->givePermissionTo('Teacher_list');
        $role2->givePermissionTo('Teacher_create');
        $role2->givePermissionTo('Teacher_edit');
        $role2->givePermissionTo('Teacher_upload');
        $role2->givePermissionTo('Teacher_download');
        $role2->givePermissionTo('Teacher_export');
        $role2->givePermissionTo('Teacher_show_deleted');
        $role2->givePermissionTo('Teacher_restore');
        $role2->givePermissionTo('Teacher_delete');
        $role2->givePermissionTo('Teacher_perm_delete');
        
        // create roles and assign existing permissions users
        $role3 = Role::create(['name' => 'User']);
        $role3->givePermissionTo('User_list');
        $role3->givePermissionTo('User_create');
        $role3->givePermissionTo('User_edit');
        $role3->givePermissionTo('User_upload');
        $role3->givePermissionTo('User_download');
        $role3->givePermissionTo('User_export');
        $role3->givePermissionTo('User_show_deleted');
        $role3->givePermissionTo('User_restore');
        $role3->givePermissionTo('User_delete');
        $role3->givePermissionTo('User_perm_delete');

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        
        // create demo users
        // create Admin
        $user1 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'Admin',
            'username'  => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user1->assignRole($role1);
        // create demo Teacher
        $user2 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'Teacher',
            'username'  => 'teacher',
            'email' => 'Teacher@example.com',
            'email_verified_at'  => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user2->assignRole($role2);
        // create demo users
        $user3 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'User',
            'username'  => 'student',
            'email' => 'user@example.com',
            'email_verified_at'  => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user3->assignRole($role3);
        
    }
}