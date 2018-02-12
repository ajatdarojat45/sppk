<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
   public function index()
   {
      $departments = Department::orderBy('name', 'asc')->get();
      return view('departments.index', compact('departments'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name'      => 'required',
      ]);

      $department = Department::create([
         'name'      => $request->name,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function destroy($id)
   {
      $department = Department::findOrFail($id);
      $department->delete();
      return back()->with('success', 'Data deleted');
   }
}
