<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property string $page_id
 * @property string $page_url
 * @property string $page_title
 * @property string $page_keywords
 * @property string $page_description
 * @property string $page_author
 * @property string $robots
 * @property integer $page_show
 * @property string $page_category_id
 *
 * @property Article[] $articles
 * @property Gallery[] $galleries
 * @property Category $pageCategory
 * @property Powerbi[] $powerbis
 * @property Youtube[] $youtubes
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_title', 'page_keywords', 'page_description', 'robots'], 'string'],
            [['page_show', 'page_category_id'], 'integer'],
            [['page_category_id'], 'required'],
            [['page_url', 'page_author'], 'string', 'max' => 45],
            [['page_url'], 'unique'],
            [['page_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['page_category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_id' => 'Page ID',
            'page_url' => 'Page Url',
            'page_title' => 'Page Title',
            'page_keywords' => 'Page Keywords',
            'page_description' => 'Page Description',
            'page_author' => 'Page Author',
            'robots' => 'Robots',
            'page_show' => 'Page Show',
            'page_category_id' => 'Page Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_page_id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['gallery_page_id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'page_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPowerbis()
    {
        return $this->hasMany(Powerbi::className(), ['powerbi_page_id' => 'page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYoutubes()
    {
        return $this->hasMany(Youtube::className(), ['youtube_page_id1' => 'page_id']);
    }
}
