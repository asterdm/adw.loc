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
class Client extends \yii\db\ActiveRecord
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
}
