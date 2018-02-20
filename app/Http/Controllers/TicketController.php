<?php

namespace App\Http\Controllers;

use Auth;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
   public function index($stat)
   {
      $user = Auth::user()->id;
      // get data
      if (Auth::user()->mutationActive()->department->id == 1) {
         if ($stat == 'new') {
            $tickets = Ticket::where('stat', 0)->orderBy('created_at', 'desc')->get();
         }elseif ($stat == 'process') {
            $tickets = Ticket::where('stat', 1)->orderBy('created_at', 'desc')->get();
         }elseif ($stat == 'close') {
            $tickets = Ticket::where('stat', 2)->orderBy('created_at', 'desc')->get();
         }
      }else{
         if ($stat == 'new') {
            $tickets = Ticket::where('stat', 0)
                              ->whereHas('mutation', function($query) use($user) {
                                       $query->where('employee_id', $user);
                                       })
                              ->orderBy('created_at', 'desc')
                              ->get();
         }elseif ($stat == 'process') {
            $tickets = Ticket::where('stat', 1)
                              ->whereHas('mutation', function($query) use($user) {
                                       $query->where('employee_id', $user);
                                       })
                              ->orderBy('created_at', 'desc')
                              ->get();
         }elseif ($stat == 'close') {
            $tickets = Ticket::where('stat', 2)
                              ->whereHas('mutation', function($query) use($user) {
                                       $query->where('employee_id', $user);
                                       })
                              ->orderBy('created_at', 'desc')
                              ->get();
         }
      }

      return view('tickets.index', compact('tickets', 'stat'));
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
         'mutation_id'  => Auth::user()->mutationActive()->id,
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
