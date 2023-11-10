<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function importUsers()
    {
        // Consumir el Endpoint
        $url = 'https://dummyjson.com/users';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // recorrer los datos y guardarlos en la DB
        foreach ($data['users'] as $userData) {
            User::create([
                'firstname' => $userData['firstName'],
                'lastname' => $userData['lastName'],
                'age' => $userData['age'],
                'email' => $userData['email'],
                'image' => $userData['image'],
                'status' => 'Activo',
            ]);
        }

        return "Usuarios importados correctamente.";
    }

    public function index(){
        //consultar los datos de usuarios
        $users = User::with('aditionalData')->get();
        //dd($users);
        return view('dashboard.users.index',compact('users'));
    }

}
