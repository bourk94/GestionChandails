<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuperAdmin;
use App\Models\Administrateur;
use App\Models\Client;
use App\Models\Usager;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\AdministrateurRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class clientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        try {    
            $client = new Client($request->all());
            if ($client->password == $client->passwordConfirmation)
            $client->password = Hash::make($request->password);
            $client->save();
            return redirect()->route('clients.login')->with('success', 'client ajouté avec succès');
        }
        catch(\Throwable $e) {
            Log::error("Erreur lors de l'ajout d'un client: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout d\'un client');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('clients.show', ['client' => client::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(clientRequest $request, $id)
    {
        try {
            $client = client::findOrFail($id);
            $oldPassword = $request->oldPassword;
            $newPassword = $request->password;
            if(empty($newPassword) && $request->email == $client->email) {
                $client->update($request->except('password', 'email'));
                return redirect()->route('clients.update', $client->id)->with('success', 'client modifié avec succès');
            }
            if(empty($newPassword) && $request->email != $client->email)
            {
                $client->update($request->except('password'));
                return redirect()->route('clients.update', $client->id)->with('success', 'client modifié avec succès');
            }
            if (($request->email == $client->email) && Hash::check($oldPassword, $client->password)){
                $client->nom = $request->nom;
                $client->prenom = $request->prenom;
                $client->email = $request->email;
                $client->password = Hash::make($newPassword);
                $client->save();
                return redirect()->route('clients.update', $client->id)->with('success', 'client modifié avec succès');
            }   
            if (Hash::check($oldPassword, $client->password) && ($request->email != $client->email)) {
                $client->nom = $request->nom;
                $client->prenom = $request->prenom;
                $client->email = $request->email;
                $client->password = Hash::make($newPassword);
                $client->save();
                return redirect()->route('clients.update', $client->id)->with('success', 'client modifié avec succès');
            }
            else {
                return redirect()->back()->withErrors(['Mot de passe incorrect']);
            }
        }
        catch(\Throwable $e) {
            Log::error("Erreur lors de la modification d'un client: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de la modification d\'un client');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $client = client::findOrFail($id);
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'client supprimé avec succès');
        }
        catch(\Throwable $e) {
            Log::error("Erreur lors de la suppression d'un client: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de la suppression d\'un client');
        }
    }

    public function showLoginForm() {
        return view ('clients.login');
    }



    public function login(Request $request) {
        
        $reussi = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        
        if ($reussi) {
            
            $clients = Client::all();
            // $administrateurs = Administrateur::all();

            log::debug ('Connexion réussie');
            //return redirect()->route('accueil', compact('administrateurs'))->with('success', 'Connexion réussie');
            return redirect()->route('accueil', compact('clients'))->with('success', 'Connexion réussie');
        } else {
            log::debug ('Email ou mot de passe incorrect');
            return redirect()->route('clients.login')->withErrors(['Email ou mot de passe incorrect']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('clients.login')->with('success', 'Déconnexion réussie');
    }    
}
