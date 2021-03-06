<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComponentComputer extends Model
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
}
