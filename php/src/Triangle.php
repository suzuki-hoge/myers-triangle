<?php

declare(strict_types=1);

namespace Myers;

use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

final class Triangle
{
    public const EQUILATERAL_TRIANGLE = '正三角形';
    public const ISOSCELES_TRIANGLE = '二等辺三角形';
    public const SCALENE_TRIANGLE = '不等辺三角形';
    public const NOT_TRIANGLE = '君は三角形ではない';

    public function __construct(private int $hen1, private int $hen2, private int $hen3)
    {
        $this->validate($hen1);
        $this->validate($hen2);
        $this->validate($hen3);
    }

    private function validate(int $value): void
    {
        if ($value < 1 || $value > PHP_INT_MAX) {
            throw new InvalidArgumentException('1以上の値を指定してください');
        }
    }

    #[Pure] public function inspect(): string
    {
        if (!$this->isTriangle()) {
            return self::NOT_TRIANGLE;
        }

        if ($this->isEquilateralTriangle()) {
            return self::EQUILATERAL_TRIANGLE;
        }

        if ($this->isIsoscelesTriangle()) {
            return self::ISOSCELES_TRIANGLE;
        }

        return self::SCALENE_TRIANGLE;
    }

    /**
     * 三角形の条件を満たしているか
     * @url http://physics.thick.jp/Mathematics_A/Section5/5-3.html
     */
    private function isTriangle(): bool
    {
        // 2の辺の長さを引いた時、残りの1つの辺の長さより短くなる
        return ($this->hen1 - $this->hen2) < $this->hen3;
    }

    private function isEquilateralTriangle(): bool
    {
        return $this->hen1 === $this->hen2 && $this->hen1 === $this->hen3;
    }

    /**
     *  二等辺三角形の条件
     *  いずれか辺の長さが等しいのがある。且つ他の辺とは等しくないか
     * @url https://mathwords.net/nitouhen
     */
    private function isIsoscelesTriangle(): bool
    {
        if ($this->hen1 === $this->hen2 && $this->hen1 !== $this->hen3) {
            return true;
        }

        if ($this->hen2 === $this->hen3 && $this->hen2 !== $this->hen1) {
            return true;
        }

        if ($this->hen3 === $this->hen1 && $this->hen3 !== $this->hen2) {
            return true;
        }

        return false;
    }
}
