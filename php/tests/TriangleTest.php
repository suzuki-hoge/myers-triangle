<?php

declare(strict_types=1);

namespace Myers;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase
{
    /**
     * @test
     * @dataProvider 例外が発生するDataProvider
     */
    public function 例外が発生する(int $hen1, int $hen2, int $hen3, string $expectException, string $expectExceptionMessage)
    {
        $this->expectException($expectException);
        $this->expectExceptionMessage($expectExceptionMessage);
        new Triangle($hen1, $hen2, $hen3);
    }

    public function 例外が発生するDataProvider(): array
    {
        return [
            '0を含むとき' => [
                'hen1' => 0,
                'hen2' => 3,
                'hen3' => 3,
                'expectException' => InvalidArgumentException::class,
                'expectExceptionMessage' => '1以上の値を指定してください',
            ],

            'phpのMAX_INTを超えている' => [
                'hen1' => PHP_INT_MAX + 1,
                'hen2' => 3,
                'hen3' => 3,
                'expectException' => InvalidArgumentException::class,
                'expectExceptionMessage' => '値が大きすぎます',
            ],
        ];
    }

    /**
     * @test
     * @dataProvider 正三角形DataProvider
     */
    public function 正三角形を返すこと(int $hen1, int $hen2, int $hen3): void
    {
        $triangle = new Triangle($hen1, $hen2, $hen3);

        $actual = $triangle->inspect();

        $this->assertSame(Triangle::EQUILATERAL_TRIANGLE, $actual);
    }

    public function 正三角形DataProvider(): iterable
    {
        yield '辺の長さが3' => [
            'hen1' => 3,
            'hen2' => 3,
            'hen3' => 3
        ];

        yield '辺の長さが5' => [
            'hen1' => 5,
            'hen2' => 5,
            'hen3' => 5,
            ];
    }

    /**
     * @test
     * @dataProvider 二等辺三角形DataProvider
     */
    public function 二等辺三角形を返すこと(int $hen1, int $hen2, int $hen3): void
    {
        $triangle = new Triangle($hen1, $hen2, $hen3);

        $actual = $triangle->inspect();

        $this->assertSame(Triangle::ISOSCELES_TRIANGLE, $actual);
    }

    public function 二等辺三角形DataProvider(): iterable
    {
        yield '1つめの辺が異なる長さ' => [
            'hen1' => 1,
            'hen2' => 3,
            'hen3' => 3
        ];

        yield '2つめの辺が異なる長さ' => [
            'hen1' => 3,
            'hen2' => 1,
            'hen3' => 3
        ];

        yield '3つめの辺が異なる長さ' => [
            'hen1' => 3,
            'hen2' => 3,
            'hen3' => 1
        ];

    }

    /**
     * @test
     * @dataProvider 不等辺三角形DataProvider
     */
    public function 不等辺三角形を返すこと(int $hen1, int $hen2, int $hen3): void
    {
        $triangle = new Triangle($hen1, $hen2, $hen3);

        $actual = $triangle->inspect();

        $this->assertSame(Triangle::SCALENE_TRIANGLE, $actual);
    }

    public function 不等辺三角形DataProvider(): iterable
    {
        yield '全ての辺の長さが違う' => [
            'hen1' => 1,
            'hen2' => 2,
            'hen3' => 3
        ];

        // TODO 条件が言語ができない
        yield 'パターン1' => [
            'hen1' => 5,
            'hen2' => 7,
            'hen3' => 2
        ];

        yield 'パターン2' => [
            'hen1' => 7,
            'hen2' => 8,
            'hen3' => 10
        ];

    }

    /**
     * @test
     * @dataProvider 三角形ではないDataProvider
     */
    public function 三角形ではない(int $hen1, int $hen2, int $hen3): void
    {
        $triangle = new Triangle($hen1, $hen2, $hen3);

        $actual = $triangle->inspect();

        $this->assertSame(Triangle::NOT_TRIANGLE, $actual);
    }

    public function 三角形ではないDataProvider(): iterable
    {
        yield '最大辺より値が小さい' => [
            'hen1' => 10,
            'hen2' => 1,
            'hen3' => 1
        ];
    }
}
