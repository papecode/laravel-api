<?php

namespace App\Http\Controllers;
use App\Models\Apprenant;

use Illuminate\Http\Request;

class ApprenantController extends Controller
{
    public function index()
    {
        //return redirect()->route('hello',['prenom' => 'Redirected User']);

        return redirect()->action([ApprenantController::class,'hello'],['prenom' => 'Redirected User', 'age' => 34]);
    }

    public function hello(Request $request, $prenom = 'World')
    {
        $nom = $request->query('nom');
        $age = $request->input('age');
        // return "Hello $prenom $nom ! Are you $age years old?";

       // return compact('prenom', 'nom', 'age');

       //return response()->json(compact('prenom', 'nom', 'age'));

    return response("Hello $prenom $nom ! Are you $age years old?", 200)->header('Content-Type', 'text/plain');
    }

    public function add(Request $request) {
        $newApprenant = new Apprenant;
        $newApprenant->nom = $request->nom;
        $newApprenant->age = $request->age;
        $newApprenant->save();
        return "L'apprenant a été persisté avec l'identifiant " . $newApprenant->id;
    }

    public function getOne($id) {
        $apprenant = Apprenant::find($id);
        if (!$apprenant) {
            return response("L'apprenant avec l'identifiant $id n'existe pas", 404)->header('Content-Type', 'text/plain');
        }
        return $apprenant;
    }

    // public function updateForm($id) {
    //     $apprenantToUpdate = Apprenant::find($id);
    //     return view('/update')->with('apprenToUpdate', $apprenantToUpdate);
    // }

    public function update(Request $request, $id) {
        $apprenant = Apprenant::find($id);
        $apprenant['nom'] = $request->input('nom');
        $apprenant['age'] = $request->input('age');
        $apprenant->save();
        return "L'apprenant d'$id a maintenant  $apprenant->age ans";
    }

    public function delete($id) {
        $apprenant = Apprenant::find($id);
        $apprenant->delete();
        return "L'apprenant d'identifiant $id a été supprimé";
    }
}
