<?php
/**
 * 一部互換性のないコードを含む例
 */

class MixedCode
{
    private $data = [];

    // 互換性のあるメソッド
    public function compatibleMethod(): string
    {
        return 'This is compatible';
    }

    // 互換性のないメソッド（PHP 8.0+ の match）
    public function incompatibleMethod($status)
    {
        return match($status) {
            'active' => 'running',
            'inactive' => 'stopped',
            default => 'unknown'
        };
    }

    // 互換性のあるメソッド
    public function anotherCompatibleMethod(array $items): int
    {
        return count($items);
    }
}