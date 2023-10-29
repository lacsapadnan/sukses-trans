<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\DeliveryOrder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalContainer = Container::count();
        $totalUser = User::count();
        $totalProduct = Product::count();
        $totalSuratJalan = DeliveryOrder::count();
        return view('pages.dashboard', compact('totalContainer', 'totalUser', 'totalProduct', 'totalSuratJalan'));
    }
}
