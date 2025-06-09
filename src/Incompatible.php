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

/**
 * Static method call エラーをテストするクラス
 * Non-static method cannot be called statically エラーを検出
 */
class IndivContact
{
    private $listFilter = [];

    // Non-staticメソッド
    public function setListFilter($filter)
    {
        $this->listFilter = $filter;
        return $this;
    }

    // Non-staticメソッド
    public function getListFilter()
    {
        return $this->listFilter;
    }

    // Non-staticメソッド
    public function processData($data)
    {
        return array_filter($data, function($item) {
            return in_array($item, $this->listFilter);
        });
    }
}

class StaticCallError
{
    public function demonstrateStaticCallError()
    {
        // エラー: Non-static method IndivContact::setListFilter() cannot be called statically
        IndivContact::setListFilter(['active', 'pending']);
        
        // エラー: Non-static method IndivContact::getListFilter() cannot be called statically
        $filter = IndivContact::getListFilter();
        
        // エラー: Non-static method IndivContact::processData() cannot be called statically
        $result = IndivContact::processData(['active', 'inactive', 'pending']);
        
        return $result;
    }

    public function anotherStaticCallError()
    {
        // エラー: このような呼び出しも検出される
        $contact = new IndivContact();
   
        // 正しい呼び出し方（これは問題なし）
        $contact->setListFilter(['test']);

        // 間違った呼び出し方（これがエラー）
        IndivContact::setListFilter(['error']);
    }
}

/**
 * より複雑なStatic Call Errorの例
 */
class DatabaseConnection
{
    private $connection;
    
    public function connect($host, $username, $password)
    {
        // 実際の接続処理（モック）
        $this->connection = "Connected to {$host}";
        return $this->connection;
    }
    
    public function query($sql)
    {
        if (!$this->connection) {
            throw new Exception("Not connected to database");
        }
        return "Query result for: {$sql}";
    }
    
    public function close()
    {
        $this->connection = null;
    }
}

class DatabaseManager
{
    public function badDatabaseUsage()
    {
        // エラー: Non-static method DatabaseConnection::connect() cannot be called statically
        DatabaseConnection::connect('localhost', 'user', 'pass');
        
        // エラー: Non-static method DatabaseConnection::query() cannot be called statically  
        $result = DatabaseConnection::query('SELECT * FROM users');
        
        // エラー: Non-static method DatabaseConnection::close() cannot be called statically
        DatabaseConnection::close();
        
        return $result;
    }
}

/**
 * PHP 8.0で厳密になったStatic呼び出しのテスト
 * PHP 7.xでは警告だったが、PHP 8.0+ではより厳密にエラーとなる
 */
class StrictStaticCalls
{
    public function instanceMethod()
    {
        return "This should not be called statically";
    }

    public static function callInstanceMethodStatically()
    {
        // PHP 8.0+: Fatal error
        // PHP 7.x: Deprecated warning
        return self::instanceMethod();
    }
}