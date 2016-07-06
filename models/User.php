<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string email
 * @property string $password_hash
 * @property string $auth_key
 * @property integer confirmed_at
 * @property string unconfirmed_email
 * @property integer blocked_at
 * @property string registration_ip
 * @property integer created_at
 * @property integer updated_at
 * @property integer flags
 * 
 */

class User extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

}
