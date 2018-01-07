<!-- Quotes Section -->

<?php use yii\helpers\Url ?>
<?php
    $this->title = $page->page_title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $page_meta->page_keywords]);
    $this->registerMetaTag(['name' => 'description', 'content' => $page_meta->page_description]);
    $this->registerMetaTag(['name' => 'Robots', 'content' => $page_meta->robots]);
    $this->registerMetaTag(['name' => 'Author', 'content' => $page_meta->page_author]);
    $this->params['breadcrumbs'] = $breadcrumbs;

?>
<section id="quotes" class="parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">
               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <i class="wow fadeInUp fa fa-star" data-wow-delay="0.6s"></i>                    
                    <h3 class="wow fadeInUp" data-wow-delay="0.8s"><?= $category->category_headline ?></h3>
               </div>
               <div class="color-white education-thumb">
                <?php if (!empty($category_list)) : ?>   
                    <?php foreach ($category_list as $category): ?>
                        <?php $t = $t+0.5 ?>
                    <div class="media-body">
                        <h3 class="wow fadeInUp" data-wow-delay="<?= $t ?>s"><a href="<?= Url::toRoute(['/portfolio', 'category_id' => $category->category_id]) ?>"><?= $category->category_headline ?></a></h3>
                            <?php if (!empty($category->sub_category)) : ?>
                                <?php foreach ($category->sub_category as $sub_category): ?>
                            <p class="wow fadeInUp" data-wow-delay="<?= $t ?>s"><a href="<?= Url::toRoute(['/portfolio', 'category_id' => $sub_category->category_id]) ?>"><?= $sub_category->category_headline ?></a></p>
                                <?php endforeach ?>
                            <?php endif ?>                          
                    </div>        

                    <?php endforeach ?>
                <?php endif ?>     
               </div>
          </div>
     </div>
</section>