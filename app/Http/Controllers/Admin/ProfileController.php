<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Exibe o formulario Meu Perfil
     *
     * @return void
     */
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

    /**
     * Edita os dados do perfil
     *
     * @param Request $request Recebe os dados do formulario
     * @return void
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        if ($user){

            // Validando
            $request->validate([
                'name'     => 'required|string|max:100',
                'image'    => 'nullable|image|max:3072',
                'email'    => 'required|string|email|max:200|unique:users,email,' . $user->id,
                'password' => 'nullable|string|confirmed|min:8',
            ]);

            // Recebendo os dados
            $data = $request->only(['name', 'email', 'image']);

            // Verificando se foi enviado alguma imagem, se existir irá deletar e fazer o upload
            if ($request->hasFile('image')) {
                if ($user->image && Storage::exists($user->image)) {
                    Storage::delete($user->image);
                }
                $path = $request->image->store('users');
                $data['image'] = $path;
            }

            // Verificando se o input da senha
            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->input('password'));
            }

            $user->update($data);

            return redirect()->route('profile')->with('success', 'Perfil atualizado com sucesso!');
        }
    }
}
