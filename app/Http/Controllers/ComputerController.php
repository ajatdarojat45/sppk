<?php

namespace App\Http\Controllers;

use App\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
   public function index()
   {
      $computers = Computer::orderBy('created_at', 'desc')->get();

      return view('computers.index', compact('computers'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name' => 'required',
      ]);

      $computer = Computer::create([
         'code'   => 'COMP-'.time(),
         'name'   => $request->name,
      ]);

      return back()->with('success', 'Data saved');
   }
}
