<?php

namespace App\Http\Controllers\Admin\Web\Auth;

use App\Http\Controllers\Admin\Web\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after logout.
     *
     * @var string
     */
    protected string $redirectAfterLogoutTo = RouteServiceProvider::ADMIN_LOGIN;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('admin.pages.auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->guard()->logout();

        return redirect(RouteServiceProvider::ADMIN_LOGIN);
    }

    /**
     * @return Guard|StatefulGuard
     */
    public function guard(): Guard|StatefulGuard
    {
        return Auth::guard('admin');
    }

    /**
     * @return PasswordBroker
     */
    protected function broker(): PasswordBroker
    {
        return Password::broker('admins');
    }
}