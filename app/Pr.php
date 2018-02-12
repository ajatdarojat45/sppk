<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pr extends Model
{
   protected $fillable = [
      'code', 'note', 'mutation_id'
   ];

   protected $with = ['mutation'];

   public function mutation()
   {
      return $this->belongsTo(Mutation::class);
   }
}
