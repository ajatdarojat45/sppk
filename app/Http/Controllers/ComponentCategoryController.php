<?php

namespace App\Http\Controllers;

use App\ComponentCategory;
use Illuminate\Http\Request;

class ComponentCategoryController extends Controller
{
   public function index()
   {
      $componentCategories = ComponentCategory::orderBy('name', 'asc')->get();
      return view('componentCategories.index', compact('componentCategories'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'name' => 'required'
      ]);

      $componentCategory = ComponentCategory::create([
         'name' => $request->name
      ]);

      return back()->with('success', 'Data saved');
   }
}
