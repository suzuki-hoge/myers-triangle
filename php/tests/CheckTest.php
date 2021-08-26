<?php

declare(strict_types=1);

namespace Myers;

use PHPUnit\Framework\TestCase;

class CheckTest extends TestCase
{
    /**
     * @test
     * @dataProvider apply_dp
     */
    public function apply(string $v, string $exp)
    {
        // 必要だと考えたテストを実装する
        // テストメソッドを分けたりしても良い
        $this->assertSame(Checker::apply($v), $exp);
    }

    function apply_dp(): array
    {
        return [
            '正三角形のパターン 1' => ['3 3 3', '正三角形'],
            '正三角形のパターン 2' => ['5 5 5', '正三角形'],
        ];
    }
}
