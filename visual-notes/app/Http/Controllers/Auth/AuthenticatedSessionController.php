<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        addVendors(['auth']);
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function google_login()
    {
        
        return Socialite::driver('google')->redirect(); 
    }
    public function google_redirect()
    {
        try {
            $user = Socialite::driver('google')->user();
           
            // echo "<pre>".print_r($user)."</pre>";
            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect('/');
            } else {
                $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => Hash::make('Ommune@123'),
                    ]);
                $newUser->assignRole('User'); 
                Auth::login($newUser);
                return redirect('/');
                // return redirect('login')->with('message','These credentials do not match our records.'); 
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }  
    }
}
