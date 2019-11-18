<?php

namespace TPenaranda\Duckform\Models;

use App\Traits\HasSlugColumn;
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
        'title',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function find($id, $columns = ['*'])
    {
        if (is_string($id) && !is_numeric($id)) {
            return self::whereSlug($id)->first($columns);
        }

        if (is_array($id) || $id instanceof Arrayable) {
            return self::findMany($id, $columns);
        }

        return self::whereKey($id)->first($columns);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
