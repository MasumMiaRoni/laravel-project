<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;



class SocialController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        $provider_id =$user->getId();
        $email= $user->getEmail();

        $data = User::where('provider_id',$provider_id)->where('email',$email)->first();

        if($data){
             auth()->login($data);
        }
        else{
            return User::insert([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider_id' => $user->getId(),
                'provider_name' => 'github',
            ]);


        }

        return redirect('/home');
    }

    public function directToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function dleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        $provider_id =$user->getId();
        $email= $user->getEmail();

        $data = User::where('provider_id',$provider_id)->where('email',$email)->first();

        if($data){
             auth()->login($data);
        }
        else{
            return User::insert([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'provider_id' => $user->getId(),
                'provider_name' => 'google',
            ]);


        }

        return redirect('/home');
    }

}

