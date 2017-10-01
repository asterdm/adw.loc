<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property string $id_report
 * @property string $report_url
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
            [['id_report'], 'required'],
            [['id_report'], 'integer'],
            [['report_url'], 'string', 'max' => 200],
            [['id_report'], 'unique'],
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
