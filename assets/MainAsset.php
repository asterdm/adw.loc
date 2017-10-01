<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'main/css/animate.css',
        'main/css/bootstrap.min.css',
        'main/css/font-awesome.min.css',
        'main/css/style.css',
    ];
    public $js = [
        'main/js/bootstrap.min.js',
        'main/js/custom.js',
        'main/js/jquery.js',
        'main/js/jquery.parallax.js',
        'main/js/smoothscroll.js',
        'main/js/wow.min.js',
        
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
