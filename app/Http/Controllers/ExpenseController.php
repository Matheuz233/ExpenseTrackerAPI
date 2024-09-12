<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExpenseResource;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ExpenseResource::collection(Expense::with('user')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category' => 'required',
            'date_spent' => 'nullable|date',
            'description' => 'nullable',
            'value' => 'required|numeric|between:1,9999.99',
        ]);

        if ($validator->fails()) {
            return $this->error('Dados Inválidos', 422, $validator->errors());
        }

        $created = Expense::create($validator->validated());

        if ($created) {
            return $this->response('Gasto adicionado com sucesso', 200, new ExpenseResource($created->load('user')));
        }
        return $this->response('Gasto não adicionado', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}