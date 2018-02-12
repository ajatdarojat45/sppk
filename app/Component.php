<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
   protected $fillable = [
      'code', 'merk', 'model', 'price', 'component_category_id', 'invoice_pr_id',
   ];

   protected $with = [
      'componentCategory', 'invoicePr',
   ];

   public function componentCategory()
   {
      return $this->belongsTo(ComponentCategory::class);
   }

   public function invoicePr()
   {
      return $this->belongsTo(InvoicePr::class);
   }
}
