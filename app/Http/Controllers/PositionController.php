<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
   public function index()
   {
      $positions = Position::orderBy('name', 'asc')->get();
      return view('positions.index', compact('positions'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name' => 'required'
      ]);

      $position = Position::create([
         'name' => $request->name
      ]);

      return back()->with('success', 'Data saved');
   }
}
