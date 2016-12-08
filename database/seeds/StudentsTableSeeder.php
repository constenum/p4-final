<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Use ModelFactory to generate seed data
        factory(App\Student::class, 20)->create();
    }
}
