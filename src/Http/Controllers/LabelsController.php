<?php

namespace Alibahadori\Todo\Http\Controllers;

use Alibahadori\Todo\Http\Requests\CreateLabelRequest;
use Alibahadori\Todo\Http\Resources\LabelResource;
use Alibahadori\Todo\Models\Label;
use App\Http\Controllers\Controller;

class LabelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return LabelResource::collection(Label::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLabelRequest $request)
    {
        Label::create($request->all());

        return response()->json([
            'message' => 'Label created successfully.'
        ], 201);
    }
}
