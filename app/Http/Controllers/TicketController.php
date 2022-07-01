<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = auth()->user()->tickets ;
        return view('ticket.index', compact('tickets'));
    }
}
