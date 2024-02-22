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

    public static function setOldsIfNotDefined(array $olds): void
    {
        $allowOlds = [];

        foreach ($olds as $key => $value) {
            if (!session()->hasOldInput($key)) {
                $allowOlds[$key] = $value;
    
            }
        }       

        session()->flash('_old_input', $allowOlds);
    }
}
