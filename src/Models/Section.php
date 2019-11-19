<?php

namespace TPenaranda\Duckform\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    protected $table = 'tpenaranda_duckform_sections';

    public $timestamps = false;

    protected $fillable = [
        'description',
        'slug',
        'title',
    ];

    protected $hidden = [
        'id',
    ];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
