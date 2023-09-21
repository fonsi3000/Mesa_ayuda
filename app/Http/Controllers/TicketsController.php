<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\TicketsAsignadosController;
use App\Mail\Centro_de_asistencia;
use App\Mail\Ticket_resuelto;

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
    
    $userRoles = Auth::user()->roles->pluck('name')->toArray(); // Obtener los roles del usuario autenticado

    if (in_array('admin', $userRoles)) {
        // El administrador puede ver todos los tickets
        $tickets = Ticket::all();
    } elseif (in_array('agent', $userRoles)) {
        // Los agentes solo pueden ver los tickets asignados a ellos
        $tickets = Ticket::where('agent_asignado', Auth::user()->name)->get();
    } else {
        // Los usuarios solo pueden ver los tickets que han enviado
        $tickets = Ticket::where('user_id', Auth::id())->get();
    }
    
    return view('content.tickets.tickets', [
        'ticket' => $tickets,
        'n_users' => $n_users,
        'n_categories' => $n_categories,
        'TicketsAbiertos' => $TicketsAbiertos,
        'TicketsAsignados' => $TicketsAsignados,
        'TicketsCerrados' => $TicketsCerrados,
    ]);
}


    public function index2() {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $tickets = Ticket::where('user_id', $userId)->get(); // Filtrar los tickets por user_id
    
        return view('content.tickets.mistickets', ['ticket'=> $tickets]);
    }
    

    public function ticket_resueltos()
    {
        $userRoles = Auth::user()->roles->pluck('name')->toArray(); // Obtener los roles del usuario autenticado
    
        if (in_array('admin', $userRoles)) {
            // El administrador puede ver todos los tickets
            $ticket = Ticket::all();
        } elseif (in_array('agent', $userRoles)) {
            // Los agentes solo pueden ver los tickets asignados a ellos
            $ticket = Ticket::where('agent_asignado', Auth::user()->name)->get();
        } else {
            // Los usuarios solo pueden ver los tickets que han enviado
            $ticket = Ticket::where('user_id', Auth::id())->get();
        }
    

        return view('content.tickets.tickets_resueltos', ['ticket' => $ticket]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = auth()->user()->categories;
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
        $validator = $request->validate([
            'category_id' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'documento_1' => 'file|mimetypes:image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document', // Validar que sea un archivo de los tipos permitidos
            'documento_2' => 'file|mimetypes:image/jpeg,image/png,image/gif,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);

         // Almacenamiento de archivos
         $documento1Path = null;
         if ($request->hasFile('documento_1')) {
             $documento1Path = $request->file('documento_1')->store('documentos', 'public');
         }
 
         $documento2Path = null;
         if ($request->hasFile('documento_2')) {
             $documento2Path = $request->file('documento_2')->store('documentos', 'public');
         }
    
        // Obtener la categoría seleccionada por el usuario desde el formulario (ajusta según tu formulario)
        $category_id = $request->input('category_id');
    
        // Buscar un agente con la misma categoría (asumiendo que los agentes tienen un rol 'agent')
        $randomAgent = User::whereHas('categories', function ($query) use ($category_id) {
            $query->where('categories.id', $category_id); // Calificar la columna 'id'
        })->whereHas('roles', function ($query) {
            $query->where('roles.name', 'agent'); // Calificar la columna 'name'
        })->inRandomOrder()->first();
    
        // Crear un nuevo registro de ticket con los detalles proporcionados
        $ticket = new Ticket([
            'category_id' => $category_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'documento_1' => $documento1Path, // Ruta del archivo 1
            'documento_2' => $documento2Path, // Ruta del archivo 2
            'user_id' => Auth::id(),
            'agent_asignado' => $randomAgent->name, // Asigna el nombre del agente
            // otros campos del ticket
        ]);
    
        // Guardar el ticket en la base de datos
        $ticket->save();

        $userEmail = Auth::user()->email;


        Mail::to($userEmail)->send(new Centro_de_asistencia());
    
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
            'respuesta' => $request->respuesta,
            // ... (otros campos)
        ]);
        // Obtén la dirección de correo electrónico del usuario que creó el ticket
        $userEmail = $ticket->user->email;

        // Envía el correo al usuario que creó el ticket
        Mail::to($userEmail)->send(new Ticket_resuelto());
    
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
