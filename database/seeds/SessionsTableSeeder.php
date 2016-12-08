<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Use ModelFactory to generate seed data
        factory(App\Session::class, 50)->create();
    }
}
