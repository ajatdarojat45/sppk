<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
   public function index()
   {
      $branches = Branch::orderBy('name', 'asc')->get();
      return view('branches.index', compact('branches'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name'      => 'required',
         'address'   => 'required',
      ]);

      $branch = Branch::create([
         'name'      => $request->name,
         'address'   => $request->address,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function destroy($id)
   {
      $branch = Branch::findOrFail($id);
      $branch->delete();
      return back()->with('success', 'Data deleted');
   }
}
