<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComputerMutation extends Model
{
   protected $fillable = ['code', 'computer_id', 'mutation_id', 'date'];

   protected $with = ['computer', 'mutation'];

   public function computer()
   {
      return $this->belongsTo(Computer::class);
   }

   public function mutation()
   {
      return $this->belongsTo(Mutation::class);
   }
}
