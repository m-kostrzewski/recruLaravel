<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('create:user', function() {
    //options
    $name = $this->ask('What is your name?');
    $email = $this->ask('What is your email?');
    $password = $this->secret('What is the password?');
    $password2 = $this->secret('Repeat password');

    if(!User::where('email', '=', $email)->first()){
        if($password === $password2){
            $user = new User;
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
            $this->info("User Created");
        }
        else{
            $this->info("User Not Created. Passwords not match");
        }
    }else{
        $this->info("User Alredy Exist");
    }
});