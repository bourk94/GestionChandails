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

class UsagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usagers = Usager::all();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAdmin()
    {
        return view('admin.create');
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
        }
        catch(\Throwable $e) {
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
            return redirect()->route('usagers.login')->with('success', 'usager créé avec succès');
        }
        catch(\Throwable $e) {
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
        return view('usagers.show', ['usager' => Usager::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $usager = Auth::user();
        if ($usager->type == "admin") {
            return view ('admin.edit', compact('usager'));
        }
        else if ($usager->type == "client"){
            return view ('usagers.edit', compact('usager'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UsagerRequest $request)
    {
        try {
            $usager = Auth::user();
            $old_password = $request->old_password;
            $newPassword = $request->password;
            if (empty($newPassword) && $request->email == $usager->email) {
                $usager->update($request->except('password', 'email'));
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }
            if (empty($newPassword) && $request->email != $usager->email) {
                $usager->update($request->except('password'));
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }
            if (($request->email == $usager->email) && Hash::check($old_password, $usager->password)){
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }   
            if (Hash::check($old_password, $usager->password) && ($request->email != $usager->email)) {
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }
            else {
                return redirect()->back()->withErrors(['Mot de passe incorrect']);
            }
        } catch (\Throwable $e) {
            Log::error("Erreur lors de la modification d'un usager: ", [$e]);
            return redirect()->back()->with('error', 'Erreur lors de la modification d\'un usager');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(AdminRequest $request)
    {
        try {
            $usager = Auth::user();
            $old_password = $request->old_password;
            $newPassword = $request->password;
            if(empty($newPassword) && $request->email == $usager->email) {
                $usager->update($request->except('password', 'email'));
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }
            if(empty($newPassword) && $request->email != $usager->email)
            {
                $usager->update($request->except('password'));
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }
            if (($request->email == $usager->email) && Hash::check($old_password, $usager->password)){
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }   
            if (Hash::check($old_password, $usager->password) && ($request->email != $usager->email)) {
                $usager->nom = $request->nom;
                $usager->prenom = $request->prenom;
                $usager->email = $request->email;
                $usager->password = Hash::make($newPassword);
                $usager->save();
                return redirect()->route('usagers.edit')->with('success', 'usager modifié avec succès');
            }
            else {
                return redirect()->back()->withErrors(['Mot de passe incorrect']);
            }
        }
        catch(\Throwable $e) {
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
            $usager = Usager::findOrFail($id);
            $usager->delete();
            return redirect()->route('accueil')->with('success', 'usager supprimé avec succès');
        }
        catch(\Throwable $e) {
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

            Session::put('user', $request->email);

            log::debug ('Connexion réussie');
            if ($request->has('modal')) {
                return redirect()->route('cart.list', compact('usagers'))->with('success', 'Connexion réussie');
            }
            else {
                return redirect()->route('accueil', compact('usagers'))->with('success', 'Connexion réussie');
            }
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
