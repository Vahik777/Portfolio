<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use common\models\Func;
use backend\items\models\Categories;

$this->title = $homepage->seo_title;

$this->registerMetaTag(['name' => 'keywords', 'content' => $homepage->seo_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $homepage->seo_description]);

?>

<!--=== Preloader section starts ===-->
<section id="preloader">
    <div class="loading-circle fa-spin"></div>
</section>
<!--=== Preloader section Ends ===-->

<!--=== Header section Starts ===-->
<div id="header" class="header-section">
    <!-- sticky-bar Starts-->
    <div class="sticky-bar-wrap">
        <div class="sticky-section">
            <div id="topbar-hold" class="nav-hold container">
                <nav class="navbar" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--=== Site Name ===-->
                        <a class="site-name navbar-brand" href="#"><span>E</span>gret</a>
                    </div>

                    <!-- Main Navigation menu Starts -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="current"><a href="#header">Home</a></li>
                            <li><a href="#section-feature">Features</a></li>
                            <li><a href="#section-services">Services</a></li>
                            <li><a href="#step-1">Work Flow</a></li>
                            <li><a href="#section-screenshots">Screenshots</a></li>
                            <li><a href="#section-pricing">Blog</a></li>
                        </ul>
                    </div>
                    <!-- Main Navigation menu ends-->
                </nav>
            </div>
        </div>
    </div>
    <!-- sticky-bar Ends-->
    <!--=== Header section Ends ===-->

    <!--=== Home Section Starts ===-->
    <div id="section-home" class="home-section-wrap center">
        <div class="section-overlay"></div>
        <div class="container home">
            <div class="row">
                <h1 class="well-come">Brothers jewelry</h1>

                <div class="col-md-8 col-md-offset-2">
                    <p class="intro-message">Bring us your ideas and we will bring them to life!</p>


                </div>
            </div>
        </div>
    </div>
    <!--=== Home Section Ends ===-->
</div>


<!--=== Features section Starts ===-->
<section id="section-feature" class="feature-wrap">
    <div class="container features center">
        <div class="row">
            <div class="col-lg-12">
                <!--Features container Starts -->
                <ul id="card-ul" class="features-hold baraja-container">

                    <?php foreach($cats as $one){?>
                        <!-- Single Feature Starts -->
                        <li class="single-feature" title="Card style">
                            <img src="<?php echo Url::to("backend/web/upload/itemscat/thumbs/$one->img",true); ?>" alt="" class="feature-image" /><!-- Feature Icon -->
                            <h4 class="feature-title color-scheme"><?=$one->title?></h4>
                            <p class="feature-text">
                                <?=Func::getExcerpt($one->description,0,90)?>
                            </p>

                            <a href="<?php echo Url::to("category/$one->id/$one->slug",true); ?>" class="fancy-button button-line btn-col small vertical">
                                Details
                                <span class="icon">
                                    <i class="fa fa-leaf"></i>
                                </span>
                            </a>

                        </li>
                        <!-- Single Feature Ends -->
                    <?php }?>
                </ul>
                <!--Features container Ends -->

                <!-- Features Controls Starts -->
                <div class="features-control relative">
                    <button class="control-icon fancy-button button-line no-text btn-col bell" id="feature-prev" title="Previous" >
								<span class="icon">
									<i class="fa fa-arrow-left"></i>
								</span>
                    </button>
                    <button class="control-icon fancy-button button-line no-text btn-col zoom" id="feature-expand" title="Expand" >
								<span class="icon">
									<i class="fa fa-expand"></i>
								</span>
                    </button>
                    <button class="control-icon fancy-button button-line no-text btn-col zoom" id="feature-close" title="Collapse" >
								<span class="icon">
									<i class="fa fa-compress"></i>
								</span>
                    </button>
                    <button class="control-icon fancy-button button-line no-text btn-col bell" id="feature-next" title="Next" >
								<span class="icon">
									<i class="fa fa-arrow-right"></i>
								</span>
                    </button>
                </div>
                <!-- Features Controls Ends -->
            </div>
        </div>
    </div>
</section>
<!--=== Features section Ends ===-->

