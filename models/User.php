<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_MANAGER = 'manager';

    public static function tableName()
    {
        return 'user'; // This should match your database table name
    }

    public function rules()
    {
        return [
            [['name', 'email', 'password', 'role'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => self::class],
            ['role', 'in', 'range' => [self::ROLE_ADMIN, self::ROLE_USER, self::ROLE_MANAGER]],
            ['password', 'string', 'min' => 6],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public function getId()
    {
        return $this->id; // Ensure this matches your database column
    }

    public function getAuthKey()
    {
        return null; // Implement if needed
    }

    public function validateAuthKey($authKey)
    {
        return false; // Implement if needed
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                // Hash the password before saving a new user
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }
}
