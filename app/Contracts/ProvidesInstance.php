<?php

namespace App\Contracts;

interface ProvidesInstance
{
    /**
     * Get instance
     *
     * @return static
     */
    public static function getInstance(): static;
}
