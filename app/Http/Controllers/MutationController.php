<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mutation;

class MutationController extends Controller
{
   public function store(Request $request)
   {
      $this->validate($request, [
         'sk'           => 'required',
         'salary'       => 'required',
         'date'         => 'required',
         'employee'     => 'required',
         'position'     => 'required',
         'duty'         => 'required',
         'department'   => 'required',
         'branch'       => 'required',
         'stat'         => 'required',
      ]);

      $mutation = Mutation::create([
         'code'            => 'ID-'.time(),
         'sk'              => $request->sk,
         'salary'          => $request->salary,
         'date'            => $request->date,
         'employee_id'     => $request->employee,
         'position_id'     => $request->position,
         'duty_id'         => $request->duty,
         'department_id'   => $request->department,
         'branch_id'       => $request->branch,
         'stat'            => $request->stat,
      ]);

      return back()->with('success', 'Data saved');
   }
}
