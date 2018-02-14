<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
   public function index()
   {
      // get data
      $tickets = Ticket::orderBy('created_at', 'desc')->get();

      return view('tickets.index', compact('tickets'));
   }

   public function create()
   {
      return view('tickets.create');
   }

   public function store(Request $request)
   {
      // data validate
      $this->validate($request, [
         'title'        => 'required',
         'description'  => 'required',
      ]);
      // store to db
      $ticket = Ticket::create([
         'code'         => 'TICK-'.time(),
         'title'        => $request->title,
         'description'  => $request->description,
         'stat'         => 0,
         'mutation_id'  => 1,
      ]);

      return back()->with('success', 'Date saved');
   }

   public function detail($code)
   {
      // get data
      $ticket = Ticket::where('code', $code)->first();
      // check
      if (!empty($ticket)) {
         return view('tickets.detail', compact('ticket'));
      }else{
         abort(404);
      }
   }

   public function process($id)
   {
      // get data
      $ticket = Ticket::findOrFail($id);
      // update data
      $ticket->stat = 1;
      $ticket->save();

      return back()->with('success', 'Data updated');
   }
}
