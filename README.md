Yii 2 Basic Project
============================

CONFIGURATION
-------------

### Database

1) Insert the file 'db.sql' in your database.


2) Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
];
```
