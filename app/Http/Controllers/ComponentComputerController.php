<?php

namespace App\Http\Controllers;

use App\ComponentComputerHistory;
use Illuminate\Http\Request;
use App\ComponentComputer;

class ComponentComputerController extends Controller
{
   public function store($component_id, $computer_id)
   {
      $componentComputer = ComponentComputer::create([
         'code'         => 'MAIN-'.time(),
         'component_id' => $component_id,
         'computer_id'  => $computer_id,
      ]);

      $componentComputerHistory = New ComponentComputerHistory;
      $componentComputerHistory->store($componentComputer);

      return back()->with('success', 'Data saved');
   }
}
