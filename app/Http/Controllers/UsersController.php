<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Users;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        return view('content.users.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.users.users-create');
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
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]
        );
        $user = new User();
        $user -> name = $request-> name;
        $user -> email = $request-> email;
        $user -> password = Hash::make($request->newPassword);
        $user -> save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $roles = Role::all();
    $user = User::find($id);
    $categories = Categories::all();

    return view('content.users.users-show', compact('user', 'roles', 'categories'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $roles = Role::all();
            $user = User::find($id);
            return view('content.users.users-show',['user'=> $user],['roles'=> $roles]);
        }
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
        $user = User::find($request->user_id);
        $user -> name = $request-> name;
        $user -> email = $request-> email;
        if (!empty($request->newPassword)) {
            $user -> password = Hash::make($request->newPassword);
        }
         // Obtén el nuevo rol del formulario
          $roleName = $request->input('role');
        // Elimina todos los roles actuales del usuario y asigna el nuevo rol
        $user->syncRoles($roleName);
       
        $user -> save();

            // Obtén las categorías seleccionadas del formulario
        $selectedCategories = $request->input('categories', []);

        // Sincroniza las categorías seleccionadas en la tabla pivot category_user
        $user->categories()->sync($selectedCategories);


        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
