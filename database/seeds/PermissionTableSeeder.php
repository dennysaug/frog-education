<?php

use App\Area;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboard = Area::create(['name' => 'Dashboard']);
        $auth = Area::create(['name' => 'Auth']);

        $roles = [
            [
                'area_id' => 2, //user
                'name' => 'Permission',
                'route' => 'permission/{user}',
                'alias' => "sysadmin.user.permission",
                'method' => 'get',
                'protected' => 'Y'
            ],
            [
                'area_id' => $dashboard->id, //dashboard
                'name' => 'List',
                'route' => 'sysadmin/dashboard',
                'alias' => "sysadmin.dashboard.index",
                'method' => 'get',
                'protected' => 'Y'
            ],
            [
                'area_id' => $auth->id, //Auth - Logoutcle
                'name' => 'Logout',
                'route' => 'syadmin/auth/logout',
                'alias' => "sysadmin.auth.logout",
                'method' => 'get',
                'protected' => 'Y'
            ],

        ];
        Role::insert($roles);

    }
}
