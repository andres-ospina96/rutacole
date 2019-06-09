<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Child;
use App\Location;

class LocationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param  string  $email
   * @return \Illuminate\Http\Response
   */
  public function index($email)
  {
    $childChoiced = Child::where('email', $email)->get();
    return view('location', \compact('childChoiced'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $location = new Location();
    $location->lat = $request->lat;
    $location->lng = $request->lng;
    $location->active = $request->active == "1" ? 1 : 0;
    $location->child_id = $request->child;
    $location->save();

    return $location;
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   * 
   */
  public function show($id)
  {
    $childLocation = Location::where('child_id', $id)->get();
    
    return $childLocation[count($childLocation)-1];
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request}
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    $currentLocation = Child::find($request->id_route);
    $currentLocation->lat = $request->lat;
    $currentLocation->lng = $request->lng;
    $currentLocation->active = $request->active == "1" ? 1 : 0;
    $currentLocation->child_id = $request->child;
    $currentLocation->save();

    return $currentLocation;
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
