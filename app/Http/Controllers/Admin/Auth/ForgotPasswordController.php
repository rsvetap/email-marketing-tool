<?php

namespace App\Http\Controllers\Admin\Web\Auth;

use App\Http\Controllers\Admin\Web\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return View
     */
    public function showLinkRequestForm(): View
    {
        return view('admin.pages.auth.passwords.email');
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
