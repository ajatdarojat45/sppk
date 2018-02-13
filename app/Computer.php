<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
   protected $fillable = ['code', 'name'];

   public function componentComputers()
   {
      return $this->hasMany(ComponentComputer::class);
   }

   public function componentComputerHistories()
   {
      return $this->hasMany(ComponentComputerHistory::class);
   }

   public function computerMutations()
   {
      return $this->hasMany(ComputerMutation::class);
   }
}
