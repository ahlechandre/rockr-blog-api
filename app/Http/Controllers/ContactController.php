<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida os campos do contato.
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:16',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Cria o contato e retorna o registro.
        return Contact::create($request->all());
    }
}
