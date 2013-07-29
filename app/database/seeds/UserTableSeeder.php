<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
        
        $user = new User;
        $user->email = 'llis@llis.com';
        $user->password = Hash::make('llis');
        $user->forceSave();

        $user = new User;
        $user->email = 'llis2@llis.com';
        $user->password = Hash::make('llis');
        $user->forceSave();
    }
 
}