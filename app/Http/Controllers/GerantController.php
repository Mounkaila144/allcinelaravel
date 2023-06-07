<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gerant;
use Illuminate\Http\Request;
class GerantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request, Gerant $gerant)
    {
        $gerant = $gerant->newQuery();
        return Gerant::orderBy('id', 'ASC')->get();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        $save = new Gerant();
        $save->prenom = $request->input(["prenom"]);
        $save->nom = $request->input(["nom"]);
        $save->save();

        return response()->json($save);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Gerant $categorie
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $Gerant = Gerant::find($id);

        return response()->json($Gerant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $categorie = Gerant::findOrFail($id);
        $data = [];

        $request->has('nom') ? $data["nom"] = $request->input(["nom"]) : null;
        $request->has('prenom') ? $data["prenom"] = $request->input(["prenom"]) : null;
        $categorie->update($data);
        return response()->json($categorie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Gerant $categorie
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id,Article $article): \Illuminate\Http\JsonResponse
    {

        $Gerant = Gerant::findOrFail($id);

            $Gerant->delete();

        return response()->json(null);
    }


}
