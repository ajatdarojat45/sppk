<?php

namespace App\Http\Controllers;

use App\ComputerMutation;
use Illuminate\Http\Request;

class ComputerMutationController extends Controller
{
   public function store($mutation, $computer)
   {
      $computerMutation = ComputerMutation::create([
         'code'         => 'MAPP-'.time(),
         'computer_id'  => $computer,
         'mutation_id'  => $mutation,
         'date'         => date('y-m-d'),
      ]);

      return back()->with('success', 'Data saved');
   }
}
