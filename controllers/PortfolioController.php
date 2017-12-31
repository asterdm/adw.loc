<?php

namespace app\controllers;
use app\models\Category;

class PortfolioController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //полчить список объектов главных категорий
        $parent_category = Category::find()->where(['parent_id' => 0, 'category_show' => 1])->all();
        foreach ($parent_category as $category) {
            $category ->sub_category = Category::find()->where(['parent_id' => $category->category_id, 'category_show' => 1])->all();
            $category_list[] = $category;
        }
        // получить заголовок и метатеги
        

        return $this->render('menu', ['category_list' => $category_list]);
    }

        public function actionView($category)
    {
        // выводим либо список страниц выбранной категории либо конкретную страницу
            
    }
}
