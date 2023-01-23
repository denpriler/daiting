<?php

namespace Modules\Guest\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Modules\Guest\Entities\City;
use Modules\Guest\Events\UserRegisteredEvent;
use Modules\Guest\Http\Requests\Auth\RegisterRequest;
use Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('guest::auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $password = Str::random(8);

        $user = User::create([
            'email'    => $request->get('email'),
            'password' => Hash::make($password),
            'type'     => $request->get('user-type'),
            'city_id'  => City::whereObjectCode($request->get('city'))->firstOrFail()->id
        ]);

        event(new UserRegisteredEvent($user, $password));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
