<?php

use Myers\Checker;

require_once './vendor/autoload.php';

// スペース区切りのコマンドライン引数が文字列配列で渡されて起動する
echo Checker::apply(array_slice($argv, 1)) . PHP_EOL;
