<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicePr extends Model
{
   protected $fillable = ['invoice_id', 'pr_id'];

   protected $with = ['invoice', 'pr'];

   public function invoice()
   {
      return $this->belongsTo(Invoice::class);
   }

   public function pr()
   {
      return $this->belongsTo(Pr::class);
   }

   public function store($pr, $invoice)
   {
      $invoicePr = InvoicePr::where('pr_id', $pr)
                           ->where('invoice_id', $invoice)->first();

      if (empty($invoicePr)) {
         $invoicePr = InvoicePr::create([
            'pr_id'        => $pr,
            'invoice_id'   => $invoice,
         ]);

         return $invoicePr->id;

      }else {
         return $invoicePr->id;
      }
   }
}
