<?php

declare(strict_types=1);

namespace Myers;

class Checker
{
    public static function apply(string $v): string
    {
        $array =  array_map('intval', explode(' ', $v));

        $max = 0;
        $sum = 0;
        foreach ($array as $value) {
            if ($max < $value) {
                $sum += $max;
                $max = $value;
            } else {
                $sum += $value;
            }
        }

        if ($max >= $sum) {
            return '不成立';
        }

        if (count(array_unique($array)) === 1) {
            return '正三角形';
        }

        if (count(array_unique($array)) === 2) {
            return '二等辺三角形';
        }
        return '不等辺三角形';
    }
}
