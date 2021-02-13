<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ElasticAuthAuthenticateSessionController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    private string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Name of the provider
     *
     * @var string
     */
    private string $provider = 'elasticauth';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('handleProviderLogout');
    }

    /**
     * Redirect user to provider
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::driver($this->provider)->redirect();
    }

    /**
     * Handle provider callback
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(Request $request)
    {

        $socialiteUser = Socialite::driver($this->provider)->user();

        $user = User::where('email', $socialiteUser->email)->get()->first();

        auth()->login($user, true);

        return redirect($this->redirectTo);

    }

}