<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     *
     */
    public function index(Request $request)
    {
        $plates= Item::query()->select('id', 'name','image_url')->paginate(15);

        return view('home')->with('plates', $plates);

    }
}
