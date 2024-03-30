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
            $current_user = User::where('provider_id', $user->id)->first();
            
            if($current_user){
                Auth::login($current_user);
                if ($current_user->role != 0 ){
                    return redirect('/admin');
                }
                return redirect('/');
            } else {
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'provider' => 'google',
                    'provider_id' => $user->id,
                    'image_url' => 'images/user/default-avatar.jpg',
                    'address' => '',
                    'email_verified_at' => now()
                ]);
                Auth::login($newUser);
                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
