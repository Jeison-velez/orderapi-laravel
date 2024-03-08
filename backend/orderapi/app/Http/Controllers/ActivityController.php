<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    private $rules = [
        'description' => 'required|string|max:100|min:3',
        'hours' => 'required|numeric|max:9999999999|min:1',
        'technician_id' => 'required|numeric|max:99999999999999999999',
        'type_id' => 'required|numeric|max:99999999999999999999',
    ];

    private $traductionAtributes = [
        'description' => 'descripcion',
        'hours' => 'horas',
        'technician_id' => 'tecnico',
        'type_id' => 'tipo'
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
        $activities = Activity::all();
        $activities->load(['Technician', 'type_activity']);
        return response()->json($activities, Response::HTTP_OK);
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
        $activity = Activity::create($request->all());
        $response = [
            'message' => 'Registro creado exitosamente',
            'observation' => $activity

        ];
        return response()->json($response, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        $activity->load(['Technician', 'type_activity']);
        return response()->json($activity, Response::HTTP_OK);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $data = $this->applyValidator($request);
        if(!empty($data))
        {
            return $data;
        }
        $activity->update($request->all());
        $response = [
            'message' => 'Registro actualizado exitosamente',
            'observation' => $activity

        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        $response = [
            'message' => 'Registro eliminado exitosamente',
            'technician' => $activity->id

        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
