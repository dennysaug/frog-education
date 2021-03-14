<?php

use App\Area;
use App\Role;
use App\UserGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

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
        $quizz = Area::create(['name' => 'Quizz']);

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
                'area_id' => $auth->id, //Auth - Logout
                'name' => 'Logout',
                'route' => 'syadmin/auth/logout',
                'alias' => "sysadmin.auth.logout",
                'method' => 'get',
                'protected' => 'Y'
            ],
            [
                'area_id' => $quizz->id, //Quizz - List
                'name' => 'List',
                'route' => 'syadmin/quizz',
                'alias' => "sysadmin.quizz.index",
                'method' => 'get',
                'protected' => 'Y'
            ],
            [
                'area_id' => $quizz->id, //Quizz - New
                'name' => 'New',
                'route' => 'syadmin/quizz/new',
                'alias' => "sysadmin.quizz.new",
                'method' => 'get',
                'protected' => 'Y'
            ],
            [
                'area_id' => $quizz->id, //Quizz - Question
                'name' => 'Questions',
                'route' => 'syadmin/quizz/question/{quizz}',
                'alias' => "sysadmin.quizz.questions",
                'method' => 'get',
                'protected' => 'Y'
            ],
            [
                'area_id' => $quizz->id, //Quizz - Store
                'name' => 'Store',
                'route' => 'syadmin/quizz/store',
                'alias' => "sysadmin.quizz.store",
                'method' => 'post',
                'protected' => 'Y'
            ],
            [
                'area_id' => $quizz->id, //Quizz - Question Store
                'name' => 'Questions Store',
                'route' => 'syadmin/quizz/question-store',
                'alias' => "sysadmin.quizz.question-store",
                'method' => 'post',
                'protected' => 'Y'
            ],
            [
                'area_id' => $quizz->id, //Quizz - Question Store
                'name' => 'Questions Result',
                'route' => 'syadmin/quizz/result/{quizz}',
                'alias' => "sysadmin.quizz.result",
                'method' => 'get',
                'protected' => 'Y'
            ],


        ];
        $rolesId = [];
        foreach($roles as $role) {
            $role = Role::create($role);
            $rolesId[] = $role->id;
        }
        $user = Auth::loginUsingId(1);

        $userGroup = UserGroup::find($user->user_group_id);

        $userGroup->role_groups()->syncWithoutDetaching($rolesId);

    }
}
