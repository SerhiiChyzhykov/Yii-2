<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $post
 * @property integer $user_id
 * @property integer $photo_id
 */

class Post extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

     /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['user_id','photo_id'], 'integer'],
            [['post'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => '',
            'photo_id' => '',
            'post' => 'Message',
        ];
    }
}
