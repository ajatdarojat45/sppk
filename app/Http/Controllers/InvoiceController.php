<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
   public function index()
   {
      $invoices = Invoice::orderBy('created_at', 'desc')->get();
      return view('invoices.index', compact('invoices'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'no'        => 'required',
         'store'     => 'required',
         'address'   => 'required',
         'date'      => 'required',
      ]);

      $invoice = Invoice::create([
         'code'      => 'INV-'.time(),
         'no'        => $request->no,
         'store'     => $request->store,
         'address'   => $request->address,
         'date'      => $request->date,
      ]);

      return back()->with('success', 'Data saved');
   }
}
