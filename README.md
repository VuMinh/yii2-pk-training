Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

----------------------
Migrate database
----------------------
Run câu lệnh: 'yii migrate/create create_post_table' để tạo migrate
Sau đó run câu lệnh : 'yii migrate' để tạo table trong database
Tham khảo thêm: http://www.yiiframework.com/doc-2.0/guide-db-migrations.html
-----------------------
Data Access Objects
--------------------------
```
 public function actionViewAllCard(){
        $connection = Yii::$app->getDb();
        $card = $connection->createCommand('SELECT * FROM flash_card')->queryAll();
        var_dump($card);
    }
```
---------------
Tham khảo thêm tại: http://www.yiiframework.com/doc-2.0/guide-db-dao.html

----------------------
Use ActiveRecord and ActiveQuery for custom sql query
------------------------------------------------------
The `where()` method specifies the WHERE fragment of a SQL query. You can use one of the three formats to specify a WHERE condition:
* string format, e.g., `status=1`
* hash format, e.g. `['status' => 1, 'type' => 2]`
* operator format, e.g. `['like', 'name', 'test']`
Xem thêm tại: http://www.yiiframework.com/doc-2.0/guide-db-query-builder.html#where

-----------------------------
Query Builder
------------------
```
$query = new Query();
        $query->select(['id', 'title'])
            ->from('flash_card')
            ->where(['id' => '2'])
            ->all();
```
Dạng trả về như sau:
```
SELECT `id`, `title` 
FROM `flash_card`
WHERE `id` = :2
```
------------------------
Assets trong yii2
----------------------
Assets được định nghĩa là tài sản nghĩa là những thứ có thể tham chiếu đến trong 1 trang web như css,js,ảnh ,video nói chung là những thứ dùng cho trang web ngoài code thì đặt trong assets

namespace backend\assets;

use yii\web\AssetBundle;
```
/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
```
* Cách sử dụng:
```
use app\assets\AppAsset;
AppAsset::register($this);  // $this represents the view object
```