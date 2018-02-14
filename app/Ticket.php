<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
   protected $fillable = [
      'code', 'title', 'description', 'stat', 'mutation_id',
   ];

   protected $with = [
      'mutation',
   ];

   public function mutation()
   {
      return $this->belongsTo(Mutation::class);
   }

   public function getLabelStat($stat)
   {
      if ($stat == 0) {
         return '<span class="label label-warning">Waiting</span>';
      }elseif ($stat == 1) {
         return '<span class="label label-primary">Proccess</span>';
      }elseif ($stat == 2) {
         return '<span class="label label-danger">Close</span>';
      }
   }
}
