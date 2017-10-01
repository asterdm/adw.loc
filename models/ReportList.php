<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_list".
 *
 * @property string $id_report_list
 * @property string $report_id
 * @property string $client_id
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
            [['id_report_list'], 'required'],
            [['id_report_list', 'report_id', 'client_id'], 'integer'],
            [['id_report_list'], 'unique'],
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
            'report_id' => 'Report ID',
            'client_id' => 'Client ID',
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
