<?php

namespace App\Models;

use App\Enums\BookPaymentEnum;
use App\Models\Scopes\PhpBookScope;
use App\Observers\BookObserver;
use Database\Factories\BoshqachaFabrikaSinf;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([BookObserver::class])]
#[ScopedBy([PhpBookScope::class])]
class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'published_at',
        'is_paid',
        'additionals',
        'additionals->phone',
        'additionals->muallif'
    ];

    protected $hidden = ['issn'];

    protected $table = 'books';

    protected static function newFactory(): BoshqachaFabrikaSinf
    {
        return new BoshqachaFabrikaSinf;
    }

    protected function casts()
    {
        return [
            'additionals' => AsArrayObject::class,
            'is_paid' => BookPaymentEnum::class,
            'published_at' => 'date',
            'created_at' => 'datetime:d.m.Y H:i:s',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
