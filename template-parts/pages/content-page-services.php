<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

$servicesListTopToogle = get_field( 'services_list_images_toggle' );
$textImagesBlocksToggle = get_field( 'text_images_blocks_toggle' );
$servicesToogle = get_field( 'services_list_toggle' );
$stageOfServicesToogle = get_field( 'stage_of_services_toggle' );
$whyUsToogle = get_field( 'why_us_toggle' );
$caseToogle = get_field( 'case_toggle' );
$faqToogle = get_field( 'faq_toggle' );
$messangersToogle = get_field( 'messangers_toggle' );
$reviewsToogle = get_field( 'reviews_toggle' );
$beforeArticlesToogle = get_field( 'before_articles_text_toggle' );
$articlesToogle = get_field( 'articles_toggle' );
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
if ( $featured_img_url ){
    $colorText = 'c-white';
}else{
    $colorText = 'c-black';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php if ( $featured_img_url ): ?>style="background-image: url(<?php echo $featured_img_url; ?>)"<?php endif; ?>>

    <header class="entry-header page-entry-header">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-lg-6">
                    <h1 class="h4 entry-title <?php echo $colorText; ?>"><?php the_title(); ?></h1>
                    <div class="entry-content <?php echo $colorText; ?>">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php if( $servicesListTopToogle ): ?>
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
                <?php endif; ?>
            </div>

            <div class="row justify-content-md-center calculation-row <?php if ( $textImagesBlocksToggle == 'yes' || $servicesToogle == 'yes' ): ?>negative-margin-bottom-cont--form-calc<?php endif; ?>">
                <div class="col-12 col-lg-8 py-3">
                    <?php get_template_part( 'template-parts/content', 'calculation-form' ); ?>
                </div>
            </div>

        </div>
    </header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->

<?php if( $textImagesBlocksToggle == 'yes' ): ?>
    <section class="page-content-section text-images-blocks">
        <?php $textImagesBlocks = get_field( 'text_images_blocks' );
        if( $textImagesBlocks ): ?>
            <div class="container">
                <?php if( have_rows( 'text_images_blocks' ) ):
                    while( have_rows( 'text_images_blocks' ) ): the_row();

                        $link = get_sub_field( 'link' );
                        //$link_url = $link['url'];
                        //$link_title = $link['title'];
                        //$link_target = $link['target'] ? $link['target'] : '_self';
                        $heading = get_sub_field( 'heading' );
                        $image = get_sub_field( 'image' );
                        $size = "custom_500x333";
                        $thumbImage = wp_get_attachment_image_src( $image['id'], $size );
                        $width = $image['sizes']['custom_500x333-width'];
                        $height = $image['sizes']['custom_500x333-height'];
                        $text = get_sub_field( 'text' ); ?>
                        <div class="row text-image-row">

                            <div class="col-12">
                                <div class="image-col-float">
                                    <?php if( $link ){
                                        echo '<a class="image-link card" href="' . $link . '">';
                                    } ?>
                                    <img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo $thumbImage[0]; ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    <?php if( $link ){
                                        echo '</a>';
                                    } ?>
                                </div>
                                <?php if( $link && $heading ){
                                    echo '<a class="link" href="' . $link . '">';
                                }
                                if ( $heading ){
                                    echo '<span class="heading h4">' . $heading . '</span>';
                                }
                                if( $link && $heading ){
                                    echo '</a>';
                                }
                                if ( $text ){
                                    echo $text;
                                } ?>
                            </div>

                            <!--<div class="col-12 col-md-6 col-lg-4 image-col">
                            <?php if( $link ){
                                echo '<a class="image-link" href="' . $link . '">';
                            } ?>
                                <div class="card">
                                    <img width="<?php echo $width; ?>" height="<?php echo $height; ?>" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                </div>
                            <?php if( $link ){
                                echo '</a>';
                            } ?>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 text-col">
                            <?php if( $link && $heading ){
                                echo '<a class="link" href="' . $link . '">';
                            }
                            if ( $heading ){
                                echo '<span class="heading h4">' . $heading . '</span>';
                            }
                            if( $link && $heading ){
                                echo '</a>';
                            }
                            if ( $text ){
                                echo '<div class="desc">' . $text . '</div>';
                            } ?>
                        </div>-->
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php if( $servicesToogle == 'yes' ): ?>
    <section class="page-content-section services-columns">
        <?php $columnsQty = get_field( 'columns_qty' );
        $servicesHeading = get_field('services_heading'); ?>
        <?php if( have_rows( 'services_columns' ) ): ?>
            <div class="container">
                <?php if ($servicesHeading): ?>
                    <div class="row">
                        <div class="col-12 t-center mb-5">
                            <h2 class="h4"><?php echo $servicesHeading; ?></h2>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <?php while( have_rows( 'services_columns' ) ): the_row();
                        $servColumnLink = get_sub_field( 'column_link' );
                        $servColumnHeading = get_sub_field( 'column_heading' );
                        $servColumnText = get_sub_field( 'column_text' );?>

                        <div class="col-12 col-md-6 col-lg-<?php echo $columnsQty; ?> flex fd-column content-col">
                            <?php if ($servicesHeading): ?>
                            <h3 class="h6 c-black">
                                <?php else: ?>
                                <h2 class="h6 c-black">
                                    <?php endif; ?>
                                    <?php if( $servColumnLink ){
                                        echo '<a class="column-link" href="' . $servColumnLink . '">' . $servColumnHeading . '</a>';
                                    } else {
                                        echo $servColumnHeading;
                                    } ?>
                                    <?php if ($servicesHeading): ?>
                            </h3>
                        <?php else: ?>
                            </h2>
                        <?php endif; ?>
                            <div class="column-text">
                                <?php echo $servColumnText; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

                    <?php if( have_rows( 'text_and_button' ) ): ?>
                        <div class="col-12">
                            <?php while( have_rows( 'text_and_button' ) ): the_row();
                                $addDesc = get_sub_field( 'add_desc' );
                                $link = get_sub_field( 'button' );
                                $link_text = get_sub_field( 'button_text' );
                                //$link_url = $link['url'];
                                //$link_title = $link['title'];
                                //$link_target = $link['target'] ? $link['target'] : '_self';
                                if ( $addDesc ){
                                    echo '<div class="add-desc mt-4">' . $addDesc . '</div>';
                                }
                                if ( $link ){ ?>
                                    <a class="button inline" data-fancybox href="<?php echo $link; ?>"><?php echo $link_text; ?></a>
                                <?php } ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php if( $stageOfServicesToogle == 'yes' ): ?>
    <section class="page-content-section stages-of-service-section">
        <div class="container-fluid bg-container">
            <div class="row">
                <div class="col-12 col-lg-6 bg-1"></div>
                <div class="col-12 col-lg-6 bg-2 col-secondary"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php $section4LeftHeading = get_field( 'section_4_heading' );
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
<?php endif; ?>

<?php if( $whyUsToogle == 'yes' ): ?>
    <section class="page-content-section why-choose-us-section">
        <div class="container">
            <div class="row justify-content-md-center">

                <?php $section2Heading = get_field( 'section_2_heading');
                if ( $section2Heading ): ?>
                    <div class="col-12 py-3">
                        <h2 class="section-heading h4 t-center c-black"><?php echo $section2Heading; ?></h2>
                    </div>
                <?php endif; ?>

                <?php
                if( have_rows( 'section_2_list' ) ):
                    while ( have_rows( 'section_2_list' ) ) : the_row(); ?>
                        <div class="col-12 col-lg-6 py-2">
                            <?php if( have_rows( 'section_2_list_item' ) ): ?>
                                <ul class="left-icon-list no-style-list">
                                    <?php while ( have_rows( 'section_2_list_item' ) ) : the_row();
                                        $section2ListItemIcon = get_sub_field( 'section_2_list_item_icon' );
                                        $section2ListItemName = get_sub_field( 'section_2_list_item_name' );
                                        $section2ListItemDesc = get_sub_field( 'section_2_list_item_description' ); ?>
                                        <li class="list-item">
                                            <?php if ( $section2ListItemIcon ){
                                                echo '<span class="list-img-wrap"><img src="' . $section2ListItemIcon . '" alt="' . $section2ListItemName . '"></span>';
                                            } ?>
                                            <span class="list-text-wrap">
                                                <span class="list-item-heading"><?php echo $section2ListItemName; ?></span>
                                                <span class="list-item-desc"><?php echo $section2ListItemDesc; ?></span>
                                            </span>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div><!-- col-12 col-lg-6 -->
                    <?php endwhile;
                endif; ?>

                <?php
                if( have_rows( 'section_2_right' ) ): ?>
                    <div class="col-12 col-lg-6 py-3 add-content-col">
                    <?php while ( have_rows( 'section_2_right' ) ) : the_row();
                        $heading = get_sub_field( 'section_2_right_heading' );
                        $desc = get_sub_field( 'section_2_right_desc' );
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
<?php endif; ?>

<?php if( $caseToogle == 'yes' ): ?>
    <section class="page-content-section bg-super-light-gray pt-0 cases-section">
        <?php if( $caseToogle ): ?>
            <div class="container">
                <div class="row justify-content-center">

                    <?php
                    $cases = get_field( 'cases' );
                    if( $cases ): ?>
                        <div class="col-12 py-3">
                            <h2 class="section-heading h4 t-center c-black"><?php echo pll__( 'Кейси' ); ?></h2>
                        </div>
                        <?php foreach( $cases as $case ):
                            $permalink = get_permalink( $case->ID );
                            $title = get_the_title( $case->ID );
                            $image = get_the_post_thumbnail( $case->ID, 'medium' );
                            $excerpt = get_the_excerpt( $case->ID );
                            $shortDesc = get_the_content( $case->ID );
                            if ( $excerpt ){
                                if ( strlen( $excerpt ) >= 170 ) {
                                    $desc = mb_substr( $excerpt, 0, 170 ). ' ... ';
                                }
                                else {
                                    $desc = $excerpt;
                                }
                            }else{
                                if ( strlen( $shortDesc ) >= 170 ) {
                                    $desc = mb_substr( $shortDesc, 0, 170 ). ' ... ';
                                }
                                else {
                                    $desc = $shortDesc;
                                }
                            }
                            ?>
                            <div class="col-12 col-md-6 col-lg-4 content-col">
                                <div class="card post-preview-wrap flex fd-column align-items-center justify-content-sb">
                                    <div class="card-image-wrap post-preview-image-wrap case-image-wrap">
                                        <a class="post-preview-image-link" href="<?php echo esc_url( $permalink ); ?>"><?php echo $image; ?></a>
                                    </div>
                                </div>
                                <div class="card-content mt-4">
                                    <h3 class="h5 card-title ellipsis one-line"><a class="post-preview-link" href="<?php echo esc_url( $permalink ); ?>"><?php echo $title; ?></a></h3>
                                    <?php echo wp_strip_all_tags( $desc ); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php if( $faqToogle == 'yes' ): ?>
    <section class="page-content-section qa-section">
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
<?php endif; ?>

<?php if( $messangersToogle == 'yes' ): ?>
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
<?php endif; ?>

<?php if( $reviewsToogle == 'yes' ): ?>
    <section class="page-content-section reviews-section">
        <div class="container">
            <div class="row">

                <?php $reviewsHeading = get_field( 'reviews_heading' );
                if ( $reviewsHeading ): ?>
                    <div class="col-12">
                        <h2 class="section-heading h4 t-center c-black"><?php echo $reviewsHeading; ?></h2>
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
                    <?php if( have_rows( 'reviews' ) ): ?>
                        <div class="row reviews-row">
                            <?php while ( have_rows( 'reviews' ) ) : the_row();
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

<?php if( $beforeArticlesToogle == 'yes' ): ?>
    <section class="page-content-section">
        <?php if( have_rows( 'before_articles_text' ) ): ?>
            <div class="container">
                <?php while( have_rows( 'before_articles_text' ) ): the_row();
                    // Get sub field values.
                    $heading = get_sub_field( 'heading' );
                    $mainText = get_sub_field( 'main_text' );
                    $columnsQty = get_sub_field( 'columns_qty' );
                    $contentColumns = get_sub_field( 'content_columns' );?>
                    <div class="row">
                        <div class="col-12 mb-4">
                            <?php if( $heading ){
                                echo '<h3 class="h3 t-center c-black">' . $heading . '</h3>';
                            }if( $mainText ){
                                echo '<div class="desc">' . $mainText . '</div>';
                            }?>
                        </div>
                    </div>

                    <?php if( have_rows( 'content_columns' ) ): ?>
                        <div class="row">
                            <?php while( have_rows( 'content_columns' ) ): the_row();
                                $contentColumnLink = get_sub_field( 'link');
                                $contentColumnHeading = get_sub_field( 'heading');
                                $contentColumnText = get_sub_field( 'text');?>
                                <div class="col-12 col-md-6 col-lg-<?php echo $columnsQty; ?> flex fd-column content-col">
                                    <h2 class="h6 c-black">
                                        <?php if( $contentColumnLink ){
                                            echo '<a class="column-link" href="' . $contentColumnLink . '">' . $contentColumnHeading . '</a>';
                                        } else {
                                            echo $contentColumnHeading;
                                        } ?>
                                    </h2>
                                    <div class="column-text">
                                        <?php echo $contentColumnText; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php if( $articlesToogle == 'yes' ): ?>
    <section class="page-content-section bg-super-light-gray">
        <div class="container">
            <div class="row justify-content-center">
                <?php
                $articles = get_field( 'article_choose' );
                $articlesHeading = get_field( 'articles_heading' );
                if( $articles ): ?>
                    <div class="col-12 py-3">
                        <span class="section-heading h4 t-center c-black"><?php echo $articlesHeading; ?></span>
                    </div>
                    <?php foreach( $articles as $article ):
                        $permalink = get_permalink( $article->ID );
                        $title = get_the_title( $article->ID );
                        $image = get_the_post_thumbnail( $article->ID, 'medium' );
                        $excerpt = get_the_excerpt( $article->ID );
                        $shortDesc = get_the_content( $article->ID );
                        $postDate = get_the_date('d F Y');
                        if ( $excerpt ){
                            if ( strlen( $excerpt ) >= 170 ) {
                                $desc = mb_substr( $excerpt, 0, 170 ). ' ... ';
                            }
                            else {
                                $desc = $excerpt;
                            }
                        }else{
                            if ( strlen( $shortDesc ) >= 170 ) {
                                $desc = mb_substr( $shortDesc, 0, 170 ). ' ... ';
                            }
                            else {
                                $desc = $shortDesc;
                            }
                        }
                        ?>
                        <div class="col-12 col-md-6 col-lg-4 content-col">
                            <div class="card h-100 post-preview-wrap flex fd-column align-items-center">
                                <div class="card-image-wrap post-preview-image-wrap case-image-wrap">
                                    <a class="post-preview-image-link" href="<?php echo esc_url( $permalink ); ?>"><?php echo $image; ?></a>
                                </div>
                                <div class="card-content-wrap">
                                    <div class="card-content">
                                        <div class="card-date post-date t-12"><?php echo $postDate; ?></div>
                                        <span class="h5 card-title"><a class="post-preview-link" href="<?php echo esc_url( $permalink ); ?>"><?php echo $title; ?></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ( get_edit_post_link() ) : ?>
    <footer class="entry-footer py-5">
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
