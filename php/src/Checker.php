<?php

declare(strict_types=1);

namespace Myers;

use InvalidArgumentException;

class Checker
{
    // 引数と戻り値は変更してはいけない
    public static function apply(string $v): string
    {
        $params = self::convertParams($v);

        if (! self::canCreateTriangle($params)) {
            return '三角形を作れない';
        }

        if (self::canCreateEquilateralTriangle($params)) {
            return '正三角形';
        }

        if (self::canCreateIsoscelesTriangle($params)) {
            return '二等辺三角形';
        }

        return '不等辺三角形';
    }

    private static function convertParams(string $v): array
    {
        $params = explode(' ', $v);

        self::validateParams($params);

        // 処理がしやすくなるので値の降順に並べておく
        rsort($params);

        return $params;
    }

    private static function validateParams(array $params): void
    {
        // 引数の数が3以外であればエラー
        if (count($params) !== 3) {
            throw new InvalidArgumentException('引数は3つ必要です');
        }

        // 引数の値が正の整数以外であればエラー
        if (in_array(false, array_map(static fn ($v) => ctype_digit($v) && (int) $v > 0, $params), true)) {
            throw new InvalidArgumentException('引数は正の整数を指定してください');
        }
    }

    private static function canCreateTriangle(array $params): bool
    {
        // 最長辺 < 他２辺の合計 なら三角形を作れる
        return $params[0] < ($params[1] + $params[2]);
    }

    private static function canCreateEquilateralTriangle(array $params): bool
    {
        // 全ての辺の長さが等しければ正三角形
        // 降順でソート済みなので、最初と最後が等しければすべて等しい
        return $params[0] === $params[2];
    }

    private static function canCreateIsoscelesTriangle(array $params): bool
    {
        // いずれかの辺の長さが等しければ二等辺三角形
        return $params[0] === $params[1] || $params[1] === $params[2];
    }
}
