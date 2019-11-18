<?php

namespace TPenaranda\Aiditokens\Traits;

use TPenaranda\Aiditokens\ModelToken;

trait Tokens
{
    public static function firstByToken(string $token): ? self
    {
        return ModelToken::whereValue($token)->whereModelClass(get_called_class())->where(function ($query) {
            $query->whereNull('expire_at')->orWhere('expire_at', '>', now());
        })->first()->model ?? null;
    }

    public function getToken(int $expireInHours = 0)
    {
        if (empty($expireInHours)) {
            return ModelToken::firstOrCreate([
                'model_id' => $this->id,
                'model_class' => get_class($this),
                'expire_at' => null,
            ], [
                'value' => $this->generateToken(),
            ])->value;
        }

        return ModelToken::create([
            'model_id' => $this->id,
            'model_class' => get_class($this),
            'expire_at' => now()->addHours($expireInHours),
            'value' => $this->generateToken(),
        ])->value;
    }

    protected function generateToken(): string
    {
        return sha1(str_random());
    }
}
