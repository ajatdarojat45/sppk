<?php

namespace App\Http\Controllers;

use App\Mutation;
use App\Computer;
use App\Component;
use Illuminate\Support\Facades\DB;
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

   public function detail($id)
   {
      $mutations = MUtation::whereRaw('id in (select max(id) from mutations where date < now() group by (employee_id))')->get();
      $components = Component::doesntHave('componentComputer')->get();
      $computer = Computer::findOrFail($id);

      return view('computers.detail', compact('computer', 'components', 'mutations'));
   }
}
