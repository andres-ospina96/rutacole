<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChildController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $childs = Child::get();
    return view('child', \compact('childs'));
  }


  /**
   * Display a listing of the resource.
   */
  public function showInHome()
  {
    $childs = Child::where('parent', Auth::id())->get();
    return $childs;
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('childnew');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // return $request;
    $name = $request->name;
    $password = $request->password;
    $parent = Auth::id();

    Child::create([
      'name' => $name,
      'password' => $password,
      'parent' => $parent,
      'email' => $request->email
    ]);

    $newUser = new User();
    $newUser->name = $name;
    $newUser->email = $request->email;
    $newUser->password = Hash::make($password);
    $newUser->type = 'child';
    $newUser->save();

    return redirect()->route('home');


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $childChoiced = Child::where('id', $id)->get();
    // dd($childChoiced[0]->name);
    return view('childedit', \compact('childChoiced'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    // return $request;
    $name = $request->name;
    $password = $request->password;

    $childChoiced = Child::find($request->id);
    $childChoiced->name = $name;
    $childChoiced->password = $password;
    $childChoiced->save();

    return redirect()->route('home');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $childChoiced = Child::find($id);
    $childChoiced->delete();

    return redirect()->route('home');
  }
}
