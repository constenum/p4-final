<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Use ModelFactory to generate seed data
        factory(App\User::class, 5)->create();

        # Required users for p4 (added in addtion to ModelFactory users)
        $users = [
            ['jill@harvard.edu','Jill Tutor','helloworld'],
            ['jamal@harvard.edu','Jamal Admin','helloworld'],
            ['mmiller.43460@gmail.com','Mark Miller','helloworld']
        ];

        # Get existing users to prevent duplicates
        $existingUsers = User::all()->keyBy('email')->toArray();

        foreach($users as $user) {

            # If the user does not already exist, add them
            if(!array_key_exists($user[0],$existingUsers)) {
                $user = User::create([
                    'email' => $user[0],
                    'name' => $user[1],
                    'password' => Hash::make($user[2]),
                ]);
            }
        }
    }
}
