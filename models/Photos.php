<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "photos".
 *
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property integer $category_id
 * @property string $images
 * @property string $description
 * @property string $date
 */

class Photos extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
        /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['user_id','category_id'], 'integer'],
            [['file'], 'file', 'extensions' => 'gif, jpg,png'],
            [['title','images','description'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'description',
            'images' => 'File',
            'user_id' => 'user_id',
        ];
    }
}
