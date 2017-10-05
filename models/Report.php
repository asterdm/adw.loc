<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property string $id_report
 * @property string $report_url
 * @property string $report_description
 *
 * @property ReportList[] $reportLists
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_url'], 'string', 'max' => 200],
            [['report_description'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_report' => 'Id Report',
            'report_url' => 'Report Url',
            'report_description' => 'Report Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportLists()
    {
        return $this->hasMany(ReportList::className(), ['report_id' => 'id_report']);
    }
}
