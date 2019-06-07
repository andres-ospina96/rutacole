<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChildController;
use App\Child;

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
    $nameUser = Auth::user()->name;
    $childs = new ChildController();
    $myChilds = $childs->showInHome();

    return view('home', \compact('nameUser', 'myChilds'));
  }
}
