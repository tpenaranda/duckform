<?php

namespace TPenaranda\Duckform\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TPenaranda\Aiditokens\Traits\Tokens;

class FormSubmit extends Model
{
    use Tokens;

    protected $table = 'tpenaranda_duckform_form_submits';

    protected $dates = [
        'completed_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'completed_at',
        'reference_id',
        'form_id',
        'user_id',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function responses()
    {
        return $this->belongsToMany(PossibleAnswer::class, 'tpenaranda_duckform_form_submit_responses', 'form_submit_id')->with('question')->withPivot('possible_answer_data');
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}
