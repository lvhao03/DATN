<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function googleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $current_user = User::where('google_id', $user->id)->first();

            if($current_user){
                Auth::login($current_user);
                return redirect('/');
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'google_id'=> $user->id,
                    'password' => Hash::make('12345678'),
                    'image_url' => 'images/user/default-avatar.jpg',
                    'address' => ''
                ]);

                Auth::login($newUser);
                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
