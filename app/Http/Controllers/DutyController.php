<?php

namespace App\Http\Controllers;

use App\Duty;
use Illuminate\Http\Request;

class DutyController extends Controller
{
   public function index()
   {
      $duties = Duty::orderBy('name', 'asc')->get();
      return view('duties.index', compact('duties'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name' => 'required'
      ]);

      $duty = Duty::create([
         'name' => $request->name
      ]);

      return back()->with('success', 'Data saved');
   }
}
