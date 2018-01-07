<?php

namespace app\controllers;
use app\models\Category;
use app\models\CategoryMeta;
use app\models\Page;
use yii\helpers\Url;

class PortfolioController extends \yii\web\Controller
{
    public function actionIndex($category_id = 1)
    {
        //получить список подчиненых категорий
        $slave_category_list = Category::find()->where(['parent_id' => $category_id, 'category_show' => 1])->all();
        if (!empty($slave_category_list)){
            
            foreach ($slave_category_list as $slave_category) {
                $slave_category->sub_category = Category::find()->where(['parent_id' => $slave_category->category_id, 'category_show' => 1])->all();
                $slave_category_list[] = $category;
            }
        }    
        // получить заголовок и метатеги
        $category = Category::findOne($category_id);
        $page_meta = $category->meta;
        
        //хлебные
        $parent_category_id = $category->parent_id;
        while ($parent_category_id) {
            $parent_category = Category::findOne($parent_category_id);
            $breadcrumbs[] = ['label' => $parent_category->category_headline, 'url'  => Url::toRoute(['/portfolio', 'category_id' => $parent_category->category_id])];
            $parent_category_id = $parent_category->parent_id;
        }
        $breadcrumbs[] = ['label' => $category->category_headline, 'url' => Url::toRoute(['/portfolio', 'category_id' => $category->category_id]) ];

        return $this->render('menu', 
                ['category' => $category,
                 'category_list' => $slave_category_list,
                 'page_meta' => $page_meta,
                 'breadcrumbs' => $breadcrumbs,
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
