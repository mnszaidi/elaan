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

        // create SuperAdmin permissions
        Permission::create(['name' => 'SuperAdmin_list']);
        Permission::create(['name' => 'SuperAdmin_create']);
        Permission::create(['name' => 'SuperAdmin_edit']);
        Permission::create(['name' => 'SuperAdmin_upload']);
        Permission::create(['name' => 'SuperAdmin_download']);
        Permission::create(['name' => 'SuperAdmin_export']);
        Permission::create(['name' => 'SuperAdmin_show_deleted']);
        Permission::create(['name' => 'SuperAdmin_restore']);
        Permission::create(['name' => 'SuperAdmin_delete']);
        Permission::create(['name' => 'SuperAdmin_perm_delete']);

        // create roles and assign existing permissions SuperAdmin
        $role1 = Role::create(['name' => 'SuperAdmin']);
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

        // create roles and assign existing permissions Admin
        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('Admin_list');
        $role2->givePermissionTo('Admin_create');
        $role2->givePermissionTo('Admin_edit');
        $role2->givePermissionTo('Admin_upload');
        $role2->givePermissionTo('Admin_download');
        $role2->givePermissionTo('Admin_export');
        $role2->givePermissionTo('Admin_show_deleted');
        $role2->givePermissionTo('Admin_restore');
        $role2->givePermissionTo('Admin_delete');
        $role2->givePermissionTo('Admin_perm_delete');

        // create Teacher permissions
        Permission::create(['name' => 'Manager_list']);
        Permission::create(['name' => 'Manager_create']);
        Permission::create(['name' => 'Manager_edit']);
        Permission::create(['name' => 'Manager_upload']);
        Permission::create(['name' => 'Manager_download']);
        Permission::create(['name' => 'Manager_export']);
        Permission::create(['name' => 'Manager_show_deleted']);
        Permission::create(['name' => 'Manager_restore']);
        Permission::create(['name' => 'Manager_delete']);
        Permission::create(['name' => 'Manager_perm_delete']);

        // create roles and assign existing permissions Manager
        $role3 = Role::create(['name' => 'Manager']);
        $role3->givePermissionTo('Manager_list');
        $role3->givePermissionTo('Manager_create');
        $role3->givePermissionTo('Manager_edit');
        $role3->givePermissionTo('Manager_upload');
        $role3->givePermissionTo('Manager_download');
        $role3->givePermissionTo('Manager_export');
        $role3->givePermissionTo('Manager_show_deleted');
        $role3->givePermissionTo('Manager_restore');
        $role3->givePermissionTo('Manager_delete');
        $role3->givePermissionTo('Manager_perm_delete');

        // create users permissions
        Permission::create(['name' => 'Supervisor_list']);
        Permission::create(['name' => 'Supervisor_create']);
        Permission::create(['name' => 'Supervisor_edit']);
        Permission::create(['name' => 'Supervisor_upload']);
        Permission::create(['name' => 'Supervisor_download']);
        Permission::create(['name' => 'Supervisor_export']);
        Permission::create(['name' => 'Supervisor_show_deleted']);
        Permission::create(['name' => 'Supervisor_restore']);
        Permission::create(['name' => 'Supervisor_delete']);
        Permission::create(['name' => 'Supervisor_perm_delete']);

        // create roles and assign existing permissions Supervisor
        $role4 = Role::create(['name' => 'Supervisor']);
        $role4->givePermissionTo('Supervisor_list');
        $role4->givePermissionTo('Supervisor_create');
        $role4->givePermissionTo('Supervisor_edit');
        $role4->givePermissionTo('Supervisor_upload');
        $role4->givePermissionTo('Supervisor_download');
        $role4->givePermissionTo('Supervisor_export');
        $role4->givePermissionTo('Supervisor_show_deleted');
        $role4->givePermissionTo('Supervisor_restore');
        $role4->givePermissionTo('Supervisor_delete');
        $role4->givePermissionTo('Supervisor_perm_delete');

        // create users permissions
        Permission::create(['name' => 'Surveyor_list']);
        Permission::create(['name' => 'Surveyor_create']);
        Permission::create(['name' => 'Surveyor_edit']);
        Permission::create(['name' => 'Surveyor_upload']);
        Permission::create(['name' => 'Surveyor_download']);
        Permission::create(['name' => 'Surveyor_export']);
        Permission::create(['name' => 'Surveyor_show_deleted']);
        Permission::create(['name' => 'Surveyor_restore']);
        Permission::create(['name' => 'Surveyor_delete']);
        Permission::create(['name' => 'Surveyor_perm_delete']);

        // create roles and assign existing permissions Surveyor
        $role5 = Role::create(['name' => 'Surveyor']);
        $role5->givePermissionTo('Surveyor_list');
        $role5->givePermissionTo('Surveyor_create');
        $role5->givePermissionTo('Surveyor_edit');
        $role5->givePermissionTo('Surveyor_upload');
        $role5->givePermissionTo('Surveyor_download');
        $role5->givePermissionTo('Surveyor_export');
        $role5->givePermissionTo('Surveyor_show_deleted');
        $role5->givePermissionTo('Surveyor_restore');
        $role5->givePermissionTo('Surveyor_delete');
        $role5->givePermissionTo('Surveyor_perm_delete');

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
        
        // create roles and assign existing permissions users
        $role6 = Role::create(['name' => 'User']);
        $role6->givePermissionTo('User_list');
        $role6->givePermissionTo('User_create');
        $role6->givePermissionTo('User_edit');
        $role6->givePermissionTo('User_upload');
        $role6->givePermissionTo('User_download');
        $role6->givePermissionTo('User_export');
        $role6->givePermissionTo('User_show_deleted');
        $role6->givePermissionTo('User_restore');
        $role6->givePermissionTo('User_delete');
        $role6->givePermissionTo('User_perm_delete');

        
        // create demo users
        // create Admin
        $user1 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'Admin',
            'username'  => 'superadmin',
            'email' => 'sadmin@test.com',
            'email_verified_at' => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user1->assignRole($role1);

        // create demo Admin
        $user2 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'Admin',
            'username'  => 'admin',
            'email' => 'admin@test.com',
            'email_verified_at'  => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user2->assignRole($role2);

        // create demo Admin
        $user3 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'Manager',
            'username'  => 'manager',
            'email' => 'manager@test.com',
            'email_verified_at'  => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user3->assignRole($role3);

        // create demo Admin
        $user4 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'Supervisor',
            'username'  => 'supervisor',
            'email' => 'supervisor@test.com',
            'email_verified_at'  => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user4->assignRole($role4);

        // create demo Admin
        $user5 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'Surveyor',
            'username'  => 'surveyor',
            'email' => 'surveyor@test.com',
            'email_verified_at'  => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user5->assignRole($role5);

        // create demo users
        $user6 = User::create([
            'fname'  => 'Monis',
            'lname'  => 'User',
            'username'  => 'user',
            'email' => 'user@test.com',
            'email_verified_at'  => '2021-11-20 04:25:11',
            'password' => bcrypt('Password!432')
        ]);
        $user6->assignRole($role6);
        
    }
}