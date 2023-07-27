<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name' => 'admin', 
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => 1
        ]);

        $adminRole = Role::create(['name' => 'Admin']);
        $senderRole = Role::create(['name' => 'Sender']);
        $riderRole = Role::create(['name' => 'Rider']);

        $senders = array(
            [
                'first_name' => 'Sender1', 
                'last_name' => '',
                'email' => 'sender1@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Sender2', 
                'last_name' => '',
                'email' => 'sender2@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Sender3', 
                'last_name' => '',
                'email' => 'sender3@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Sender4', 
                'last_name' => '',
                'email' => 'sender4@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Sender5', 
                'last_name' => '',
                'email' => 'sender5@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
        );

        foreach($senders as $sender) {
            $user = User::create($sender);
            $user->assignRole([$senderRole->id]);
        }

        $riders = array(
            [
                'first_name' => 'Rider1', 
                'last_name' => '',
                'email' => 'rider1@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider2', 
                'last_name' => '',
                'email' => 'rider2@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider3', 
                'last_name' => '',
                'email' => 'rider3@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider4', 
                'last_name' => '',
                'email' => 'rider4@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider5', 
                'last_name' => '',
                'email' => 'rider5@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider6', 
                'last_name' => '',
                'email' => 'rider6@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider7', 
                'last_name' => '',
                'email' => 'rider7@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider8', 
                'last_name' => '',
                'email' => 'rider8@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider9', 
                'last_name' => '',
                'email' => 'rider9@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
            [
                'first_name' => 'Rider10', 
                'last_name' => '',
                'email' => 'rider10@brt.com',
                'password' => bcrypt('12345678'),
                'status' => 1
            ],
        );

        foreach($riders as $rider) {
            $user = User::create($rider);
            $user->assignRole([$riderRole->id]);
        }

        //Assigning roles to users
        $admin->assignRole([$adminRole->id]);

        //Permissions Module Wise
        $Userpermission1 = Permission::create(['name'=>'User-Create','guard_name'=>'web']);
        $Userpermission2 = Permission::create([ 'name'=>'User-Edit','guard_name'=>'web', ]);
        $Userpermission3 = Permission::create([ 'name'=>'User-View', 'guard_name'=>'web', ]);
        $Userpermission4 = Permission::create([ 'name'=>'User-Delete', 'guard_name'=>'web', ]);
        
        //Allot Permissions
        $Permission1 = Permission::create(['name' => 'Permission-Create','guard_name' => 'web']);
        $Permission2 = Permission::create(['name' => 'Permission-Edit','guard_name' => 'web']);
        $Permission3 = Permission::create(['name' => 'Permission-View','guard_name' => 'web']);
        $Permission4 = Permission::create(['name' => 'Permission-Delete','guard_name' => 'web']);
        
        //Role Permissions
        $Role1 = Permission::create(['name' => 'Role-Create','guard_name' => 'web']);
        $Role2 = Permission::create(['name' => 'Role-Edit','guard_name' => 'web']);
        $Role3 = Permission::create(['name' => 'Role-View','guard_name' => 'web']);
        $Role4 = Permission::create(['name' => 'Role-Delete','guard_name' => 'web']);
        
        //Booking Create
        $booking1 = Permission::create(['name' => 'Booking-Create','guard_name' => 'web']);
        $booking2 = Permission::create(['name' => 'Booking-Edit','guard_name' => 'web']);
        $booking3 = Permission::create(['name' => 'Booking-View','guard_name' => 'web']);
        $booking4 = Permission::create(['name' => 'Booking-Delete','guard_name' => 'web']);

        //Add Permissions to adminRole 
        $adminRole->givePermissionTo([$Userpermission1, $Userpermission2, $Userpermission3, $Userpermission4]);
        $adminRole->givePermissionTo([$Permission1, $Permission2, $Permission3, $Permission4]);
        $adminRole->givePermissionTo([$Role1, $Role2, $Role3, $Role4]);
        $adminRole->givePermissionTo([$booking1, $booking2, $booking3, $booking4]);
        
        //Add Permissions to TeacherRole 
        $senderRole->givePermissionTo([$booking1, $booking2]);
        
        //Add Permissions to Student 
        $riderRole->givePermissionTo([$booking2, $booking3]);
    }
}