<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n_users = User::count();
        $n_categories = Categories::count();
        $n_tickets = Ticket::count();

        $tickets = Ticket::all();
        return view('content.tickets.tickets', ['ticket'=> $tickets],['n_users' => $n_users, 'n_categories' => $n_categories,'n_tickets' => $n_tickets]);
    
        return view('content.tickets.mistickets', ['ticket'=> $tickets]);
    }

    public function index2() {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $tickets = Ticket::where('user_id', $userId)->get(); // Filtrar los tickets por user_id
    
        return view('content.tickets.mistickets', ['ticket'=> $tickets]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('content.tickets.tickets-create', ['categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate(
            [
                'cedula' => 'required',
                'contacto' => 'required',
                'category_id' => 'required',
                'titulo' => 'required',
                'descripcion' => 'required',
                'documento_1' => 'required',
            ]
        );
        $ticket = new Ticket();
        $ticket -> cedula = $request-> cedula;
        $ticket -> contacto = $request-> contacto;
        $ticket -> category_id = $request-> category_id;
        $ticket -> titulo = $request-> titulo;
        $ticket -> descripcion = $request-> descripcion;
        $ticket -> documento_1 = $request-> documento_1;
        $ticket -> documento_2 = $request-> documento_2;
        $ticket->user_id = Auth::id();
        $ticket -> save();

        if (Auth::user()->hasRole('user')) {
            return redirect()->route('dashboard');
        } elseif (Auth::user()->hasRole('admin') || Auth::user()->hasRole('agent')) {
            return redirect()->route('tickets.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        
        return view('content.tickets.tickets-show',['ticket'=> $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
