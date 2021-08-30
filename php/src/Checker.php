<?php

declare(strict_types=1);

namespace Myers;

class Checker
{
    public static function apply(string $v): string
    {
        $lines = self::convertToLines($v);

        $maxLength = max($lines);

        if ($maxLength >= array_sum($lines) - $maxLength) {
            return '不成立';
        }

        $numberOfSameLength = count(array_unique($lines));

        if ($numberOfSameLength === 1) {
            return '正三角形';
        }

        if ($numberOfSameLength === 2) {
            return '二等辺三角形';
        }
        return '不等辺三角形';
    }

    private static function convertToLines(string $v): array
    {
        $array = explode(' ', $v);

        if(count($array) !== 3 || in_array(false, array_map('is_numeric', $array))) {
            throw new \RuntimeException('渡された値が不正です。');
        }

        return array_map('intval', explode(' ', $v));
    }
}
