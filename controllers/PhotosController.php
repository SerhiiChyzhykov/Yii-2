<?php

namespace app\controllers;

use Yii;
use app\models\Photos;
use app\models\PhotosSearch;
use app\models\Categories;
use app\models\User;
use app\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use app\controllers\Query;
use yii\data\Pagination;
/**
 * PhotosController implements the CRUD actions for Photos model.
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
    public function actionIndex($user)
    {
       $query = Photos::find()->where(['user_id' => $user]);

       $countQuery = clone $query;

       $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
       $pages->pageSizeParam = false;
       if($user == ''):

           $user = Yii::$app->user->identity->id;
       $models = $query->offset($pages->offset)
       ->where(['user_id' => $user])
       ->limit($pages->limit)
       ->all();

       else:

        $models = $query->offset($pages->offset)
    ->where(['user_id' => $user])
    ->limit($pages->limit)
    ->all();

    endif;

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
    /**
     * Displays a single Photos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
    $items = ArrayHelper::map(Categories::find()->all(), 'id', 'title');
    $post = new Post();

    $model = (new \yii\db\Query())
    ->from('photos')
    ->where(['id' => $id])
    ->all();

    $cat = (new \yii\db\Query())
    ->from('categories')
    ->all();

    $comments = (new \yii\db\Query())
    ->from('post')
    ->where(['photo_id' => $id])
    ->orderBy('id DESC')
    ->limit('5')
    ->all();

    foreach ($comments as $key) {

        $customer = User::findOne($key['user_id']);
        $username = $customer->username;
    }
    $photo = $this->findModel($id);
        
        if (Yii::$app->request->isPost) {

           $photo->file = UploadedFile::getInstance($photo, 'file');

           if ($photo->file && $photo->validate()) {    

            $filename = substr(md5(microtime() . rand(0, 9999)), 0, 20);

            $photo->file->saveAs('uploads/' .$filename . '.' . $photo->file->extension);
            $photo->images = ('uploads/' .$filename . '.' . $photo->file->extension);
        }
    }
     if ($photo->load(Yii::$app->request->post()) && $photo->save()) {
        return $this->redirect(['view', 'id' => $photo->id]);
    
 }
    elseif($post->load(Yii::$app->request->post()) && $post->user_id == NULL){
       $messages['danger'] = 'You are not registered!'; 

       return $this->render('view', [
        'model'     => $model,
        'cat'       => $cat,
        'comments'  => $comments,
        'username'  => $username,
        'post'      => $post,
        'messages'  => $messages,
        'items'     => $items,
        'photo'     => $photo,
        ]);
   }
   elseif ($post->load(Yii::$app->request->post()) && $post->save()) {
    return $this->redirect('/photo?id='.$id);
} else {

    return $this->render('view', [
        'model'     => $model,
        'cat'       =>  $cat,
        'comments'  => $comments,
        'username'  => $username,
        'post'      => $post,
        'items'     => $items,
        'photo'     => $photo,
        ]);
}

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
     * Updates an existing Photos model.
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

        return $this->redirect(['/home']);
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
