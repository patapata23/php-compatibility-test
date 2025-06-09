<?php
/**
 * PHP 7.3-8.4 互換性のないコード例
 * これらのコードは互換性チェックで失敗します
 */

class Incompatible
{
    // PHP 8.0+ の match 式（PHP 7.3では使用不可）
    public function useMatch($value)
    {
        return match($value) {
            1 => 'one',
            2 => 'two',
            default => 'other'
        };
    }

    // PHP 8.0+ の Union Types（PHP 7.3では使用不可）
    public function unionTypes(int|string $value): int|string
    {
        return $value;
    }

    // PHP 8.0+ の Named Arguments（PHP 7.3では使用不可）
    public function namedArguments()
    {
        return $this->someFunction(
            param1: 'value1',
            param2: 'value2'
        );
    }

    private function someFunction($param1, $param2)
    {
        return $param1 . $param2;
    }

    // PHP 8.0+ の Nullsafe Operator（PHP 7.3では使用不可）
    public function nullsafeOperator($object)
    {
        return $object?->method()?->property;
    }

    // PHP 8.1+ の Readonly Properties（PHP 7.3では使用不可）
    public readonly string $readonlyProperty;

    // PHP 8.0+ の Constructor Property Promotion（PHP 7.3では使用不可）
    public function __construct(
        private string $privateProperty,
        protected int $protectedProperty,
        public array $publicProperty
    ) {
    }
}