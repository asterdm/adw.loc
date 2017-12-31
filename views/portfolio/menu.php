<!-- Quotes Section -->

<section id="quotes" class="parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">
               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <i class="wow fadeInUp fa fa-star" data-wow-delay="0.6s"></i>                    
                    <h3 class="wow fadeInUp" data-wow-delay="0.8s">Портфолио</h3>
               </div>
               <div class="color-white education-thumb">

                    <?php foreach ($category_list as $category): ?>
                        <?php $t = $t+0.5 ?>
                    <div class="media-body">
                        <h3 class="wow fadeInUp" data-wow-delay="<?= $t ?>s"><a href="<?= 'sdf' ?>"><?= $category->category_headline ?></a></h3>
                            <?php foreach ($category->sub_category as $sub_category): ?>
                            <p class="wow fadeInUp" data-wow-delay="<?= $t ?>s"><a href="<?= 'sdf' ?>"><?= $sub_category->category_headline ?></a></p>
                            <?php endforeach ?>
                    </div>        

                    <?php endforeach ?>
               </div>
          </div>
     </div>
</section>