<!--=== Services section Starts ===-->
<section id="section-services" class="services-wrap">
    <div class="container services">
        <div class="row">

            <div class="col-md-10 col-md-offset-1 center section-title">
                <h3>What we do best</h3>
            </div>

            <!-- Single Service Starts -->
            <div class="col-md-6 col-sm-6 service animated" data-animation="fadeInLeft" data-animation-delay="700">
                <span class="service-icon center"><img src="<?php echo Url::to("frontend/web/images/diamond21.png",true); ?>"></span>
                <div class="service-desc">
                    <h4 class="service-title color-scheme"><?=$homepage->title_1?></h4>
                    <p class="service-description justify">
                        <?=$homepage->text_1?>
                    </p>
                </div>
            </div>
            <!-- Single Service Ends -->

            <!-- Single Service Starts -->
            <div class="col-md-6 col-sm-6 service animated" data-animation="fadeInUp" data-animation-delay="700">
                <span class="service-icon center"><img src="<?php echo Url::to("frontend/web/images/heart80.png",true); ?>"></span>
                <div class="service-desc">
                    <h4 class="service-title color-scheme"><?=$homepage->title_1?></h4>
                    <p class="service-description justify">
                        <?=$homepage->text_2?>
                    </p>
                </div>
            </div>
            <!-- Single Service ends -->

            <!-- Single Service Starts -->
            <div class="col-md-6 col-sm-6 service animated" data-animation="fadeInRight" data-animation-delay="700">
                <span class="service-icon center"><img src="<?php echo Url::to("frontend/web/images/wedding8.png",true); ?>"></span>
                <div class="service-desc">
                    <h4 class="service-title color-scheme"><?=$homepage->title_1?></h4>
                    <p class="service-description justify">
                        <?=$homepage->text_3?>
                    </p>
                </div>
            </div>
            <!-- Single Service Ends -->

            <!-- Single Service Starts -->
            <div class="col-md-6 col-sm-6 service animated" data-animation="fadeInUp" data-animation-delay="700">
                <span class="service-icon center"><img src="<?php echo Url::to("frontend/web/images/round46.png",true); ?>"></span>
                <div class="service-desc">
                    <h4 class="service-title color-scheme"><?=$homepage->title_1?></h4>
                    <p class="service-description justify">
                        <?=$homepage->text_4?>
                    </p>
                </div>
            </div>
            <!-- Single Service Ends -->
        </div>
    </div>
</section>
<!--=== Services section Ends ===-->

<!--=== Step-1 section Starts ===-->
<section id="step-1" class="section-step step-wrap">
    <div class="container step animated" data-animation="bounceInLeft" data-animation-delay="700">
        <div class="row">
            <!-- Step Description Starts -->
            <div class="col-md-8 step-desc">
                <div class="col-md-2 center">
                    <div class="step-no">
                        <span class="no-inner">1</span>
                    </div>
                </div>

                <div class="col-md-10 step-details">
                    <h3 class="step-title color-scheme">Work flow title here</h3>
                    <p class="step-description">Cillum laboris <strong>consequat</strong>, qui elit retro next level
                        skateboard freegan hella. Cillum laboris consequat qui elit retro next level
                        skateboard freegan hella. Cillum laboris consequat skateboard freegan hella</p>

                </div> <!-- End step-details -->
            </div>
            <!-- Step Description Ends -->
            <div class="col-md-4 step-img">
                <img src="images/jewels.png" alt="" /> <!-- Step Photo Here -->
            </div>
        </div>
    </div>
</section>
<!--=== Step-1 section Ends ===-->


<!--=== Video section Starts ===-->
<section id="section-video" class="section-video-wrap">
    <div class="section-overlay"></div>
    <div class="container big-video center animated" data-animation="fadeInLeft" data-animation-delay="700">
        <div class="row">
<!--            <div class="col-md-12 section-title">-->
<!--                <h3>Describe with a video</h3>-->
<!--            </div>-->
<!--            <div class="col-md-10 col-md-offset-1 video-content">-->
<!--                --><?php //echo $homepage->video?>
<!--            </div>-->
        </div>
    </div>
</section>
<!--=== Video section Ends ===-->

<!--=== ScreenShots section Starts ===-->
<section id="section-screenshots" class="screenshots-wrap">
    <div class="container screenshots animated" data-animation="fadeInUp" data-animation-delay="1000">
        <div class="row porfolio-container">
            <div class="col-md-10 col-md-offset-1 center section-title">
                <h3>Our Latest Projects</h3>
            </div>

            <?php foreach($items as $one){
                $cat = Categories::find()->select('title,slug,id')->where(['id'=>$one->cat_id,'lang'=>'am'])->one();

                ?>
                <!-- Single screenshot starts -->
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="screenshot">
                        <div class="photo-box">
                            <img src="<?php echo Url::to("backend/web/upload/items/thumbs/$one->img",true); ?>" alt="" />
                            <div class="photo-overlay">
                                <h4><?=$one->title?></h4>
                            </div>
                                <span class="photo-zoom">
                                    <a href="single-project.php" class="view-project"><i class="fa fa-search-plus fa-2x"></i></a>
                                    <div class="hidden">
                                        <div class="description"><?=Func::getExcerpt($one->description,0,250)?></div>
                                        <div class="title"><?=$one->title?></div>
                                        <div class="img"><?php echo Url::to("backend/web/upload/items/$one->img",true); ?></div>
                                        <div class="date"><?=date('d-m-Y',strtotime($one->created_at))?></div>
                                        <div class="category_title"><?=$cat->title?></div>
                                        <div class="category_id"><?=$cat->id?></div>
                                        <div class="category_slug"><?=$cat->slug?></div>
                                    </div>
                                </span>
                        </div>
                    </div>
                </div>
                <!-- Single screenshot ends -->
            <?php }?>


        </div>

        <div id="portfolio-loader" class="center">
            <div class="loading-circle fa-spin"></div>
        </div> <!--=== Portfolio loader ===-->

        <div id="portfolio-load"></div><!--=== ajax content will be loaded here ===-->

        <div class="col-md-12 center back-button">
            <a class="backToProject fancy-button button-line bell btn-col" href="#">
                Back
					<span class="icon">
						<i class="fa fa-arrow-left"></i>
					</span>
            </a>
        </div><!--=== Single portfolio back button ===-->
    </div>
