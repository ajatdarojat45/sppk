<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComponentCategory;
use App\Component;
use App\InvoicePr;
use App\Invoice;
use App\Pr;

class ComponentController extends Controller
{
   public function index()
   {
      $components = Component::orderBy('created_at', 'desc')->get();

      return view('components.index', compact('components'));
   }

   public function create()
   {
      $categories = ComponentCategory::orderBy('name', 'asc')->get();
      $invoices = Invoice::orderBy('created_at', 'desc')->get();
      $prs = Pr::orderBy('created_at', 'desc')->get();

      return view('components.create', compact('categories', 'invoices', 'prs'));
   }

   public function store(Request $request)
   {
      $this->validate($request, [
         'merk'         => 'required',
         'model'        => 'required',
         'price'        => 'required',
         'category'     => 'required',
         'invoice'      => 'required',
         'pr'           => 'required',
      ]);

      $invoicePr = new InvoicePr;
      $invoicePr_id = $invoicePr->store($request->pr, $request->invoice);

      $component = Component::create([
         'code'                  => 'COMPNT-'.time(),
         'merk'                  => $request->merk,
         'model'                 => $request->model,
         'price'                 => $request->price,
         'component_category_id' => $request->category,
         'invoice_pr_id'         => $invoicePr_id,
      ]);

      return back()->with('success', 'Data saved');

   }
}
