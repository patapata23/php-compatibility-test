<?php
/**
 * PHP 7.3-8.4 互換性のあるコード例
 */

class Compatible
{
    // テストコメント2222
    private $data = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function addItem(string $key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function processData(): array
    {
        $result = [];
        foreach ($this->data as $key => $value) {
            if (is_string($value)) {
                $result[$key] = strtoupper($value);
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public function filterData(callable $callback): array
    {
        return array_filter($this->data, $callback);
    }
}