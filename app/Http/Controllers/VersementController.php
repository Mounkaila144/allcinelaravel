<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Versement;
use Illuminate\Http\Request;
class VersementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request, Versement $versemnt)
    {
        $versemnt = $versemnt->newQuery();
        return Versement::orderBy('id', 'ASC')->get();


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
            'idendifant' => 'required',
            'prix' => 'required',
        ]);

        $save = new Versement();
        $save->identifiant = (int)$request->input(["identifiant"]);
        $save->prix = (int)$request->input(["prix"]);
        $save->save();

        return response()->json($save);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Versement $categorie
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $Versement = Versement::find($id);

        return response()->json($Versement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $categorie = Versement::findOrFail($id);
        $data = [];

        $request->has('prix') ? $data["prix"] = (int)$request->input(["prix"]) : null;
        $request->has('identifiant') ? $data["identifiant"] = (int)$request->input(["identifiant"]) : null;
        $categorie->update($data);
        return response()->json($categorie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Versement $categorie
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id,Article $article): \Illuminate\Http\JsonResponse
    {

        $Versement = Versement::findOrFail($id);

            $Versement->delete();

        return response()->json(null);
    }


}
