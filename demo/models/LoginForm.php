<?php

namespace app\models;

use yii\base\Model;

class Loginform extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],

        ];
    }
}