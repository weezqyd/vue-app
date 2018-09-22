<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create();
        App\User::first()->fill([
            'email' => 'demo@vue-app.test'
        ])->save();
    }
}
