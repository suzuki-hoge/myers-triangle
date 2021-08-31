<?php

declare(strict_types=1);

namespace Myers;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CheckTest extends TestCase
{
    /**
     * @test
     * @dataProvider 例外が発生するDataProvider
     */
    public function 例外が発生する(string $value, string $expectException, string $expectExceptionMessage)
    {
        $this->expectException($expectException);
        $this->expectExceptionMessage($expectExceptionMessage);
        $checker = new Checker();
        $checker->apply($value);
    }

    public function 例外が発生するDataProvider(): array
    {
        return [
            '引数が足りていない' => [
                'value' => '3 3 ',
                'expectException' => InvalidArgumentException::class,
                'expectExceptionMessage' => '引数が足りません',
            ],

            '引数に数値以外が入っている' => [
                'value' => '3 3 あ',
                'expectException' => InvalidArgumentException::class,
                'expectExceptionMessage' => '引数は数値で指定してください',
            ],
        ];
    }

    /**
     * @test
     * @dataProvider apply_dp
     */
    public function apply(string $v, string $exp): void
    {
        $checker = new Checker();

        $actual = $checker->apply($v);

        $this->assertSame($exp, $actual);
    }

    public function apply_dp(): array
    {
        return [
            //正三角形
            '正三角形' => ['3 3 3', Triangle::EQUILATERAL_TRIANGLE],

            //二等辺三角形
            '二等辺三角形' => ['5 2 5', Triangle::ISOSCELES_TRIANGLE],

            //不等辺三角形
            '不等辺三角形' => ['3 1 5', Triangle::SCALENE_TRIANGLE],
        ];
    }
}
