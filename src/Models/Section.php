<?php

namespace TPenaranda\Duckform\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

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

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
