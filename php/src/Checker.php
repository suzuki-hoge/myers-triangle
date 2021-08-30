<?php

declare(strict_types=1);

namespace Myers;

use InvalidArgumentException;

final class Checker
{
    // 引数と戻り値は変更してはいけない
    public function apply(string $v): string
    {
        $params = $this->convert($v);
        $triangle = new Triangle((int) $params[0], (int) $params[1], (int) $params[2]);

        return $triangle->inspect();
    }

    private function convert(string $v): array
    {
        //空白で区切って配列にする
        $params = preg_split('/ ++/', $v, -1, PREG_SPLIT_NO_EMPTY);

        $this->validate($params);

        rsort($params);

        return $params;
    }

    private function validate(array $henArray): void
    {
        // 三角形に関する制約はここではチェックしない
        if (count($henArray) !== 3) {
            throw new InvalidArgumentException('引数が足りません');
        }

        if (!is_numeric($henArray[0]) || !is_numeric($henArray[1]) || !is_numeric($henArray[2])) {
            throw new InvalidArgumentException('引数は数値で指定してください');
        }
    }

}
