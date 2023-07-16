<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\EmailTemplate;
use Illuminate\View\View;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    public function index(): View
    {
        $templates = EmailTemplate::all();
        $customers = Customer::all();

        return view('admin.pages.dashboard.index', compact('templates', 'customers'));
    }
}
