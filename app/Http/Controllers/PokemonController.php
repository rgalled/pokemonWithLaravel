<?php

namespace App\Http\Controllers;

use App\Models\pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pokemon.index', [
            'lipokemon' => 'active',
            'pokemons' => pokemon::orderBy('nombre')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create', ['lipokemon' => 'active']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'  => 'required|unique:product|max:100|min:2',
            'vida'  => 'required|numeric|gte:0|lte:999',
            'defensa'  => 'required|numeric|gte:0|lte:999',
            'sexo'  => 'required|unique:product|max:10|min:2',
            'tamaño'  => 'required|numeric|gte:0|lte:999',
            'tipo'  => 'required|max:100|min:2',
        ]);
        $object = new pokemon($request->all());
        try {
            //$result = $object->save();
            $object = pokemon::create($request->all());
            return redirect('pokemon')->with(['message' => 'The pokemon has been created.']);
        } catch(\Exception $e) {
            //si no lo he guardado volver a la página anterior con sus datos para volver a rellenar el formulario y mensaje
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been created.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pokemon $pokemon)
    {
        return view('pokemon.show', ['lipokemon' => 'active',
                                        'pokemon' => $product,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pokemon $pokemon)
    {
        return view('pokemon.edit', ['lipokemon' => 'active',
                                        'pokemon' => $pokemon,]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pokemon $pokemon)
    {
        $validated = $request->validate([
            'nombre'  => 'required|unique:product|max:100|min:2',
            'vida'  => 'required|numeric|gte:0|lte:999',
            'defensa'  => 'required|numeric|gte:0|lte:999',
            'sexo'  => 'required|unique:product|max:10|min:2',
            'tamaño'  => 'required|numeric|gte:0|lte:999',
            'tipo'  => 'required|max:100|min:2',
        ]);
        try {
            $result = $pokemon->update($request->all());
            return redirect('product')->with(['message' => 'The pokemon has been updated.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The pokemon has not been updated.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pokemon $pokemon)
    {
        try {
            $pokemon->delete();
            return redirect('pokemon')->with(['message' => 'The pokemon has been deleted.']);
        } catch(\Exception $e) {
             return back()->withErrors(['message' => 'The pokemon has not been deleted.']);
        }
    }
}

