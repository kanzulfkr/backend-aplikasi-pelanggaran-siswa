<?php

use Carbon\Carbon;
use App\Models\Violation;

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('violationsUnvalidated')) {
    function violationsUnvalidated()
    {
        $violationValidate = Violation::where('is_validate', '=', '0')->count();
        return $violationValidate;
    }
}
