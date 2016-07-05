<?php

namespace app\controllers;

use Yii;
use app\models\Photos;
use app\models\PhotosSearch;
use app\models\Categories;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
/**
 * BanerController implements the CRUD actions for Baner model.
 */
class PhotosController extends Controller
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
        $searchModel = new PhotosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single Photos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = (new \yii\db\Query())
        ->from('photos')
        ->where(['id' => $id])
        ->all();

        return $this->render('view', [
            'model' => $model,
            ]);
    }

    /**
     * Creates a new Photos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Photos();

        if (Yii::$app->request->isPost) {

         $model->file = UploadedFile::getInstance($model, 'file');

         if ($model->file && $model->validate()) {    

            $filename = substr(md5(microtime() . rand(0, 9999)), 0, 20);

            $model->file->saveAs('uploads/' .$filename . '.' . $model->file->extension);
            $model->images = ('uploads/' .$filename . '.' . $model->file->extension);
        }
    }

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
    } else {


        $items = ArrayHelper::map(Categories::find()->all(), 'id', 'title');

        return $this->render('create', [
            'model' => $model,
            'items'=> $items,
            ]);
    }
}

    /**
     * Updates an existing Baner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if (Yii::$app->request->isPost) {

         $model->file = UploadedFile::getInstance($model, 'file');

         if ($model->file && $model->validate()) {    

            $filename = substr(md5(microtime() . rand(0, 9999)), 0, 20);

            $model->file->saveAs('uploads/' .$filename . '.' . $model->file->extension);
            $model->img = ('uploads/' .$filename . '.' . $model->file->extension);
        }
    }
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->id]);
    } else {
       $items = ArrayHelper::map(Categories::find()->all(), 'id', 'title');
       return $this->render('update', [
        'model' => $model,
        'items'=> $items,
        ]);
   }
}

    /**
     * Deletes an existing Photos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Photos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Photos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
