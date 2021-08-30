<?php

declare(strict_types=1);

namespace Myers;

use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class CheckTest extends TestCase
{
    /**
     * @dataProvider 正三角形プロバイダ
     */
    public function test_正三角形(string $input): void
    {
        $this->assertSame('正三角形', Checker::apply($input));
    }

    public function 正三角形プロバイダ(): iterable
    {
        yield '辺の長さが3' => ['3 3 3'];
        yield '辺の長さが10' => ['10 10 10'];
    }

    /**
     * @dataProvider 二等辺三角形プロバイダ
     */
    public function test_二等辺三角形(string $input): void
    {
        $this->assertSame('二等辺三角形', Checker::apply($input));
    }

    public function 二等辺三角形プロバイダ(): iterable
    {
        yield '1つ目の辺が異なる長さ' => ['1 3 3'];
        yield '2つ目の辺が異なる長さ' => ['6 4 6'];
        yield '3つ目の辺が異なる長さ' => ['9 9 4'];
        yield '二等辺の方が長い' => ['2 5 5'];
        yield '二等辺の方が短い' => ['10 6 6'];
    }

    /**
     * @dataProvider 不等辺三角形プロバイダ
     */
    public function test_不等辺三角形(string $input): void
    {
        $this->assertSame('不等辺三角形', Checker::apply($input));
    }

    public function 不等辺三角形プロバイダ(): iterable
    {
        yield '大>中>小' => ['10 9 8'];
        yield '大>小>中' => ['9 5 7'];
        yield '中>大>小' => ['4 5 3'];
        yield '中>小>大' => ['7 5 10'];
        yield '小>大>中' => ['2 4 3'];
        yield '小>中>大' => [implode(' ', [2, PHP_INT_MAX - 1, PHP_INT_MAX])];
    }

    /**
     * @dataProvider 三角形を作れないプロバイダ
     */
    public function test_三角形を作れない(string $input): void
    {
        $this->assertSame('三角形を作れない', Checker::apply($input));
    }

    public function 三角形を作れないプロバイダ(): iterable
    {
        // 最長辺 >= 他２辺の合計なら三角形を作れない
        yield '1つ目が最長辺' => ['10 5 4'];
        yield '2つ目が最長辺' => ['1 4 2'];
        yield '3つ目が最長辺' => ['2 4 10'];
        yield '他２辺の値が等しい' => ['1 1 3'];
        yield '最長辺=他２辺の合計' => ['1 2 3'];
    }

    /**
     * @dataProvider 引数異常プロバイダ
     */
    public function test_引数異常(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);

        Checker::apply($input);
    }

    public function 引数異常プロバイダ(): iterable
    {
        yield '引数の数が2つ' => ['10 5'];
        yield '引数の数が4つ' => ['10 5 4 3'];
        yield '区切り文字が異なる（全角空白）' => ['1　4　2'];
        yield '数字以外の値が含まれている' => ['1 2 a'];
        yield '小数が含まれている' => ['1 2 2.5'];
        yield '負数が含まれている' => ['1 -1 2'];
        yield '0が含まれている' => ['1 2 0'];
    }
}
