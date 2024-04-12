<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::select('SELECT * FROM users');

        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        // Obtener los datos del formulario
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $status = $request->input('status');

        // Hacer la inserción en la base de datos
        $query = "INSERT INTO users (name, email, password, status, phone) VALUES (?, ?, ?, ?, ?)";
        DB::insert($query, [$name, $email, Hash::make($password), $status, $phone]);

        // Devolver un mensaje de éxito en formato JSON
        return response()->json(['message' => 'El usuario se ha ingresado correctamente en la base de datos']);
    }

    public function edit($id)
    {
        $users = User::find($id);

        return view('users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $status = $request->input('status');

        $query = "UPDATE users SET name = ?, email = ?, password = ?, status = ?, phone =? WHERE id = ?";
        DB::update($query, [$name, $email, Hash::make($password), $status, $phone, $id]);

        return redirect()->route('users.index');
    }
}
