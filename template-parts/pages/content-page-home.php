<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
$enableReviews = get_field( 'enable_reviews' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="page-content-section home-page-section home-section-1 home-entry-content" <?php if ( $featured_img_url ): ?>style="background-image: url(<?php echo $featured_img_url; ?>)"<?php endif; ?>>
        <?php eur_ex_post_thumbnail(); ?>
        <div class="container">
            <div class="row align-items-center">

                <?php
                $section1LeftCol = get_field( 'home_section_1_left' );
                if ( $section1LeftCol ):
                    $heading = $section1LeftCol['heading'];
                    $desc = $section1LeftCol['description'];
                    $desc_full = $section1LeftCol['description_full'];
                    $link = $section1LeftCol['link'];
                    $linkText = $section1LeftCol['link_text']; ?>
                    <div class="col-12 col-lg-6 py-3">
                        <?php if ( $heading ): ?>
                            <header class="entry-header text">
                                <h1 class="h4"><?php echo $heading; ?></h1>
                            </header><!-- .entry-header -->
                        <?php endif; ?>
                        <div class="entry-text text">
                            <?php if ( $desc ): ?>
                                <?php echo $desc; ?>
                            <?php endif; ?>
                        </div>

                        <!--<?php if ( $link ): ?>
                            <a href="#home-page-entry-desc-full" class="entry-link">
                                <span class="text"><?php echo $linkText; ?></span>
                                <span class="chewron-double">
                                    <i class="icon icon-chevron-right"></i>
                                    <i class="icon icon-chevron-right"></i>
                                </span>
                            </a>
                        <?php endif; ?>-->

                    </div>
                <?php endif; ?>

                <?php if( have_rows( 'home_section_1_right' ) ):
                    while( have_rows( 'home_section_1_right' ) ): the_row(); ?>
                        <div class="col-12 col-lg-6 py-3">
                            <?php if( have_rows( 'home_section_1_right_list' ) ): ?>
                                <ul class="no-style-list list-icon-left services-list">
                                    <?php while( have_rows( 'home_section_1_right_list' ) ) : the_row();
                                        $icon = get_sub_field( 'home_section_1_right_icon' );
                                        $text = get_sub_field( 'home_section_1_right_text' );
                                        $link = get_sub_field( 'home_section_1_right_link' ); ?>
                                        <li class="list-item">
                                            <?php if ( $link ): ?>
                                                <a href="<?php echo $link; ?>">
                                            <?php endif; ?>
                                                <img src="<?php echo $icon; ?>" width="" height="" class="icon">
                                                <span class="list-text text"><?php echo $text; ?></span>
                                            <?php if ( $link ): ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div><!-- .col-12 -->
                    <?php endwhile; ?>
                <?php endif; ?>

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-entry-content -->

    <section class="page-content-section home-page-section home-section-2 why-choose-us-section">
        <div class="container negative-margin-top-cont--form-calc">
            <div class="row justify-content-md-center">
                <div class="col-12 col-lg-8 py-3">
                    <?php get_template_part( 'template-parts/content', 'calculation-form' ); ?>
                </div>

                <?php $homeSection2Heading = get_field( 'home_section_2_heading');
                if ( $homeSection2Heading ): ?>
                    <div class="col-12 py-3">
                        <h2 class="section-heading h4 t-center c-black"><?php echo $homeSection2Heading; ?></h2>
                    </div>
                <?php endif; ?>

                <?php
                if( have_rows( 'home_section_2_list' ) ):
                    while ( have_rows( 'home_section_2_list' ) ) : the_row(); ?>
                        <div class="col-12 col-lg-6 py-2">
                            <?php if( have_rows( 'home_section_2_list_item' ) ): ?>
                                <ul class="left-icon-list no-style-list">
                                    <?php while ( have_rows( 'home_section_2_list_item' ) ) : the_row();
                                        $homeSection2ListItemIcon = get_sub_field( 'home_section_2_list_item_icon' );
                                        $homeSection2ListItemName = get_sub_field( 'home_section_2_list_item_name' );
                                        $homeSection2ListItemDesc = get_sub_field( 'home_section_2_list_item_description' ); ?>
                                        <li class="list-item">
                                            <?php if ( $homeSection2ListItemIcon ){
                                                echo '<span class="list-img-wrap"><img src="' . $homeSection2ListItemIcon . '" alt="' . $homeSection2ListItemName . '"></span>';
                                            } ?>
                                            <span class="list-text-wrap">
                                                <span class="list-item-heading"><?php echo $homeSection2ListItemName; ?></span>
                                                <span class="list-item-desc"><?php echo $homeSection2ListItemDesc; ?></span>
                                            </span>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div><!-- col-12 col-lg-6 -->
                    <?php endwhile;
                endif; ?>

                <?php
                if( have_rows( 'home_section_2_right' ) ): ?>
                    <div class="col-12 col-lg-6 py-3 add-content-col">
                        <?php while ( have_rows( 'home_section_2_right' ) ) : the_row();
                            $heading = get_sub_field( 'home_section_2_right_heading' );
                            $desc = get_sub_field( 'home_section_2_right_desc' );
                            if ( $heading ){
                                echo '<h4 class="h6 c-black add-heading">' . $heading . '</h4>';
                            }
                            if ( $desc ){
                                echo '<div class="desc">' . $desc . '</div>';
                            }
                        ?>
                    </div>
                    <?php endwhile;
                endif; ?>

            </div>
        </div>
    </section><!-- .why-choose-us-section -->

    <section class="page-content-section home-page-section home-section-3 we-are-trusted-section">
        <div class="container">
            <div class="row">

                <?php $homeSection3Heading = get_field( 'section_3_heading');
                if ( $homeSection3Heading ): ?>
                    <div class="col-12">
                        <h2 class="section-heading h4 t-center c-black"><?php echo $homeSection3Heading; ?></h2>
                    </div>
                <?php endif; ?>

                <?php
                if( have_rows( 'section_3_left' ) ):
                    while ( have_rows( 'section_3_left' ) ) : the_row(); ?>
                        <div class="col-12 col-lg-6 py-3">
                            <?php $section3LeftHeading = get_sub_field( 'section_3_left_heading' ); ?>
                            <?php if ($section3LeftHeading): ?>
                                <h3 class="h6 add-heading c-black"><?php echo $section3LeftHeading; ?></h3>
                            <?php endif; ?>
                            <?php if( have_rows( 'section_3_left_list_item' ) ): ?>
                                <ul class="special-list-with-heading no-style-list">
                                    <?php while ( have_rows( 'section_3_left_list_item' ) ) : the_row();
                                        $homeSection3ListItemName = get_sub_field( 'section_3_left_list_item_name' );
                                        $homeSection3ListItemDesc = get_sub_field( 'section_3_left_list_item_desc' ); ?>
                                        <li class="list-item t-12">
                                            <span class="list-item-heading"><?php echo $homeSection3ListItemName; ?></span>
                                            <span class="list-item-desc"><?php echo $homeSection3ListItemDesc; ?></span>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div><!-- col-12 col-lg-6 -->
                    <?php endwhile;
                endif; ?>

                <div class="col-12 col-lg-6 py-3">
                    <?php
                    if( have_rows( 'section_3_right' ) ):
                        while ( have_rows( 'section_3_right' ) ) : the_row(); ?>
                            <?php if( have_rows( 'section_3_left_list_item2' ) ): ?>
                                <ul class="special-list-with-heading no-style-list">
                                    <?php while ( have_rows( 'section_3_left_list_item2' ) ) : the_row();
                                        $homeSection3ListItemName = get_sub_field( 'section_3_left_list_item_name' );
                                        $homeSection3ListItemDesc = get_sub_field( 'section_3_left_list_item_desc' ); ?>
                                        <li class="list-item t-12">
                                            <span class="list-item-heading"><?php echo $homeSection3ListItemName; ?></span>
                                            <span class="list-item-desc"><?php echo $homeSection3ListItemDesc; ?></span>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        <?php endwhile;
                    endif; ?>
                </div><!-- col-12 col-lg-6 -->

            </div>
        </div>
    </section><!-- .we-are-trusted-section -->


    <section class="page-content-section home-page-section home-section-3-2 partners-client-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php $section3RightHeading = get_field( 'section_3_right_heading' );
                    $section3RightDesc = get_field( 'section_3_right_desc' );?>
                    <?php if ($section3RightHeading): ?>
                        <h2 class="h4 c-black add-heading-2 t-center"><?php echo $section3RightHeading; ?></h2>
                    <?php endif; ?>
                    <?php if ($section3RightDesc): ?>
                        <div class="desc"><?php echo $section3RightDesc; ?></div>
                    <?php endif; ?>
                    <?php if( have_rows( 'section_3_right_clients_images' ) ): ?>
                        <div class="special-images-list our-clients">
                            <?php while ( have_rows( 'section_3_right_clients_images' ) ) : the_row();
                                $homeSection3Image = get_sub_field( 'section_3_right_clients_image' );
                                $homeSection3Name = get_sub_field( 'section_3_right_clients_name' ); ?>
                                <?php if ( $homeSection3Image ){
                                    echo '<div class="img-wrap"><img src="' . $homeSection3Image . '" alt="' . $homeSection3Name . '"></div>';
                                } ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section><!-- .partners-client-section -->

    <section class="page-content-section home-page-section home-page-section-no-p home-section-4 stages-of-service-section">
        <div class="container-fluid bg-container">
            <div class="row">
                <div class="col-12 col-lg-6 bg-1"></div>
                <div class="col-12 col-lg-6 bg-2 col-secondary"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php $section4LeftHeading = get_field( 'section_4_left_heading' );
                $section4LeftSpecialText = get_field( 'section_4_left_special_text' );
                if( have_rows( 'section_4_left' ) ): ?>
                    <div class="col-12 col-lg-6 col-main">
                        <?php while ( have_rows( 'section_4_left' ) ) : the_row(); ?>

                            <?php if ($section4LeftHeading){
                                echo '<h3 class="section-heading h4 t-center c-white">' . $section4LeftHeading . '</h3>';
                            } if( have_rows( 'section_4_left_list' ) ):
                                $listCount = 1; ?>
                                <ol class="special-numbered-list no-style-list stages-of-service c-white">
                                    <?php while ( have_rows( 'section_4_left_list' ) ) : the_row();
                                        $homeSection4ListItem = get_sub_field( 'section_4_left_list_item' ); ?>
                                        <?php if ( $homeSection4ListItem ){
                                            echo '<li class="list-item"><span class="list-count">' . $listCount . '</span><span class="list-text">' . $homeSection4ListItem . '</span></li>';
                                        } ?>
                                    <?php $listCount++; endwhile; ?>
                                </ol>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        <?php if ( $section4LeftSpecialText ){
                            echo '<div class="section-4-special-text t-light c-white">' . $section4LeftSpecialText . '</div>';
                        } ?>
                    </div>
                <?php endif; ?>

                <?php
                if( have_rows( 'section_4_right' ) ):
                    while ( have_rows( 'section_4_right' ) ) : the_row();
                        $section4RightImage = get_sub_field( 'section_4_right_image' );
                        $section4RightHeading = get_sub_field( 'section_4_right_heading' );
                        $section4RightSubheading = get_sub_field( 'section_4_right_subheading' );
                        $section4CfShortcode = get_sub_field( 'section_4_cf_shortcode' );
                        ?>
                        <div class="col-12 col-lg-6 flex justify-content-center fd-column align-items-center col-main">
                            <div class="form-wrap">
                                <?php if ( $section4RightHeading ){
                                    echo '<h3 class="section-heading h5 c-white t-center">' . $section4RightHeading . '</h3>';
                                } ?>
                                <?php if ( $section4RightSubheading ){
                                    echo '<div class="c-white subheading t-center">' . $section4RightSubheading . '</div>';
                                } ?>
                                <?php if ( $section4CfShortcode ){
                                    echo '<div class="c-white">' . do_shortcode($section4CfShortcode) . '</div>';
                                } ?>
                            </div>

                            <div class="image-wrap">
                                <?php if ( $section4RightImage && $section4LeftHeading ){
                                    $imageUrl = $section4RightImage['url'];
                                    $size = 'full';
                                    $thumb = $section4RightImage['sizes'][ $size ];
                                    $width = $section4RightImage['sizes']['large-width'];
                                    $height = $section4RightImage['sizes']['large-height'];
                                    echo '<img src="' . $imageUrl . '" width="' . $width . '" height="' . $height . '" alt="' . $section4LeftHeading . '">';
                                } ?>
                            </div>

                        </div>
                    <?php endwhile;
                endif; ?>

            </div>
        </div>
    </section><!-- .stages-of-service-section -->

    <?php $section4AfterText = get_field( 'section_4_after_text' );
    if ( $section4AfterText ): ?>
        <div class="page-content-section home-page-section home-page-section-no-p home-section-4-2 stages-of-service-after-text">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php echo $section4AfterText; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <section class="page-content-section home-page-section home-section-5 our-services-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php $section5Heading = get_field( 'section_5_heading' );
                    $section5Subheading = get_field( 'section_5_subheading' );
                    if ( $section5Heading ) {
                        echo '<h3 class="section-heading h4 t-center c-black">' . $section5Heading . '</h3>';
                    }
                    if ( $section5Subheading ) {
                        echo '<div class="section-subheading t-center c-black">' . $section5Subheading . '</div>';
                    }

                    if( have_rows( 'section_5_tabs' ) ):
                        $tabsCount = 1;
                        $tabsCount2 = 1; ?>
                        <div id="our-services-tabs" class="no-style-list tabs services-tabs">
                            <ul class="no-style-list tabs-list">
                                <?php while ( have_rows( 'section_5_tabs' ) ) : the_row();
                                    $tabsIcon = get_sub_field( 'section_5_tabs_icon' );
                                    $tabsIHeading = get_sub_field( 'section_5_tabs_heading' );
                                    echo '<li class="list-item">
                                        <a href="#our-services-tab-' . $tabsCount . '">
                                            <img src="' . $tabsIcon . '" alt="' . $tabsIHeading . '"><span class="text h6">' . $tabsIHeading . '</span>
                                        </a>
                                    </li>';
                                $tabsCount++;
                                endwhile; ?>
                            </ul>
                            <?php while ( have_rows( 'section_5_tabs' ) ) : the_row();
                                $section5TabsMainText = get_sub_field( 'section_5_tabs_main_text' ); ?>
                            <div id="our-services-tab-<?php echo $tabsCount2; ?>" class="tab-content">
                                <?php if ( $section5TabsMainText ){
                                    echo '<div class="tabs-main-text">' . $section5TabsMainText . '</div>';
                                } ?>
                                <?php if( have_rows( 'section_5_tabs_sublist' ) ): ?>
                                    <ul class="tabs-sub-list no-style-list">
                                        <?php while ( have_rows( 'section_5_tabs_sublist' ) ) : the_row();
                                            $tabsSubListName = get_sub_field( 'section_5_tabs_sublist_name' );
                                            $tabsSubListDesc = get_sub_field( 'section_5_tabs_sublist_desc' );
                                            $tabsSubListLink = get_sub_field( 'section_5_tabs_sublist_link' );
                                            echo '<li class="card no-hover list-item">'; ?>
                                                <?php if ( $tabsSubListLink ){
                                                    echo '<a class="list-item-heading bold c-black t-center" href="' . $tabsSubListLink . '">' . $tabsSubListName . '</a>';
                                                }else{
                                                    echo '<span class="list-item-heading bold c-black t-center">' . $tabsSubListName . '</span>';
                                                } ?>
                                                <div class="list-item-text"><?php echo $tabsSubListDesc; ?></div>
                                            <?php echo '</li>'; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php $tabsCount2++;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $desc_full ): ?>
                        <div id="home-page-entry-desc-full" class="home-page-entry-full-desc">
                            <?php echo $desc_full; ?>
                        </div>
                    <?php endif; ?>
                </div><!-- #our-services-tabs -->
            </div>
        </div>
    </section><!-- .our-services-section -->

    <?php if ( $enableReviews == 'yes' ): ?>
        <section class="page-content-section home-page-section home-section-6 reviews-section">
            <div class="container">
                <div class="row">

                    <?php $homeSection6Heading = get_field( 'section_6_heading' );
                    if ( $homeSection6Heading ): ?>
                        <div class="col-12">
                            <h2 class="section-heading h4 t-center c-black"><?php echo $homeSection6Heading; ?></h2>
                        </div>
                    <?php endif; ?>

                    <div class="col-12 col-lg-3 trustpilot-reviews-rating-wrap-col">
                        <?php $basedOnReviews = get_field( 'based_on_reviews' );
                        $reviewsImage = get_field( 'rating_image' );
                        $trustpilotLink = get_field( 'trustpilot_link' );
                        if ( $basedOnReviews && $trustpilotLink ) : ?>
                            <div class="trustpilot-reviews-rating-wrap">
                                <span class="h6 rating-text"><?php echo pll__( 'Excellent' ); ?></span>
                                <img src="<?php echo $reviewsImage; ?>" class="rating" alt="Trustpilot Rating">
                                <p class="based-on">
                                    <?php echo pll__( 'Based on ' ) . '<a href="' . $trustpilotLink . '">' . $basedOnReviews . pll__( ' reviews' ) . '</a>'; ?>
                                </p>
                                <!--<div class="trustpilot-logo">
                                    <img src="<?php echo get_template_directory_uri() . '/images/trustpilot.png'; ?>" alt="Trustpilot Logo">
                                </div>-->
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-lg-9 all-reviews">
                        <?php if( have_rows( 'section_6_reviews' ) ): ?>
                            <div class="row reviews-row">
                                <?php while ( have_rows( 'section_6_reviews' ) ) : the_row();
                                $reviewRatingVal = get_sub_field( 'review_rating' );
                                $reviewRating = str_repeat( '<i class="icon trustpilot-star"></i>', $reviewRatingVal);
                                $reviewHeading = get_sub_field( 'review_heading' );
                                $reviewText = get_sub_field( 'review_text' );
                                $reviewName = get_sub_field( 'review_name' ); ?>
                                <?php if ( $reviewRatingVal && $reviewHeading && $reviewText && $reviewName ): ?>
                                    <div class="col-12 col-md-6 col-lg-4 review-col">
                                        <div class="single-review-wrap">
                                            <div class="single-review-rating">
                                                <?php echo $reviewRating; ?>
                                            </div>
                                            <span class="h6 t-16 single-review-heading"><?php echo $reviewHeading; ?></span>
                                            <p class="single-review-text"><?php echo $reviewText; ?></p>
                                            <div class="single-review-name t-right"><span><?php echo $reviewName; ?></span></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section><!-- .reviews-section -->
    <?php endif; ?>

    <section class="page-content-section home-page-section home-section-7 qa-section">
        <div class="container">
            <div class="row">

                <?php $homeSection7Heading = get_field( 'section_7_heading');
                if ( $homeSection7Heading ): ?>
                    <div class="section-heading col-12">
                        <h2 class="h4 t-center c-black"><?php echo $homeSection7Heading; ?></h2>
                    </div>
                <?php endif; ?>

                <?php if( have_rows( 'section_7_questions' ) ):
                    $accCount = 1; ?>
                    <div class="col-12 col-lg-7 qa-content-col">
                        <div id="qa-accordion" class="accordion qa-accordion">
                            <?php while ( have_rows( 'section_7_questions' ) ) : the_row();
                                $accQuestion = get_sub_field( 'section_7_question' );
                                $accAnswer = get_sub_field( 'section_7_answer' );
                            ?>
                                <h3 id="qa-acc-question-<?php echo $accCount; ?>" class="acc-heading h6"><?php echo $accQuestion; ?></h3>
                                <div id="qa-acc-answer-<?php echo $accCount; ?>" class="acc-content"><?php echo $accAnswer; ?></div>
                            <?php $accCount++; endwhile; ?>
                        </div><!-- #qa-accordion -->
                    </div>

                    <div class="col-12 col-lg-5 qa-image-col">
                        <?php $section7Image = get_field( 'section_7_image');
                        if ( $section7Image ){
                            $section7ImageUrl = $section7Image['url'];
                            $section7Size = 'full';
                            $section7Thumb = $section7Image['sizes'][ $section7Size ];
                            $section7Width = $section7Image['sizes']['large-width'];
                            $section7Height = $section7Image['sizes']['large-height'];
                            echo '<img class="qa-image" src="' . $section7ImageUrl . '" width="' . $section7Width . '" height="' . $section7Height . '" alt="' . $homeSection7Heading . '">';
                        } ?>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </section><!-- .qa-section -->

    <section class="page-content-section home-page-section home-section-8 have-questions-section">
        <div class="container">
            <div class="row">

                <?php $homeSection8Heading = get_field( 'section_8_heading');
                $homeSection8Desc = get_field( 'section_8_desc');
                if ( $homeSection8Heading || $homeSection8Desc ): ?>
                    <div class="col-12">
                        <?php if ( $homeSection8Heading ): ?>
                            <h2 class="section-heading h4 t-center c-white"><?php echo $homeSection8Heading; ?></h2>
                        <?php endif; ?>
                        <div class="section-text c-white t-12">
                            <?php if ( $homeSection8Desc ): ?>
                                <?php echo $homeSection8Desc; ?>
                            <?php endif; ?>
                        </div>
                        <?php echo get_template_part( 'template-parts/content', 'messengers' ); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section><!-- .have-questions-section -->

    <section class="page-content-section home-page-section home-section-9 our-partners-section">
        <div class="container">
            <div class="row">

                <?php $homeSection9Heading = get_field( 'section_9_heading');
                if ( $homeSection9Heading ): ?>
                    <div class="col-12 py-3">
                        <h2 class="section-heading h4 t-center c-black"><?php echo $homeSection9Heading; ?></h2>
                    </div>
                <?php endif; ?>

                <?php if( have_rows( 'section_9_partners_list' ) ): ?>
                    <div class="col-12 py-3">
                        <div class="special-images-list our-partners-grid">
                            <?php while ( have_rows( 'section_9_partners_list' ) ) : the_row();
                                $partnerImage = get_sub_field( 'section_9_partners_list_image' );
                                $partnerImageUrl = $partnerImage['url'];
                                $partnerSize = 'full';
                                $partnerThumb = $partnerImage['sizes'][ $partnerSize ];
                                $partnerWidth = $partnerImage['sizes']['large-width'];
                                $partnerHeight = $partnerImage['sizes']['large-height'];
                                $partnerName = get_sub_field( 'section_9_partners_list_text' );
                                echo '<div class="img-wrap"><img src="' . $partnerImageUrl . '" width="' . $partnerWidth . '" height="' . $partnerHeight . '" alt="' . $partnerName . '"></div>';
                                ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section><!-- .our-partners-section -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'eur_ex' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post( get_the_title() )
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </div>
                </div>
            </div>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
