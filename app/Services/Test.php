<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Test
{
    public function attach()
    {
        $user = User::query()->find(2);

        // 1-usul model to'plamlari bilan
        $roles = Role::query()->find([1, 2]);

        // 2-usul rollarning idlarini massiv ko'rinishda berish bilan
//        $roles = [1, 2];

        $user->roles()->attach($roles);
    }

    public function detach()
    {
        $user = User::query()->find(2);

        // 1-usul model to'plamlari bilan
        $roles = Role::query()->find([1, 2]);

        // 2-usul rollarning idlarini massiv ko'rinishda berish bilan
//        $roles = [1, 2];

        $user->roles()->detach($roles);
    }

    public function sync()
    {
        $user = User::query()->find(2);

        // 1-usul model to'plamlari bilan
        $roles = Role::query()->find([1, 2]);

        // 2-usul rollarning idlarini massiv ko'rinishda berish bilan
//        $roles = [1, 2];

        $user->roles()->sync($roles);
    }

    public function toggle()
    {
        $user = User::query()->find(2);

        // 1-usul model to'plamlari bilan
        $roles = Role::query()->find([1, 2]);

        // 2-usul rollarning idlarini massiv ko'rinishda berish bilan
        $roles = [1, 2];

        $user->roles()->toggle($roles);
    }

    public function problem()
    {
        Log::log();
        $books = [];

        DB::enableQueryLog();

        foreach (User::query()->where('id', 1)->with(['books'])->get() as $user) {
            $books = $user->books;
        }

        return DB::getQueryLog();
    }

    public function whereHas(): Collection
    {
        return User::query()->whereHas('books', function (Builder $builder) {
            $builder->where('title', 'SANJAR');
        })->get();
    }

    public function load()
    {
        $books = [];

        DB::enableQueryLog();

        foreach (User::query()->get()->load(['books']) as $user) {
            $books = $user->books;
        }

        return DB::getQueryLog();
    }
}
