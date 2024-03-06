<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->scopes([
            'https://www.googleapis.com/auth/calendar',
            'https://www.googleapis.com/auth/meetings.space.created'

        ])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        if ($user->token) {
            \Session::put('google_token', $user->token);
            \Session::put('google_logged_in', true);

            return redirect()->route('addCalendarEvent.index')->with('success', 'Login successful. Redirecting...');
        } else {
            return redirect()->route('addCalendarEvent.index')->with('error', 'Google authentication failed. Please try again.');
        }

        // $user->token;
    }

    public function signOutGoogle()
    {
        \Session::forget('google_token');
        \Session::forget('google_logged_in');

        return redirect()->route('addCalendarEvent.index')->with('success', 'Logout successful. Redirecting...');
    }
}