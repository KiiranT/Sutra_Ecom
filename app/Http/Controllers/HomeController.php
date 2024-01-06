<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route(request()->user()->role);
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function customer(Banner $_banner, Product $_product)
    {
        $indexController = new IndexController($_banner, $_product);
        return $indexController->index();
    }
}
