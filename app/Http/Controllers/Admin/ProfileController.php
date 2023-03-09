<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $loggedId = intval(Auth::id());

        $user = User::find($loggedId);

        if ($user){
            return view('admin.profile.profile', [
                'user' => $user
            ]);
        }

        return redirect()->route('meu-perfil');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Recebendo apenas os dados abaixo do formulario
        $data = $request->only([
            'name',
            'image',
            'email',
            'password',
            'password_confirmation'
        ]);

        // Senha
        if ($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // Verificando se foi enviado alguma imagem, se existir ira deletar e fazer o upload
        if (isset($data['image'])){
            if ($user->image && Storage::exists($user->image)){
                Storage::delete($user->image);
            }
            $path = $data['image']->store('users');
            $data['image'] = $path;
        }

        $update = $user->update($data);

        if ($update){
            return redirect()->route('profile')->with('success', 'Sucesso ao atualizar!');
        }

        return redirect()->back()->with('error', 'Erro ao atualizar o perfil!');
    }
}
