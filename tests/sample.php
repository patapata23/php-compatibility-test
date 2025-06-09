<?php
/**
 * テスト用のサンプルコード
 */

// 互換性のあるコード
function testFunction(): bool
{
    return true;
}

// 互換性のないコード（PHP 8.0+ の match）
function testIncompatibleFunction($value)
{
    return match($value) {
        true => 'yes',
        false => 'no',
        default => 'maybe'
    };
}

// テスト実行
echo testFunction() ? 'Test passed' : 'Test failed';