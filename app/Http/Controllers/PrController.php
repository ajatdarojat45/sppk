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

   public function create()
   {
      return view('prs.create');
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'note' => 'required'
      ]);

      $pr = Pr::create([
         'code'         => 'PR-'.time(),
         'note'         => $request->note,
         'mutation_id'  => 1,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function detail($id)
   {
      $pr = PR::findOrFail($id);
      return view('prs.detail', compact('pr'));
   }

   public function approve($id)
   {
      $pr = Pr::findOrFail($id);
      $pr->stat = 1;
      $pr->save();

      return back()->with('success', 'Data update');
   }
}
