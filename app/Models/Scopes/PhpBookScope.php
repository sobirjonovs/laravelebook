<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PhpBookScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
//        $builder->where('author_id', 2)
//            ->where('published_at', '2024-07-07')
//            ->where('title', 'Yangi kitob')
//            ->whereNull('issn')
//            ->where('is_paid', false);
    }
}
