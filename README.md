Unit of NotFound
===

 Saving the 404 error URL.

# Usage

 Database initialization.

```php
\OP\UNIT\NotFound::Selftest();
```

 Save the URL automatically.

```php
\OP\UNIT\NotFound::Auto();
```

 Display the management screen.

```php
\OP\UNIT\NotFound::Admin();
```

# Config

```php
config = [
  'execute' => true,
  'dsn'     => 'mysql://notfound:password@localhost:3306?database=onepiece&charset=utf8',
];
```

 * execute is Execution flag
 * dsn is Database of Data Source Name.
