<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentComputerHistory extends Model
{
   protected $fillable = ['code', 'component_id', 'computer_id'];

   protected $with = ['component', 'computer'];

   public function component()
   {
      return $this->belongsTo(Component::class);
   }

   public function computer()
   {
      return $this->belongsTo(Computer::class);
   }

   public function store($componentComputer)
   {
      $componentComputerHistory = $this->create([
         'code'         => $componentComputer->code,
         'component_id' => $componentComputer->component_id,
         'computer_id'  => $componentComputer->computer_id,
      ]);

      return;
   }
}
