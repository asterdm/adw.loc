<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MainAsset;
use yii\bootstrap\Carousel;


MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
<?php $this->beginBody() ?>
<!-- Navigation Section -->

    <?php
    NavBar::begin([
        'brandLabel' => 'Dmitry Yugin',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-fixed-top custom-navbar',
        ],
    ]);
    
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav navbar-right'],  
        'items' => [
            ['label' => 'Начало', 'url' => ['/site/index','#' => 'home'],'linkOptions' => ['class' => 'smoothScroll']],
            ['label' => 'Обо мне', 'url' => ['/site/index','#' => 'about'],'linkOptions' => ['class' => 'smoothScroll']],
            ['label' => 'Опыт и знания', 'url' => ['/site/index','#' => 'experience'],'linkOptions' => ['class' => 'smoothScroll']],
            ['label' => 'Портфолио', 'url' => ['/site/index','#' => 'quotes'],'linkOptions' => ['class' => 'smoothScroll']],
            ['options' => ['class' => 'dropdown'],'label' => 'Контакты', 'url' => ['/site/index','#' => 'contact'],'linkOptions' => ['class' => 'smoothScroll']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login'],'linkOptions' => ['class' => 'smoothScroll']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'smoothScroll']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
<?= $content ?>
<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        
    </div>
</div>

<!-- Footer Section -->

<footer>
	<div class="container">
		<div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="wow fadeInUp footer-copyright" data-wow-delay="1.8s">
                         <p>Copyright &copy; 2017 Dmitry Yugin
                    
                    | Design: web force<!--<a href="http://www.google.com/+templatemo" target="_parent">templatemo</a>--></p>
                    </div>
				<!-- Footer Section <ul class="wow fadeInUp social-icon" data-wow-delay="2s">
                         <li><a href="#" class="fa fa-facebook"></a></li>
                         <li><a href="#" class="fa fa-twitter"></a></li>
                         <li><a href="#" class="fa fa-google-plus"></a></li>
                         <li><a href="#" class="fa fa-dribbble"></a></li>
                         <li><a href="#" class="fa fa-linkedin"></a></li>
                    </ul>-->
               </div>
			
		</div>
	</div>
</footer>

<?php $this->endBody() ?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KK428MH');</script>
<!-- End Google Tag Manager -->

</body>
</html>
<?php $this->endPage() ?>
