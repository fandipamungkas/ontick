<?php

namespace App\Http\Controllers;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = auth()->user()->tickets;
        return view('ticket.index', compact('tickets'));
    }
}
