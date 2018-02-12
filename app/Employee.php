<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   protected $with = ['religion'];

   protected $fillable = [
      'religion_id', 'blood', 'nik', 'name', 'sex', 'placeOfBirth', 'dateOfBirth'
   ];

   public function religion()
   {
      return $this->belongsTo(Religion::class);
   }

   public function mutations()
   {
      return $this->hasMany(Mutation::class);
   }

   public function mutationActive()
	{
		return $this->mutations()->whereDate('date', '<=', \Carbon\Carbon::today()->toDateString())->first();
	}
}
