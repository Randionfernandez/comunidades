<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ComunidadUser;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
//use App\Models\Propietario;
//use App\Http\Requests\PropietariosRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private $msj = '';

    public function __construct() {
       
    }

    public function index()
    {   
        $cmd_seleccionada = session()->get('cmd_seleccionada');
        $users = User::join('comunidad_user', 'comunidad_user.user_id', '=', 'users.id')
            ->where('comunidad_user.comunidad_id','=', $cmd_seleccionada->id)
            ->where('comunidad_user.role_id','=', 3)->get();
        
        return view('usuarios.index', [
            'users' => $users,
            'cmd_seleccionada' => $cmd_seleccionada
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreatesNewUsers $creator)
    {
        $this->msj = 'Se ha creado el usuario';
        
        event(new Registered($user = $creator->create($request->all())));
        
        $new_user = User::latest('created_at')->first();
        
        $cmd_seleccionada = session()->get('cmd_seleccionada');

        ComunidadUser::create([
            'comunidad_id' => $cmd_seleccionada->id,
            'user_id' => $new_user->id,
            'role_id' => '3',
            'created_at' => $new_user->created_at,
            'updated_at' => $new_user->updated_at
        ]);
        
        return redirect()->route('usuarios.index')->with('status', [$this->msj, 'alert-success']);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('usuarios.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //

        return view('usuarios.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->msj = 'User updated successfully';
        $user->update($request->validated());
    
        return redirect()->route('usuarios.index')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->msj = 'User deleted successfully';
        $user->delete();
    
        return redirect()->route('usuarios.index')->with('status', [$this->msj, 'alert-danger']);
    }
}
