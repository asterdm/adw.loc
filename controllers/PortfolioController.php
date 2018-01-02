<?php

namespace app\controllers;
use app\models\Category;
use app\models\CategoryMeta;
use app\models\Page;

class PortfolioController extends \yii\web\Controller
{
    public function actionIndex($category_id = 1)
    {
        //полчить список подчиненых категорий
        $parent_category = Category::find()->where(['parent_id' => $category_id, 'category_show' => 1])->all();
        if (!empty($parent_category)){
            
            foreach ($parent_category as $category) {
                $category ->sub_category = Category::find()->where(['parent_id' => $category->category_id, 'category_show' => 1])->all();
                $category_list[] = $category;
            }
        }    
        // получить заголовок и метатеги
        $category = Category::findOne($category_id);
        $page_meta = $category->meta;

        return $this->render('menu', 
                ['category' => $category,
                 'category_list' => $category_list,
                 'page_meta' => $page_meta,
                ]);
    }

        public function actionList($category_id)
    {
        // выводим список страниц выбранной категории либо конкретную страницу
        $category = Category::findOne($category_id);
        $page_list = $category->pages;
        var_dump($page_list);die;
    }
}
