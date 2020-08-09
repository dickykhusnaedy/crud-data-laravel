<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  // Page Index
  public function home()
  {
    return view('index');
  }

  public function about()
  {
    return view('about', ['nama' => 'Dicky Khusnaedy, A.Md.Kom']);
  }
}