</section>
<!--=== ScreenShots section Ends ===-->

<!--=== Testimonials section Starts ===-->
<section id="section-testimonials" class="testimonials-wrap">
    <div class="section-overlay"></div>
    <div class="container testimonials center animated" data-animation="rollIn" data-animation-delay="500">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="testimonial-slider">
                    <!-- Single Testimonial Starts -->
                    <div class="testimonial">
                        <p class="comment">
                           <?php echo Func::getExcerpt($testimonials[0]->text,0,300)?>
                        </p>

                        <h5 class="happy-client"><?php echo $testimonials[0]->name; ?></h5>
                    </div>
                    <!-- Single Testimonial Ends -->

                    <!-- Single Testimonial Starts -->
                    <div class="testimonial">
                        <p class="comment">
                            <?php echo Func::getExcerpt($testimonials[1]->text,0,300)?>
                        </p>

                        <h5 class="happy-client"><?php echo $testimonials[1]->name; ?></h5>
                    </div>
                    <!-- Single Testimonial Ends -->

                    <!-- Single Testimonial Starts -->
                    <div class="testimonial">
                        <p class="comment">
                            <?php echo Func::getExcerpt($testimonials[2]->text,0,300)?>
                        </p>

                        <h5 class="happy-client"><?php echo $testimonials[2]->name; ?></h5>
                    </div>
                    <!-- Single Testimonial Ends -->
                </div>
                <div id="bx-pager" class="client-photos">
                    <a data-slide-index="0" href="" class="photo-hold">
							<span class="photo-bg">
								<img src="images/client_2.jpg" alt="" /> <!-- Client photo 1 -->
							</span>
                    </a>
                    <a data-slide-index="1" href="" class="photo-hold">
							<span class="photo-bg">
								<img src="images/client_1.jpg" alt="" /> <!-- Client photo 2 -->
							</span>
                    </a>
                    <a data-slide-index="2" href="" class="photo-hold">
							<span class="photo-bg">
								<img src="images/client_3.jpg" alt="" /> <!-- Client photo 3 -->
							</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=== Testimonials section Ends ===-->


<!--=== Pricing section Starts ===-->
<section id="section-pricing" class="pricing-wrap">
    <div class="container pricing">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 center section-title">
                <h3>Blog</h3>
            </div>

            <?php foreach($posts as $one){?>
                <div class="col-lg-4 posts animated" data-animation="bounceInLeft">
                    <div class="col-lg-12 posts-div">
                        <div class="img">
                            <a href="<?php echo Url::to("blog/$one->slug",true); ?>">
                                <img src="<?php echo Url::to("backend/web/upload/posts/thumbs/$one->img",true); ?>">
                            </a>
                        </div>
                        <div class="text">
                            <a href="<?php echo Url::to("blog/$one->slug",true); ?>"><h2 class="entry-title"><?=$one->title?></h2></a>
                            <span><?=date('d-m-Y',strtotime($one->created_at))?></span>
                            <p><?=Func::getExcerpt($one->description,0,200)?></p>

                            <a href="<?php echo Url::to("blog/$one->slug",true); ?>" class="post-btn">Read More</a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<!--=== Pricing section Ends ===-->





<!--=== Contact section Starts ===-->
<section id="section-contact" class="contact-wrap">
    <div class="section-overlay"></div>
    <div class="container contact center animated" data-animation="flipInY" data-animation-delay="1000">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-10 col-md-offset-1 center section-title">
                    <h3>Leave a message</h3>
                </div>

                <div class="confirmation">
                    <p><span class="fa fa-check"></span></p>
                </div>

                <?= $this->render('_form', [
                    'model' => $contact,
                ]) ?>

            </div>
        </div>
    </div>
</section>
<!--=== Contact section Ends ===-->

<!--=== Footer section Starts ===-->
<div id="section-footer" class="footer-wrap">
    <div class="container footer center">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="footer-title"><!-- Footer Title -->
                    <a class="site-name" href="#"><span>E</span>gret</a>
                </h4>

                <!-- Social Links -->
                <div class="social-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    </ul>
                </div>

                <p class="copyright">All rights reserved &copy; 2015</p>
            </div>
        </div>
    </div>
</div>
