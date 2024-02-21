<?php

namespace App\Helpers;

class InputHelper
{
    public static function setOldIfNotDefined(string $key, mixed $value): void
    {
        if (!session()->hasOldInput($key)) {
            session()->flash('_old_input', [
                $key => $value
            ]);
        }
    }
}
