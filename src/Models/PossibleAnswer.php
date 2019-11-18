<?php

namespace TPenaranda\Duckform\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany, BelongsTo};
use Illuminate\Support\Collection;

class PossibleAnswer extends Model
{
    protected $table = 'tpenaranda_duckform_possible_answers';

    public $timestamps = false;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'description',
        'order',
        'question_id',
        'text',
    ];

    protected $hidden = [
        'created_at',
        'question_id',
        'updated_at',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
