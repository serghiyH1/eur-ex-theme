<?php
/**
 * Template part for displaying calculatin form content in home-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */
$defaultCountryFrom = get_field( 'default_country_from' );
$defaultCountryTo = get_field( 'default_country_to' );
$downloadingDefaultType = get_field( 'downloading_default_type' );
$transportingDefaultType = get_field( 'transporting_default_type' );
?>

<div class="calculation-wrap card no-hover">
    <div id="calculation-form-main">

        <div class="row">

            <div class="col-12 heading-col">
                <span class="h6 calculation-heading c-black"><?php echo pll__('Напрямок доставки' ); ?></span>
                <div class="calc-toggler"></div>
            </div>

            <div class="col-12 col-sm-6">
                <select id="country-from" class="calculation-select" placeholder="<?php echo pll__('Доставка з' ); ?>" data-default-country="<?php echo $defaultCountryFrom->ID; ?>">
                    <option class="location-from" value disabled selected><?php echo pll__('Доставка з' ); ?></option>
                    <?php
                    $argsLocation = array(
                        'post_type' => 'location',
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order title',
                        'order' => 'ASC'
                    );
                    $the_query = new WP_Query( $argsLocation );

                    // The Loop.
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            $capital = get_field( 'capital' );
                            $destination = get_field( 'destination' );
                            $transportingOnOf = get_field( 'transport_on_of' );
                            echo '<option class="location-from" data-id="' . get_the_ID() . '" data-capital="' . $capital . '" data-destinations="';
                            foreach ( $destination as $dest ){
                                $destCountryArr = $dest['country_name'];
                                $destId = $destCountryArr->ID;
                                $destCountryName = get_the_title( $destCountryArr );
                                $destCountryCapital = get_field( 'capital', $destCountryArr );
                                $packaging = $dest['packaging'];
                                //$transportingOnOf = $dest['transport_on_of'];
                                $transporting = $dest['transporting'];
                                $box = $dest['packaging']['korobka'];
                                $palet = $dest['packaging']['paleta'];
                                $ftl = $dest['packaging']['ftl'];
                                // Train
                                $train = $dest['transporting']['zhd'];
                                $trainCont20 = $dest['transporting']['zhd']['container_20'];
                                $trainCont40 = $dest['transporting']['zhd']['container_40'];
                                $train1m3 = $dest['transporting']['zhd']['1m3'];
                                // Avia
                                $avia = $dest['transporting']['avia'];
                                $aviaPerKg = $dest['transporting']['avia']['per_kg'];
                                // Sea
                                $sea = $dest['transporting']['more'];
                                $seaCont20 = $dest['transporting']['more']['container_20'];
                                $seaCont40 = $dest['transporting']['more']['container_40'];
                                $sea1m3 = $dest['transporting']['more']['1m3'];

                                $destinationsStr = $destCountryName . ':' .  'capital-' . $destCountryCapital .
                                    ',, box-' . $box . ',, palet-' . $palet . ',, ftl-' . $ftl . ',, train20-' . $trainCont20 .
                                    ',, train40-' . $trainCont40 . ',, train1m3-' . $train1m3 . ',, avia-' . $aviaPerKg .
                                    ',, sea20-' . $seaCont20 . ',, sea40-' . $seaCont40 . ',, sea1m3-' . $sea1m3 . ',, id-' . $destId . ';;';
                                echo $destinationsStr;
                            }
                            echo '" data-transporting="' . $transportingOnOf . '" value="' . esc_html( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</option>';
                        }
                    }
                    // Restore original Post Data.
                    wp_reset_postdata(); ?>
                </select>
            </div>

            <div class="col-12 col-sm-6">
                <select id="country-to" class="calculation-select" placeholder="<?php echo pll__('Доставка в' ); ?>" data-default-country="<?php echo $defaultCountryTo->ID; ?>">
                    <option class="location-to" value disabled selected><?php echo pll__('Доставка в' ); ?></option>
                </select>
            </div>

            <div class="col-12 calc-opening-col">
                <div class="downloading-ways-wrap">
                    <span class="h6 calculation-heading"><?php echo pll__('Транспортування' ); ?></span>
                    <ul class="downloading-checkbox downloading-ways-checkbox no-style-list">
                        <li class="list-item downloading-ways sea <?php if( $transportingDefaultType == 'sea' || $transportingDefaultType == '' || !isset($transportingDefaultType) ): ?>active<?php endif; ?>" data-price-sea20="" data-price-sea40="" data-price-sea1m3="" data-way="<?php echo pll__( 'Море' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/marine.svg" alt="" class="icon">
                            <span class="text"><?php echo pll__('Море' ); ?></span>
                        </li>
                        <li class="list-item downloading-ways avia <?php if( $transportingDefaultType == 'avia'): ?>active<?php endif; ?>" data-price-avia="" data-way="<?php echo pll__('Авіа' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/air_trns.svg" alt="" class="icon">
                            <span class="text"><?php echo pll__('Авіа' ); ?></span>
                        </li>
                        <li class="list-item downloading-ways train <?php if( $transportingDefaultType == 'train'): ?>active<?php endif; ?>" data-price-train20="" data-price-train40="" data-price-train1m3="" data-way="<?php echo pll__( 'ЖД' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/train.svg" alt="" class="icon">
                            <span class="text"><?php echo pll__('ЖД' ); ?></span>
                        </li>
                    </ul>
                </div>

                <div class="downloading-types-wrap">
                    <span class="h6 calculation-heading"><?php echo pll__('Завантаження' ); ?></span>
                    <ul class="downloading-checkbox downloading-types-checkbox no-style-list">
                        <li class="list-item downloading-types type-palete <?php if( $downloadingDefaultType == 'type-palete' || $downloadingDefaultType == '' || !isset($downloadingDefaultType) ): ?>active<?php endif; ?>" data-price="" data-type="<?php echo pll__('Палети' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/palet.svg" alt="<?php echo pll__('Палети' ); ?>" class="icon">
                            <span class="text"><?php echo pll__('Палети' ); ?></span>
                        </li>
                        <li class="list-item downloading-types type-box <?php if( $downloadingDefaultType == 'type-box'): ?>active<?php endif; ?>" data-price="" data-type="<?php echo pll__('Коробки' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/box.svg" alt="<?php echo pll__('Коробки' ); ?>" class="icon">
                            <span class="text"><?php echo pll__('Коробки' ); ?></span>
                        </li>
                        <li class="list-item downloading-types type-ftl <?php if( $downloadingDefaultType == 'type-ftl'): ?>active<?php endif; ?>" data-price="" data-type="<?php echo pll__('FTL' ); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/ftl.svg" alt="<?php echo pll__('FTL' ); ?>" class="icon">
                            <span class="text"><?php echo pll__('FTL' ); ?></span>
                        </li>
                    </ul>
                </div>

                <div class="delivery-cost-wrap">
                    <div class="downloading-types-prices">
                        <span class="delivery-cost-text"><?php echo pll__('Вартість доставки: ' ); ?></span>
                        <span class="delivery-cost"></span>
                    </div>
                    <div class="transporting-types-prices">
                        <div class="sea <?php if( $transportingDefaultType == 'sea' || $transportingDefaultType == '' || !isset($transportingDefaultType) ): ?>active<?php endif; ?>">
                            <span class="delivery-info-price cont-20">
                                <?php echo pll__('Контейнер 20\' ' ); ?>
                                <span class="delivery-cost"></span>
                            </span>
                            <span class="delivery-info-price cont-40">
                                <?php echo pll__('Контейнер 40\' ' ); ?>
                                <span class="delivery-cost"></span>
                            </span>
                            <span class="delivery-info-price lcm-1m3">
                                <?php echo pll__('LCL 1м3 ' ); ?>
                                <span class="delivery-cost"></span>
                            </span>
                        </div>
                        <div class="avia <?php if( $transportingDefaultType == 'avia'): ?>active<?php endif; ?>">
                            <span class="per-kg">
                                <?php echo pll__('за кг. ' ); ?>
                                <span class="delivery-cost"></span>
                            </span>
                        </div>
                        <div class="train <?php if( $transportingDefaultType == 'train'): ?>active<?php endif; ?>">
                            <span class="delivery-info-price cont-20">
                                <?php echo pll__('Контейнер 20\' ' ); ?>
                                <span class="delivery-cost"></span>
                            </span>
                            <span class="delivery-info-price cont-40">
                                <?php echo pll__('Контейнер 40\' ' ); ?>
                                <span class="delivery-cost"></span>
                            </span>
                            <span class="delivery-info-price lcm-1m3">
                                <?php echo pll__('LCL 1м3 ' ); ?>
                                <span class="delivery-cost"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="delivery-note-wrap">
                    <span class="delivery-cost-info">* <span class="country-from-text">--</span> - <span class="country-to-text">--</span>,
                        <span class="delivery-add-text palete-text active"><?php echo pll__( '1 палета до 300 кг.' ); ?></span>
                        <span class="delivery-add-text box-text"><?php echo pll__( '1 коробка до 32 кг.' ); ?></span>
                        <span class="delivery-add-text ftl-text"><?php echo pll__( 'до 22 тонн.' ); ?></span>
                    </span>
                </div>

                <div class="delivery-contacts row align-items-center">
                    <div class="info-phone-wrap col-12 col-lg-9">
                        <p class="info-text">
                            <i class="icon info-icon"></i>
                            <span class="text">
                                <span><?php echo pll__('Щоб отримати точну вартість доставки зв’яжіться з нами за допомогою форми або месенджерів, або по телефону'); ?></span><br>
                                <a href="tel:<?php echo get_theme_mod('phone_number'); ?>" class="phone"><i class="icon phone-icon"></i><?php echo get_theme_mod('phone_number'); ?></a>
                            </span>
                        </p>
                    </div>
                    <div class="messengers col-6 col-lg-3">
                        <?php echo get_template_part( 'template-parts/content', 'messengers' ); ?>
                    </div>
                </div>

                <ul class="checkbox checkbox-business-type no-style-list">
                    <li class="list-item active"><?php echo pll__('Приватна особа' ); ?></li>
                    <li class="list-item"><?php echo pll__('Компанія' ); ?></li>
                </ul>

                <?php echo do_shortcode('[contact-form-7 id="221" title="Delivery calculation]'); ?>

            </div><!-- .col-12 -->
        </div><!-- .row -->

    </div>
</div>