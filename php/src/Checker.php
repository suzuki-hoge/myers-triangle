<?php

declare(strict_types=1);

namespace Myers;

class Checker
{
    // 引数と戻り値は変更してはいけない
    public static function apply(string $v): string
    {
        if (trim($v) === '') {
            return '入力がありません';
        }

        $xs = explode(' ', $v);

        if (in_array(false, array_map('ctype_digit', $xs))) {
            return '正の整数以外が含まれています';
        }

        $ns = array_map('intval', $xs);
        if (in_array(true, array_map(fn($n) => $n === 0, $ns))) {
            return '0 が含まれています';
        } else if (in_array(true, array_map(fn($n) => 99 < $n, $ns))) {
            return '99 より大きい数が含まれています';
        } else if (count($ns) !== 3) {
            return '整数が 3 つではありません';
        } else {
            return Triangle::check($ns[0], $ns[1], $ns[2]);
        }
    }
}
