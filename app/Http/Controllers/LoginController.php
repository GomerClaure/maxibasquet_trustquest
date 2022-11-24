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
        $formulario = request()->except('_token');
        $request->validate([
            $this->nombreUsuario=> ['required','alpha_num','min:4','max:64'],
            $this->contrasenia => ['required', 'min:7'],
        ]);
        $usuario = User::where('name',$formulario[$this->nombreUsuario]) -> first();
        
        if($usuario){
            echo 'Entra al login';
            $nomUsuario = $usuario->name;
            $contra = $usuario->password;
            echo $contra;
            if (Hash::check($formulario[$this->contrasenia], $contra)) {
                $credentials = $this->getLoginRequest($formulario);
                // print_r($credentials);
                $userAuth = Auth::getProvider()->retrieveByCredentials($credentials);
                Auth::login($userAuth);
                // echo "Las contraseñas coinciden";
                return redirect('/home');
            }else{
                // echo "contraseña incorrecta wey";
            }
        }else {
            // echo "No encuentra al usuarios";
        }
        return back()->withInput()->with('errorLogin','El nombre de usuario o contraseña es incorrecto.');
    }

    private function getLoginRequest($formulario){
        return [
            'name' => $formulario[$this->nombreUsuario],
            'password' => $formulario[$this->contrasenia],
        ];
    }
}