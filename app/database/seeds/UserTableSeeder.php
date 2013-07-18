<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'email' => 'llis@llis.com',
            'password' => Hash::make('llis')
        ));
 
        User::create(array(
            'email' => 'patata@llis.com',
            'password' => Hash::make('patata')
        ));
    }
 
}