<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialityRequest;
use App\Models\Medical_especiality;
use Illuminate\Http\Request;

class EspecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialities = Medical_especiality::all();
        return view('admin.especiality.index', compact('especialities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.especiality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecialityRequest $request)
    {
        Medical_especiality::create(
            ['especiality' => $request -> especiality,
            'description' => $request -> description]
        );

        
        return redirect()->action([EspecialityController::class, 'index']);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Medical_especiality $medical_especiality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $especiality)
    {
        $medical_especiality = Medical_especiality::find($especiality);
        return view('admin.especiality.edit', compact('medical_especiality'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EspecialityRequest $request, $id)
    {
        $medical_especiality = Medical_especiality::find($id);
        $medical_especiality -> update($request -> all());
        return redirect()->action([EspecialityController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($medical_especiality)
    {
        Medical_especiality::destroy($medical_especiality);
        return redirect()->action([EspecialityController::class, 'index']);
        
    }
}
