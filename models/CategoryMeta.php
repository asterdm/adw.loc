<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_meta".
 *
 * @property string $category_meta_id
 * @property string $category_meta_title
 * @property string $category_meta_keywords
 * @property string $category_meta_description
 * @property string $category_meta_author
 * @property string $category_meta_robots
 * @property string $category_meta_category_id
 *
 * @property Category $categoryMetaCategory
 */
class CategoryMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_meta_title', 'category_meta_keywords', 'category_meta_description', 'category_meta_author', 'category_meta_robots'], 'string'],
            [['category_meta_category_id'], 'required'],
            [['category_meta_category_id'], 'integer'],
            [['category_meta_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_meta_category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_meta_id' => 'Category Meta ID',
            'category_meta_title' => 'Category Meta Title',
            'category_meta_keywords' => 'Category Meta Keywords',
            'category_meta_description' => 'Category Meta Description',
            'category_meta_author' => 'Category Meta Author',
            'category_meta_robots' => 'Category Meta Robots',
            'category_meta_category_id' => 'Category Meta Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryMetaCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_meta_category_id']);
    }
}
