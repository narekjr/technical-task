<?php

namespace App\Services;

use App\Contracts\ProvidesInstance;
use Illuminate\Support\Facades\App;

abstract class AbstractService implements ProvidesInstance
{
    /**
     * Get service instance
     *
     * @return static
     */
    public static function getInstance(): static
    {
        return App::make(static::class);
    }
}
