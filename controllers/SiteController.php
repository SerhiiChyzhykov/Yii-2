<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\Pagination;
use app\models\Photos;
use app\models\Categories;


/**
 * SiteController
 */
class SiteController extends Controller
{

 public function behaviors()
 {
  return [
  'access' => [
  'class' => AccessControl::className(),
  'only' => ['logout'],
  'rules' => [
  [
  'actions' => ['logout'],
  'allow' => true,
  'roles' => ['@'],
  ],
  ],
  ],
  'verbs' => [
  'class' => VerbFilter::className(),
  'actions' => [
  'logout' => ['post'],
  ],
  ],
  ];
}

public function actions()
{
  return [
  'error' => [
  'class' => 'yii\web\ErrorAction',
  ],
  'captcha' => [
  'class' => 'yii\captcha\CaptchaAction',
  'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
  ],
  ];
}

/* Home page */
public function actionIndex()
{
  $query = Photos::find();
  
  $countQuery = clone $query;
  
  $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
  
  $pages->pageSizeParam = false;
  $models = $query->offset($pages->offset)
  ->limit($pages->limit)
  ->all();

  foreach ($models as $key) {

    $cat = Categories::findOne($key['category_id']);
    $category = $cat->title;
  }

  return $this->render('index', [
   'models'   => $models,
   'pages'    => $pages,
   'category' => $category,
   ]);
}

/* If page not found */
public function actionLogin()
{
  if (!Yii::$app->user->isGuest) {
    return $this->goHome();
  }

  $model = new LoginForm();
  if ($model->load(Yii::$app->request->post()) && $model->login()) {
    return $this->goBack();
  }
  return $this->render('login', [
    'model' => $model,
    ]);
}

public function actionLogout()
{
  Yii::$app->user->logout();

  return $this->goHome();
}

public function actionContact()
{
  $model = new ContactForm();
  if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    Yii::$app->session->setFlash('contactFormSubmitted');

    return $this->refresh();
  }
  return $this->render('contact', [
    'model' => $model,
    ]);
}

public function actionAbout()
{
  return $this->render('about');
}

}
