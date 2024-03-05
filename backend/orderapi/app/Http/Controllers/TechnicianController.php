<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TechnicianController extends Controller
{
    private $rules = [
        'document' => 'required|integer|max:99999999999999999999|min:1',
        'name' => 'required|string|max:100|min:3',
        'especiality' => 'string|max:100|min:3',
        'phone' => 'string|max:30',
       
   
    ];

    private $traductionAtributes = [
        'document' => 'document',
        'name' => 'nombre',
        'especiality' => 'especialidad',
        'phone' => 'telefono',
       
    ];

    public function applyValidator(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAtributes);
        $data = [];
        if ($validator->fails()) 
        {
            $data = response()->json([
                'error' => $validator->errors(),
                'data' => $request->all()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technician = Technician::all();
        return response()->json($technician, Response::HTTP_OK );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->applyValidator($request);
        if(!empty($data))
        {
            return $data;
        }
        $technician = Technician::create($request->all());
        $response = [
            'message' => 'Registro creado exitosamente',
            'observation' => $technician

        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(technician $technician)
    {
        return response()->json($technician, Response::HTTP_OK );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technician $technician)
    {
        $data = $this->applyValidator($request);
        if(!empty($data))
        {
            return $data;
        }
        $technician->update($request->all());
        $response = [
            'message' => 'Registro actualizado exitosamente',
            'technician' => $technician

        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technician $technician)
    {
        $technician->delete();
        $response = [
            'message' => 'Registro eliminado exitosamente',
            'technician' => $technician->id

        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
