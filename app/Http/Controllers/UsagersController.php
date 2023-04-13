<?php

namespace App\Http\Controllers;
use App\Models\SuperAdmin;
use App\Models\Admin;
use App\Models\Client;
use Session;

use Illuminate\Http\Request;

class UsagersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $log = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if($log) {
            //Récupérer les infos de l'usager
            //
            //
            return view('accueil');
        }
        else {
            return redirect()->back()->with('error', 'Courriel ou mot de passe incorrect');
        }
    }
}
