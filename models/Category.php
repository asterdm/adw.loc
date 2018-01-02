<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $category_id
 * @property string $category_url
 * @property string $category_headline
 * @property string $category_description
 * @property integer $category_show
 * @property string $parent_id
 *
 * @property Page[] $pages
 */
class Category extends \yii\db\ActiveRecord
{
    public $sub_category;
    
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_description'], 'string'],
            [['category_show'], 'integer'],
            [['category_url', 'category_headline', 'parent_id'], 'string', 'max' => 45],
            [['category_url'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_url' => 'Category Url',
            'category_headline' => 'Category Headline',
            'category_description' => 'Category Description',
            'category_show' => 'Category Show',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['page_category_id' => 'category_id']);
    }
    
    public function getMeta()
    {
        return $this->hasMany(CategoryMeta::className(), ['category_meta_category_id' => 'category_id']);
    }
}
