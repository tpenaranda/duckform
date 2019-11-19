<?php

namespace TPenaranda\Duckform;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use TPenaranda\Duckform\Models\Form;

class Duckform
{
    protected $factory;

    public function __construct(EloquentFactory $factory)
    {
        $this->factory = $factory;
    }

    public function factory()
    {
        $arguments = func_get_args();

        if (isset($arguments[1]) && is_string($arguments[1])) {
            return $this->factory->of($arguments[0], $arguments[1])->times($arguments[2] ?? null);
        } elseif (isset($arguments[1])) {
            return $this->factory->of($arguments[0])->times($arguments[1]);
        }

        return $this->factory->of($arguments[0]);
    }

    public static function find($id, $columns = ['*'])
    {
        if (is_string($id) && !is_numeric($id)) {
            return Form::whereSlug($id)->first($columns) ?? Form::firstByToken($id, $columns);
        }

        if (is_array($id) || $id instanceof Arrayable) {
            return Form::findMany($id, $columns);
        }

        return Form::whereKey($id)->first($columns);
    }
}
