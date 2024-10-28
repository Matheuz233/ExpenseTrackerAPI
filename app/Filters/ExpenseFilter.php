<?php

namespace App\Filters;

class ExpenseFilter extends Filter
{
    protected array $allowedOperatorsFields = [
        'value' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne'],
        'category' => ['eq', 'ne'],
        'spent_date' => ['gt', 'eq', 'lt', 'gte', 'lte', 'ne']
    ];
}
