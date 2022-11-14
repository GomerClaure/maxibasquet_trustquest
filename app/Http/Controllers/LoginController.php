<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use PhpOption\None;

class LoginController extends Controller
{
    private $nombreUsuario;
    private $contrasenia;
    function __construct()
    {
        $this->nombreUsuario = 'nombreDeUsuario';
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
            $this->nombreUsuario=> ['required', 'max:15'],
            $this->contrasenia => ['required', 'max:15'],
        ]);
        echo "holi";
        $usuario = User::where('name',$formulario[$this->nombreUsuario]) -> first();
        
        if($usuario){
            $nomUsuario = $usuario->name;
            $contra = $usuario->password;
            if (Hash::check($formulario[$this->contrasenia], $contra)) {
                $credentials = $this->getLoginRequest($formulario);
                // print_r($credentials);
                $userAuth = Auth::getProvider()->retrieveByCredentials($credentials);
                Auth::login($userAuth);
                echo "Las contraseñas coinciden";
                return redirect('/home');
            }
            
        }
        return back()->withInput()->with('errorLogin','El nombre de usuario o contraseña es incorrecto, por favor ingresa tus datos nuevamente.');
        
        // echo $nomUsuario;
        // try{
        //     $usuario = User::where('name',$formulario[$this->nombreUsuario]) -> first();
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

    private function getLoginRequest($formulario){
        return [
            'name' => $formulario[$this->nombreUsuario],
            'password' => $formulario[$this->contrasenia],
        ];
    }
}