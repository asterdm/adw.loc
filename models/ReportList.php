<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_list".
 *
 * @property string $id_report_list
 * @property string $client_login
 * @property string $report_name
 * @property string $client_id
 * @property string $report_id
 *
 * @property Client $client
 * @property Report $report
 */
class ReportList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_login', 'client_id', 'report_id'], 'required'],
            [['client_id', 'report_id'], 'integer'],
            [['client_login', 'report_name'], 'string', 'max' => 45],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['client_id' => 'id_client']],
            [['report_id'], 'exist', 'skipOnError' => true, 'targetClass' => Report::className(), 'targetAttribute' => ['report_id' => 'id_report']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_report_list' => 'Id Report List',
            'client_login' => 'Client Login',
            'report_name' => 'Report Name',
            'client_id' => 'Client ID',
            'report_id' => 'Report ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id_client' => 'client_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReport()
    {
        return $this->hasOne(Report::className(), ['id_report' => 'report_id']);
    }
}
