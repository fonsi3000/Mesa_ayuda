<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\TicketsAsignadosController;

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

        $TicketsAbiertos = Ticket::where('agent_asignado', null)->count();
        $TicketsAsignados = Ticket::whereNotNull('agent_asignado')->count();
        $TicketsCerrados = Ticket::whereNotNull('respuesta')->count();

        // Resta el número de TicketsAsignados por cada TicketsCerrados
        $TicketsAsignados -= $TicketsCerrados;
        
        return view('content.tickets.tickets', ['ticket'=> $tickets,'n_users' => $n_users, 'n_categories' => $n_categories,
        'TicketsAbiertos' => $TicketsAbiertos,'TicketsAsignados' => $TicketsAsignados,'TicketsCerrados' => $TicketsCerrados]);
    
        return view('content.tickets.mistickets', ['ticket'=> $tickets]);
    }

    public function index2() {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $tickets = Ticket::where('user_id', $userId)->get(); // Filtrar los tickets por user_id
    
        return view('content.tickets.mistickets', ['ticket'=> $tickets]);
    }

    public function ticket_asignado()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $userRoles = Auth::user()->roles->pluck('name')->toArray(); // Obtener los roles del usuario

        $ticket = Ticket::where(function ($query) use ($userId, $userRoles) {
        $query->where('user_id', $userId)
              ->orWhere('agent_asignado', $userId);

        // Verificar si el usuario tiene el rol 'admin'
        if (in_array('admin', $userRoles)) {
            $query->orWhereNotNull('agent_asignado');
        }
    })->whereNotNull('agent_asignado') // Filtrar solo los tickets asignados
      ->get();

    return view('content.tickets.tickets_asignados', ['ticket' => $ticket]);
    }

    public function ticket_resueltos()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $userRoles = Auth::user()->roles->pluck('name')->toArray(); // Obtener los roles del usuario

        $ticket = Ticket::where(function ($query) use ($userId, $userRoles) {
        $query->where('user_id', $userId)
              ->orWhere('agent_asignado', $userId);

        // Verificar si el usuario tiene el rol 'admin'
        if (in_array('admin', $userRoles)) {
            $query->orWhereNotNull('agent_asignado');
        }
    })->whereNotNull('agent_asignado') // Filtrar solo los tickets asignados
      ->get();

        return view('content.tickets.tickets_resueltos', ['ticket' => $ticket]);
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
        $messages = [
            'cedula.numeric' => 'El campo cedula solo puede contener números.',
            'contacto.numeric' => 'El campo contacto solo puede contener números.',
            // Otros mensajes de error aquí
        ];
        $validator = $request->validate(
            [
                'cedula' => 'required|numeric',
                'contacto' => 'required|numeric',
                'category_id' => 'required',
                'titulo' => 'required',
                'descripcion' => 'required',
                
            ],$messages);
        
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
            return redirect()->route('mis.tickets');
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
        $users = User::all();

        
        return view('content.tickets.tickets-show',['ticket'=> $ticket, 'users' => $users]);
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
    public function update(Request $request, Ticket $ticket)
{
    $request->validate([
        // ... (otras validaciones)
        'agent_asignado' => 'nullable|exists:users,id',
        
        // ... (otras validaciones)
    ]);

    $ticket->update([
        // ... (otros campos)
        'agent_asignado' => $request->agent_asignado,
        'respuesta' => $request->respuesta,
        // ... (otros campos)
    ]);

    return redirect()->route('tickets.index', $ticket->id)
        ->with('success', 'Ticket actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticket)
    {
        $ticket = Ticket::find($ticket);
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
