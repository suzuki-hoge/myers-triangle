<?php

declare(strict_types=1);

namespace Myers;

/**
 * 動作確認用
 */
class Env
{
    public static function php(): string
    {
        return phpversion();
    }
}
