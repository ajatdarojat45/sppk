<?php

namespace App\Http\Controllers;

use App\Pr;
use Illuminate\Http\Request;

class PrController extends Controller
{
   public function index()
   {
      $prs = Pr::orderBy('created_at', 'desc')->get();
      return view('prs.index', compact('prs'));
   }
}
