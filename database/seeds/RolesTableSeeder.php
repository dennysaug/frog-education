<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        gen_route('User Group');    // id 1
        gen_route('User');          // id 2
        gen_route('Role Group');    // id 3
        gen_route('Area');          // id 4
        gen_route('Category');      // id 5

    }
}
