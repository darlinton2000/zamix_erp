<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Exibe a pagina inicial listar usuarios
     * Retorna os dados dos usuarios cadastrados no BD
     *
     * @return void
     */
    public function index()
    {
        $users = User::paginate(10);
        $loggedId = intval(Auth::id());

        return view('admin.user.index', [
            'users' => $users,
            'loggedId' => $loggedId
        ]);
    }

    /**
     * Exibe o formulario Novo Usuario
     *
     * @return void
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Cadastra o usuario no BD
     *
     * @param Request $request Recebe os dados do formulario
     * @return void
     */
    public function store(Request $request)
    {
        // Recebendo os dados do formulário
        $data = $request->only([
            'name',
            'email',
            'password',
            'image'
        ]);

        // Verificando se foi enviado alguma imagem
        if (isset($data['image'])){
            $path = $data['image']->store('users');
            $data['image'] = $path;
        }

        // Inserindo no BD
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->image = $data['image'] ?? null;
        $user->save();

        return redirect()->route('users')->with('success', 'Usuario cadastrado com sucesso!');
    }

    /**
     * Deletando o usuario
     *
     * @param integer $id Recebe o id do usuario
     * @return void
     */
    public function destroy(int $id)
    {
        $loggedId = intval(Auth::id());

        if ($loggedId !== $id){
            $user = User::find($id);

            // Deletando a imagem do usuaro
            if ($user->image && Storage::exists($user->image)){
                Storage::delete($user->image);
            }

            $user->delete();
        } 

        return redirect()->route('users')->with('success', 'Usuario excluido com sucesso!');
    }

    /**
     * Exibe o formulario Editar Usuario
     *
     * @param integer $id Recebe o id do usuario
     * @return void
     */
    public function edit(int $id)
    {
        $user = User::find($id);

        if ($user){
            return view('admin.user.edit', [
                'user' => $user
            ]);
        }   

        return redirect()->route('users');
    }
}
