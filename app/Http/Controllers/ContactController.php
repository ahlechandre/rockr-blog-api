<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Determina a quantidade de recursos por página através de Query String.
        // Por padrão, 5.
        $perPage = $request->query('per-page', 5);

        return Contact::orderBy('created_at', 'desc')
            ->simplePaginate($perPage);
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
            'message' => 'required|string|max:2000',
        ]);

        // Cria o contato e retorna o registro.
        return Contact::create($request->all());
    }
}
