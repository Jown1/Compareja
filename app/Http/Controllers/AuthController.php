<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'O e-mail é obrigatório.',
            'email.email'       => 'Informe um e-mail válido.',
            'password.required' => 'A senha é obrigatória.',
            'password.min'      => 'A senha deve ter no mínimo 6 caracteres.',
        ]);

        $usuario = Usuario::findByEmail($request->email);

        if (!$usuario || !Hash::check($request->password, $usuario->senha)) {
            return back()->with('login_error', 'E-mail ou Senha incorreta!');
        }

        session([
            'user_id'            => $usuario->id,
            'user_name'          => $usuario->nome,
            'user_email'         => $usuario->email,
            'user_profile_image' => $usuario->profile_image,
            'is_admin'           => $usuario->is_admin ?? false,
            'logged_in'          => true,
        ]);

        return redirect()->route('produto.index');
    }

    public function logout()
    {
        session()->flush();
        session()->regenerate();

        return redirect()->route('auth.login');
    }

    public function register()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'user.name'     => 'required|string|max:255',
            'user.email'    => 'required|email|unique:usuario,email',
            'user.password' => 'required|min:6|confirmed',
        ], [
            'user.name.required'      => 'O nome é obrigatório.',
            'user.email.required'     => 'O e-mail é obrigatório.',
            'user.email.unique'       => 'Este e-mail já está cadastrado.',
            'user.password.required'  => 'A senha é obrigatória.',
            'user.password.min'       => 'A senha deve ter no mínimo 6 caracteres.',
            'user.password.confirmed' => 'As senhas não conferem.',
        ]);

        $data = $request->input('user');

        if (Usuario::createFromRequest($data)) {
            return redirect()->route('auth.login')
                ->with('register_success', 'Cadastro realizado com sucesso! Faça login para continuar.');
        }

        return back()->with('register_error', 'Ocorreu um erro ao tentar cadastrar. Tente novamente mais tarde.');
    }
}
