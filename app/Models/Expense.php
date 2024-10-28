<?php

namespace App\Models;

use App\Filters\ExpenseFilter;
use App\Http\Resources\ExpenseResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'spent_date',
        'description',
        'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filter(Request $request)
    {
        $queryFilter = (new ExpenseFilter)->filter($request);

        $data = Expense::with('user');

        if (!empty($queryFilter['where'])) {
            foreach ($queryFilter['where'] as $filter) {
                [$column, $operator, $value] = $filter;
                $data->where($column, $operator, $value);
            }
        }
        if (!empty($queryFilter['whereIn'])) {
            foreach ($queryFilter['whereIn'] as $filter) {
                [$column, $values] = $filter;
                $data->whereIn($column, $values);
            }
        }
        
        return ExpenseResource::collection($data->get());
    }

}
