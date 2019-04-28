<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiforpreController extends Controller
{
  public function indice()
  {
      return view('layouts.home');
  }
}
