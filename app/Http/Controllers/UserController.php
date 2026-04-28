<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        // Busca imagem atualizada do banco e sincroniza a session
        $usuario = Usuario::find(session('user_id'));

        if ($usuario) {
            session(['user_profile_image' => $usuario->profile_image]);
        }

        return view('user.profile', ['user' => session()->all()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $usuario = Usuario::find(session('user_id'));

        if ($usuario) {
            $usuario->nome  = $request->nome;
            $usuario->email = $request->email;
            $usuario->save();
        }

        session(['user_name' => $request->nome, 'user_email' => $request->email]);

        return redirect()->route('user.profile')
            ->with('toast', ['type' => 'success', 'message' => 'Perfil atualizado com sucesso!']);
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $usuario = Usuario::find(session('user_id'));

        if (!$usuario) {
            return redirect()->route('user.profile')
                ->with('toast', ['type' => 'error', 'message' => 'Usuário não encontrado.']);
        }

        // Remove imagem antiga se não for a default
        if ($usuario->profile_image && $usuario->profile_image !== 'default-non-user.jpg') {
            Storage::disk('public')->delete('img-profiles/' . $usuario->profile_image);
        }

        // Salva nova imagem
        $filename = 'user_' . $usuario->id . '_' . time() . '.' . $request->file('profile_image')->getClientOriginalExtension();
        $request->file('profile_image')->storeAs('img-profiles', $filename, 'public');

        $usuario->profile_image = $filename;
        $usuario->save();

        session(['user_profile_image' => $filename]);

        return redirect()->route('user.profile')
            ->with('toast', ['type' => 'success', 'message' => 'Foto de perfil atualizada!']);
    }
}
