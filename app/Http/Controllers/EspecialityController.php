<?php

namespace App\Http\Controllers;

use App\Http\Requests\EspecialityRequest;
use App\Models\Medical_especiality;
use Illuminate\Http\Request;

class EspecialityController extends Controller
{
    public function __construct(){
        $this->middleware('can:especiality.index')->only('index');
        $this->middleware('can:especiality.create')->only('create','store');
        $this->middleware('can:especiality.edit')->only('edit','update');
        $this->middleware('can:especiality.destroy')->only('destroy');
    }
    public function index()
    {
        $especialities = Medical_especiality::paginate(10);
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
