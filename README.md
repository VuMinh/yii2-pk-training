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
-----------------------
Request and respone in yii2
-------------------------
1) Request in yi2
-----------------
Các thông số trong requests: để sử dụng request trong yii2 ta sử dụng một số hàm như sau
```
$request = Yii::$app->request;

$get = $request->get();
// giống code trong php: $get = $_GET;

$user_id = $request->get('user_id');
// giống code trong php: $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;

$user_id = $request->get('user_id', 1);
// giống code trong php: $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : 1;

$post = $request->post();
// giống code trong php: $post = $_POST;

$name = $request->post('name');
// giống code trong php : $name = isset($_POST['name']) ? $_POST['name'] : null;

$name = $request->post('name', '');
// giống code trong php: $name = isset($_POST['name']) ? $_POST['name'] : '';
```
-------------
Request URLs
-------------
```
echo Yii::$app->request->getUrl();
// get url không hoàn chỉnh /demoyii2/frontend/web/demo.html
echo Yii::$app->request->getabsoluteUrl();
// get url hoàn chỉnh :http://localhost/demoyii2/frontend/web/demo.html
echo Yii::$app->request->gethostInfo();
// get thông tin host :http://localhost
echo Yii::$app->request->getpathInfo();
//get path info :demo.html
echo Yii::$app->request->getqueryString();
// get đoạn mã query :/demoyii2/frontend/web
echo Yii::$app->request->getbaseUrl();
// lấy thông tin domain : localhost
echo Yii::$app->request->getserverName();
// rõng vì server ko có 
echo Yii::$app->request->getserverPort();
// cổng web : 80
```
---------------------
2.Responses trong yii2
---------------------
Responses trong yii2 xử lý các quá trình liên quan đến trả dữ liệu về người dùng
Các nội dung liên quan:
1) Trả về dữ liệu HTTP Headers
```
$headers = Yii::$app->response->headers;
// thêm Pragma header. Nếu tồn tại Pragma headers thì sẽ ko viết đè lên
$headers->add('Pragma', 'no-cache');
// thêm Pragma header .Mọi Pragma tồn tại sẽ bị discarded 
$headers->set('Pragma', 'no-cache');
// xóa bỏ Pragma 
$values = $headers->remove('Pragma');
```
2) Response Body: thường chúng ta sẽ response bằng phương thức `render`, bên cạnh đó có thể dùng cách như sau(cách này ít khi dùng)
```
Yii::$app->response->content = 'hello world!';
```
3) Chuyển hướng trang web:
```
return $this->redirect('http://google.com');
```
4) Send File(gửi file cho ng dùng bằng phương thức sendfile),thường kết hợp với ajax trong website
```
public function actionDownload()
{
    return \Yii::$app->response->sendFile('path/to/file');
}
```
----------
Yii2 Rest API
------------
Có nhiều cách tạo Rest API, trong phần này sẽ sẽ trình bày 3 cách cơ bản tạo Rest API trong Yii2
1)Dùng qua ActiveController
 ```
 class DemoRestController extends ActiveController
 {
     public $modelClass = 'common\models\Rest';
 
     public function prepareDataProvider()
     {
         $query = \common\models\Rest::find()->all();
         return new ActiveDataProvider(['query' => $query,]);
     }
     public function actionDemo(){
         return $query = \common\models\Rest::find()->all();
     }
 }
 ```
---------------
2)Dùng qua Controller
```
class Demov2Controller extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $rest = Rest::find()->all();
        return $rest;
    }
    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $rest = new Rest ();
        $rest->attributes = \Yii::$app->request->post();
        if ($rest->validate()) {
            $rest->save();
            return array(
                'status' => 1,
                'data' => 'Đã thêm thành công'
            );
        } else {
            return array(
                'status' => 0,
            );
        }
    }
}
```
3)Tạo Restfull API bằng thư viện `"fproject/yii2-restx": "*"`
Cấu trúc thư mục như sau:
```
api
-config
-modules
--v1
---controllers
---models
-runtime
-.htaccess
-index.php
```
-----------------------
Session, Cookies in Yii2
------------------------
Khi cần truyền dữ liệu nhiều lần qua nhiều lần request ta thường dùng session và cookies.
Yii2 hỗ trợ các tính năng đó thông qua biến $_SESSION và $_COOKIE
1) Session:
Session được lưu trữ trên serverweb.
Ví dụ về Session:
```
<?php
namespace frontend\controllers;
use yii\base\Controller;
use Yii;
class SessiondemoController extends Controller
{
	public function actionIndex()
	{
		$session = \Yii::$app->session;
		$session->open();
		$session->set('name','Minh vt');
		$session->close();
		return $this->render('index');
	}
	public function actionView()
	{
		$session = \Yii::$app->session;
		$name = $session->get('name');
		echo $name;
	}
}
```
File view index.php
```
<?php
use yii\helpers\Html;
?>
<p>Demo sessions va cookies</p>
<?= Html::a('Link demo session',['sessiondemo/view']); ?>
```
Muốn sử dụng session trong Yii2 hỗ trợ Component User(còn nếu muốn sử dụng session 1 lần duy nhất ta sử dụng Flash)
ex:
```
Yii::$app->session->addFlash('success','Thêm mới thành công');
```
-------------------
2) Cookies
Cookies là những thông tin ta gửi đến khách hàng giữ hộ.
ex:
```
<?php
namespace frontend\controllers;
use yii\base\Controller;
use yii\web\Cookie;
 
class CookiesController extends Controller
{
	public function actionIndex()
	{
		$cookies = \Yii::$app->response->cookies;
		$cookies->add(new \yii\web\Cookie([
    'name' => 'Minh vt',
    
]));
		return $this->render('index');
	}	
	public function actionView()
	{
		$cookies = \Yii::$app->request->cookies;
		echo $cookies['cookieValidationKey'];
	}
}
```
* node: khi làm việc vs cookie thì name không đk bao gồm các kí tự đặc biệt sau `=,; \t\r\n\013\014`
----------------
Formatter in Yii2
-----------------
1) i18n
Add i18n component in config 
```
'i18n' => [
    'translations' => [
        'app*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/messages',
            'sourceLanguage' => 'en-US',
            'fileMap' => [
                'app' => 'app.php',
                'app/error' => 'error.php',
                'app/pk' => 'pk.php'
            ],
        ],
    ],  
]
```
------------------------------
Create folder messages and 2 sub-folder for vi-VN - Vietnamese and jp-JP - Japanese language.
Create file app.php, pk.php and define key-value from source language to target language.

2) Data Formatting
ex:
```
$formatter = \Yii::$app->formatter;
// output: January 1, 2014
echo $formatter->asDate('2014-01-01', 'long');
 
// output: 12.50%
echo $formatter->asPercent(0.125, 2);
// output: <a href="mailto:cebe@example.com">cebe@example.com</a>
echo $formatter->asEmail('cebe@example.com'); 
// output: Yes
echo $formatter->asBoolean(true); 
// it also handles display of null values:
// output: (not set)
echo $formatter->asDate(null); 
```
