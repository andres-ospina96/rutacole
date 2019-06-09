<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
  protected $fillable = ['name', 'password', 'parent','email'];
  protected $table = 'children';
}
