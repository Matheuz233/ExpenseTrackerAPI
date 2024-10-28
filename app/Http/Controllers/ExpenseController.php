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
    public function index(Request $request)
    {
        return (new Expense())->filter($request);
        // return ExpenseResource::collection(Expense::where([['value', '>', '500']])->with('user')->get());
        // return ExpenseResource::collection(Expense::with('user')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category' => 'required',
            'spent_date' => 'nullable|date',
            'description' => 'nullable',
            'value' => 'required|numeric|between:1,9999.99',
        ]);

        if ($validator->fails()) {
            return $this->error('Dados Inválidos', 422, $validator->errors());
        }

        $created = Expense::create($validator->validated());

        if ($created) {
            return $this->response('Gasto Adicionado com Sucesso', 200, new ExpenseResource($created->load('user')));
        }
        return $this->response('Gasto Não Adicionado', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expense = Expense::find($id);
        return new ExpenseResource($expense);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'category' => 'required',
            'spent_date' => 'nullable|date_format:Y-m-d H:i:s',
            'description' => 'nullable',
            'value' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->error('Dados Inválidos', 422, $validator->errors());
        }

        $validated = $validator->validated();

        $expense = Expense::find($id);

        $updated = $expense->update([
            'user_id' => $validated['user_id'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'value' => $validated['value'],
            'spent_date' => $validated['spent_date'] !== 0 ? $validated['spent_date'] : null,
        ]);

        if  ($updated) {
            return $this->response('Gasto Atualizado com Sucesso', 200, new ExpenseResource($expense->load('user')));
        }
        return $this->response('Gasto Não Atualizado', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::find($id);
        $deleted = $expense->delete();

        if ($deleted) {
            return $this->response('Gasto Deletado com Sucesso', 200);
        }
        return $this->response('Gasto Não Deletado', 400);
    }
}
