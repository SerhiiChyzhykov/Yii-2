<?php

namespace app\controllers;

use Yii;
use app\models\Categories;
use app\models\Photos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'delete' => ['POST'],
        ],
        ],
        ];
    }


    /**
     * Lists all Photos models.
     * @return mixed
     */
    public function actionIndex()
    {

        $count = (new \yii\db\Query())
        ->from('categories')
        ->count();

        $cat_id = rand(1,$count);

        $photo = Photos::find()
        ->limit('4')
        ->all();

        $cat = Categories::find()
        ->all();

        return $this->render('index', [
         'photo'   => $photo,
         'cat'     => $cat,
         'cat_id'  => $cat_id,

         ]);
    }

    public function actionView($id)
    {
        $query = Photos::find()->where(['category_id' => $id]);

        $countQuery = clone $query;

        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);

        $pages->pageSizeParam = false;
        $photo = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

        foreach ($photo as $key) {

            $cat = Categories::findOne($key['category_id']);
            $category = $cat->title;
        }

        return $this->render('view', [
            'photo'   => $photo,
            'pages'    => $pages,
            'category' => $category,
            ]);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
