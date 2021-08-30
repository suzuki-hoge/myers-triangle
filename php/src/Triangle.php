<?php

declare(strict_types=1);

namespace Myers;

class Triangle
{
    public static function check(int $a, int $b, int $c): string
    {
        $xs = [$a, $b, $c];
        sort($xs);
        [$a, $b, $c] = $xs;

        if ($a + $b <= $c) {
            return '不成立';
        } else if (count(array_unique($xs)) === 1) {
            return '正三角形';
        } else if (count(array_unique($xs)) === 2) {
            return '二等辺三角形';
        } else {
            return '不等辺三角形';
        }
    }
}
