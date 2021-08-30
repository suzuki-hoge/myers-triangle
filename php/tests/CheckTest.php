<?php

declare(strict_types=1);

namespace Myers;

use PHPUnit\Framework\TestCase;

class CheckTest extends TestCase
{
    /**
     * @test
     * @dataProvider 正常な三角形
     */
    public function 正常な三角形を判定できる(string $v, string $exp)
    {
        $this->assertSame($exp, Checker::apply($v));
    }

    /**
     * @test
     * @dataProvider 三角形にならないデータ
     */
    public function 三角形にならないデータを判定できる(string $v, string $exp)
    {
        $this->assertSame($exp, Checker::apply($v));
    }

    /**
     * @test
     * @dataProvider 不正なデータ
     */
    public function 不正なデータが入力されたら例外を吐く(string $v)
    {
        $this->expectException(\RuntimeException::class);
        Checker::apply($v);
    }

    public function 正常な三角形(): array
    {
        return [
            // 正三角形: 一辺の長さを変えても、結局全部の辺が等しいっていう１パターンしかできそうにないから１ケースだけでいいかな
            '正三角形のパターン 1' => ['3 3 3', '正三角形'],
            // 二等辺三角形: 一辺の長さが、長さが等しい２辺より短いパターンと長いパターンで２パターン
            '二等辺三角形のパターン 1' => ['1 3 3', '二等辺三角形'],
            '二等辺三角形のパターン 2' => ['5 4 4', '二等辺三角形'],
            // 不等辺三角形:  a（最長の辺） < b + c を満たしている１パターン
            '不等辺三角形のパターン 1' => ['3 4 6', '不等辺三角形'],
        ];
    }

    public function 三角形にならないデータ(): array
    {
        return [
            // 三角形が成立しない:
            // 二等辺三角形の失敗パターン
            '三角形を作れないパターン 1' => ['8 3 3', '不成立'],
            // a > b + c で失敗するパターン
            '三角形を作れないパターン 2' => ['8 4 3', '不成立'],
            '三角形を作れないパターン 3' => ['9 8 0', '不成立'],
            '三角形を作れないパターン 4' => ['9 12 -1', '不成立'],
            // a = b + c で失敗するパターン
            '三角形を作れないパターン 5' => ['8 5 3', '不成立'],
            '三角形を作れないパターン 6' => ['8 8 0', '不成立'],
        ];
    }

    public function 不正なデータ(): array
    {
        return [
            '三角形を作れないパターン 5' => ['aaaa bbbb'],
            '三角形を作れないパターン 5' => ['aaaa bbbb ccc'],
            '三角形を作れないパターン 6' => ['0 8'],
        ];
    }

}
