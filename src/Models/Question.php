<?php

namespace TPenaranda\Duckform\Models;

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
       'scale_1-10',
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

    protected $hidden = [
      'form_id'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function possibleAnswers()
    {
        return $this->hasMany(PossibleAnswer::class, 'question_id');
    }

    public function isCustomInput(): bool
    {
        return in_array($this->type, ['free_text', 'integer', 'date']);
    }
}
