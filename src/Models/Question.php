<?php

namespace TPenaranda\Duckform\Models;

use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Support\Collection;

class Question extends Model
{
    protected $table = 'tpenaranda_duckform_questions';

    public $timestamps = false;

    const TYPES = [
       'free_text',
       'integer',
       'multiselect',
       'scale',
       'single_select',
       'yes_no',
       'date'
    ];

    protected $fillable = [
        'description',
        'randomize_possible_answers',
        'form_id',
        'text',
        'type',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function possibleAnswers(): HasMany
    {
        return $this->hasMany(PossibleAnswer::class, 'question_id');
    }
}
