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
        'form_id'
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

    public function scopeCompleted($query)
    {
        return $query->whereNotNull('completed_at');
    }

    public function markAsCompleted(bool $unset = false): self
    {
        $this->completed_at = empty($unset) ? now() : null;

        if ($this->isDirty('completed_at')) {
            $this->save();
        }

        return $this;
    }

    public function isFullfiled(): bool
    {
        $requiredQuestions = Question::whereHas('section', function ($query) {
            $query->whereHas('form', function ($query) {
                $query->whereKey($this->form->id);
            });
        })->where('required', true)->pluck('id');

        $fullfiledQuestions = $this->fresh()->responses->pluck('question')->pluck('id')->unique();
        return $requiredQuestions->every(function ($question) use ($fullfiledQuestions) {
            return $fullfiledQuestions->contains($question);
        });
    }

}
