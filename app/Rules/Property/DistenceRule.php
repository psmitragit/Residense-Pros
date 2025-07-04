<?php

namespace App\Rules\Property;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DistenceRule implements ValidationRule
{
    public $distance, $distance_unit;
    public function __construct($distance, $distance_unit)
    {
        $this->distance = $distance;
        $this->distance_unit = $distance_unit;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $failedRes = [];
        foreach ($value as $key => $val) {
            $failedRes[] = $this->distance_unit[$key] . ' - ' . $this->distance[$key];
        }
        $fail(implode('~', $failedRes));
    }
}
