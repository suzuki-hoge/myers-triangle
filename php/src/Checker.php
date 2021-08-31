<?php

declare(strict_types=1);

namespace Myers;

class Checker
{
    // 引数と戻り値は変更してはいけない
    public static function apply(string $v): string
    {
        // 実装はクラス・メソッド・例外など何をどう使っても良い
        $line = explode(" ", $v);
        sort($line);

        if($line[0] > 0 && $line[1] > 0 && $line[2] > 0) {
            if(count(array_unique($line)) === 1) {
                return '正三角形';
            } else if(count(array_unique($line)) === 2) {
                return '二等辺三角形';
            } else if($line[0] + $line[1] > $line[2]) {
                return '不等辺三角形';
            }
        }
        return '不成立';

    }
}
