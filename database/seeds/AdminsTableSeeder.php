<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Admin',3)->create([
            'password' => bcrypt('admin888')
        ]);

        $user = Admin::find(1);
        $user->name = 'admin';
        $user->password = bcrypt('admin888');
        $user->save();
    }
}
