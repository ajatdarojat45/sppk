<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutation extends Model
{
   protected $fillable = [
      'code', 'sk', 'salary', 'date', 'employee_id', 'position_id', 'duty_id', 'department_id', 'branch_id', 'stat'
   ];

   protected $with = [
      'employee', 'position', 'duty', 'department', 'branch',
   ];

   public function employee()
   {
      return $this->belongsTo(Employee::class);
   }

   public function position()
   {
      return $this->belongsTo(Position::class);
   }

   public function duty()
   {
      return $this->belongsTo(Duty::class);
   }

   public function department()
   {
      return $this->belongsTo(Department::class);
   }

   public function branch()
   {
      return $this->belongsTo(Branch::class);
   }

   public function getStat($stat)
   {
      if ($stat == 1) {
         return '<span class="label label-warning">Probation</span>';
      }elseif ($stat == 2) {
         return '<span class="label label-info">Contract</span>';
      }elseif ($stat == 3) {
         return '<span class="label label-primary">Permanent</span>';
      }elseif ($stat == 4) {
         return '<span class="label label-danger">Resign</span>';
      }
   }
}
