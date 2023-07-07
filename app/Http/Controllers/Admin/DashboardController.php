<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\PriceHelper;
use App\Http\Controllers\Controller;
use App\Models\Order\Cart;
use App\Models\Order\CartItem;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
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
        return view('admin.pages.dashboard');
    }
}
