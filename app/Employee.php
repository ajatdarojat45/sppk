<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
   use Notifiable;
   protected $table = 'employees';
   protected $with = ['religion'];
   protected $fillable = [
      'religion_id', 'blood', 'nik', 'name', 'sex', 'placeOfBirth', 'dateOfBirth', 'email', 'password',
   ];

   public function getAuthPassword()
   {
     return $this->password;
   }

   public function religion()
   {
      return $this->belongsTo(Religion::class);
   }

   public function mutations()
   {
      return $this->hasMany(Mutation::class)->orderBy('date', 'desc');
   }

   public function mutationActive()
	{
		return $this->mutations()->whereDate('date', '<=', \Carbon\Carbon::today()->toDateString())->first();
	}
}
