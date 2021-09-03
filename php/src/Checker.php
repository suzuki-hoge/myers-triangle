<?php

declare(strict_types=1);

namespace Myers;

class Checker
{
    /**
     * 引数と戻り値は変更してはいけない
     * @param string[] $ss
     * @return string
     */
    public static function apply(array $ss): string
    {
        // 実装はクラス・メソッド・例外など何をどう使っても良い
        return '正三角形';
    }
}
