<?php

namespace TPenaranda\Duckform\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TPenaranda\Aiditokens\Traits\Tokens;

class Form extends Model
{
    use Tokens;

    protected $table = 'tpenaranda_duckform_forms';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'description',
        'slug',
        'title',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
