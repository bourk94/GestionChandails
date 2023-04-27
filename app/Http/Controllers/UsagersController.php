<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usager;
use App\Http\Requests\UsagerRequest;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Session;

class usagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usagers = usager::all();
        return view('usagers.index', compact('usagers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usagers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAdmin(AdminRequest $request)
    {
        try {
            $usager = new Usager();
            $usager->nom = $request->nom;
            $usager->prenom = $request->prenom;
            $usager->email = $request->email;
            $usager->password = Hash::make(str::random(16));
            $usager->type = "admin";
            $usager->save();

            $request->validate(['email' => 'required|email']);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);

            return redirect()->route('usagers.login')->with('success', 'usager créé avec succès');
        } catch (\Throwable $e) {
            Log::error("Erreur lors de l'ajout d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout d\'un usager');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsagerRequest $request)
    {
        try {
            $usager = new Usager();
            $usager->nom = $request->nom;
            $usager->prenom = $request->prenom;
            $usager->email = $request->email;
            if ($request->password == $request->password_confirmation)
                $usager->password = Hash::make($request->password);
            $usager->save();
            return redirect()->route('usagers.login')->with('success', 'usager ajouté avec succès');
        } catch (\Throwable $e) {
            Log::error("Erreur lors de l'ajout d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout d\'un usager');
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
        return view('usagers.show', ['usager' => usager::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usager = usager::findOrFail($id);
        return view('usagers.edit', compact('usager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsagerRequest $request, $id)
    {
        try {
            $usager = usager::findOrFail($id);
            $oldPassword = $request->oldPassword;
            $newPassword = $request->password;
            if (empty($newPassword) && $request->email == $usager->email) {
                $usager->update($request->except('password', 'email'));
                return redirect()->route('usagers.update', $usager->id)->with('success', 'usager modifié avec succès');
            }
            if (empty($newPassword) && $request->email != $usager->email) {
                $usager->update($request->except('password'));
                return redirect()->route('usagers.update', $usager->id)->with('success', 'usager modifié avec succès');
            }
            if (($request->email == $usager->email) && Hash::check($oldPassword, $usager->password)) {
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.update', $usager->id)->with('success', 'usager modifié avec succès');
            }
            if (Hash::check($oldPassword, $usager->password) && ($request->email != $usager->email)) {
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.update', $usager->id)->with('success', 'usager modifié avec succès');
            } else {
                return redirect()->back()->withErrors(['Mot de passe incorrect']);
            }
        } catch (\Throwable $e) {
            Log::error("Erreur lors de la modification d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de la modification d\'un usager');
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
            $usager = usager::findOrFail($id);
            $usager->delete();
            return redirect()->route('usagers.index')->with('success', 'usager supprimé avec succès');
        } catch (\Throwable $e) {
            Log::error("Erreur lors de la suppression d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de la suppression d\'un usager');
        }
    }

    public function showLoginForm()
    {
        return view('usagers.login');
    }



    public function login(Request $request)
    {

        $reussi = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($reussi) {

            $usagers = Usager::all();

            log::debug('Connexion réussie');
            return redirect()->route('accueil', compact('usagers'))->with('success', 'Connexion réussie');
        } else {
            log::debug("Email ou mot de passe incorrect");
            return redirect()->route('usagers.login')->withErrors(['Email ou mot de passe incorrect']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('usagers.login')->with('success', 'Déconnexion réussie');
    }
}
