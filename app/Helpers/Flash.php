<?php

namespace App\helpers;

class Flash
{
    /**
     * Create a new class instance.
     */
    public static function success($message)
    {
        session()->flash('success', $message);
    }
}
