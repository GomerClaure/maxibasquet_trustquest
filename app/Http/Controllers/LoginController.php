<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use PhpOption\None;

class LoginController extends Controller
{
    private $nombreUsusario;
    private $contrasenia;
    function __construct()
    {
        $this->nombreUsusario = 'nombreDeUsuario';
        $this->contrasenia = 'contraseña';
    }
    public function index()
    {   
        return view('login.loginVista');

    }

    public function verificarInicioSesion(Request $request){
        echo "holi";
        $formulario = request()->except('_token');
        $request->validate([
            $this->nombreUsusario=> ['required', 'max:15'],
            $this->contrasenia => ['required', 'max:15'],
        ]);
       
        $usuario = User::where('name',$formulario[$this->nombreUsusario]) -> first();
        if($usuario){
            $nomUsuario = $usuario->name;
            $contra = $usuario->password;
            if (Hash::check($formulario[$this->contrasenia], $contra)) {
                Auth::login($usuario);
                echo "Las contraseñas coinciden";
                return view('PaginaPrincipal.home');
            }
            
        }
        return back()->withInput()->with('errorLogin','El nombre de usuario o contraseña es incorrecto, por favor ingresa tus datos nuevamente.');
        
        // echo $nomUsuario;
        // try{
        //     $usuario = User::where('name',$formulario[$this->nombreUsusario]) -> first();
        // }
        // catch (\Throwable $th) {
        //     return back()->withInput()->with('errorLogin','El nombre de usuario o contraseña es incorrecto, por favor ingresa tus datos nuevamente.');
        // }
        
        // if (Hash::check('password', $hashedPassword)) {
                  
        // }
        // echo Hash::make("password");
        // return view('login.loginVista');
        // return $request;
    }
}