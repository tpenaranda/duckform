<?php

namespace TPenaranda\Duckform\Models;

use Faker\Generator as FakerGenerator;
use Illuminate\Database\Eloquent\{Factory as EloquentFactory, Model};
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

    public function jsonSerialize()
    {
        return array_merge($this->attributesToArray(), $this->relationsToArray());
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function submits(): HasMany
    {
        return $this->hasMany(FormSubmit::class)->with('responses');
    }

    public static function factory()
    {
        $arguments = func_get_args();
        $factory = EloquentFactory::construct(app(FakerGenerator::class), __DIR__ . '/../Database/Factories');

        if (isset($arguments[1]) && is_string($arguments[1])) {
            return $factory->of($arguments[0], $arguments[1])->times($arguments[2] ?? null);
        } elseif (isset($arguments[1])) {
            return $factory->of($arguments[0])->times($arguments[1]);
        }

        return $factory->of($arguments[0]);
    }

    public static function find($id, $columns = ['*'])
    {
        if (is_string($id) && !is_numeric($id)) {
            return self::whereSlug($id)->first($columns) ?? self::firstByToken($id, $columns);
        }

        if (is_array($id) || $id instanceof Arrayable) {
            return self::findMany($id, $columns);
        }

        return self::whereKey($id)->first($columns);
    }
}
