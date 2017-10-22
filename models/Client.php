<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property string $id_client
 * @property string $login
 * @property string $password
 *
 * @property ReportList[] $reportLists
 */
class Client extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [           
          
            [['login', 'password'],'required'],
            [['login', 'password'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_client' => 'Id Client',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportLists()
    {
        return $this->hasMany(ReportList::className(), ['client_id' => 'id_client']);
    }
    
    public function getReports()
    {
        return $this->hasMany(Report::className(), ['id_report' => 'report_id'])
            ->viaTable('report_list', ['client_id' => 'id_client']);
    }

    public function getAuthKey() {
        
    }

    public function getId() {
        
        return $this->id_client;
    }

    public function validateAuthKey($authKey) {
        
    }

    public static function findIdentity($id) {
        
        return Client::find()
            ->where(['id_client' => $id])
            ->one();
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        
    }
    
    public function validatePassword($password)
    {
        return $this->password === $password;

    }
}
