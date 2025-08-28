<?php
$desc = get_field('krotki_opis', 'options');
$displaySome = get_field('social_media_footer', 'options');
$link = get_field('link_pod_krotkim_opisem', 'options');
if ($link):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif;
?>
<!-- =================== Fotter Area =================== -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer">
                    <div class="footer-left">
                        <div class="footer-top">
                            <div class="footer-logo">
                                <a href="#"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-footer2.png"
                                        alt="logo"></a>
                            </div><!-- /.footer-logo -->
                            <?php if ($displaySome) : ?>
                                <div class="social">
                                    <?php get_template_part('templates-parts/parts/social-media'); ?>
                                </div><!-- /.social -->
                            <?php endif; ?>
                        </div><!-- /.footer-top -->
                        <div class="footer-text">
                            <?php if (!empty($desc)) : ?>
                                <p><?php echo $desc; ?></p>
                            <?php endif; ?>
                        </div><!-- /.footer-text -->
                        <?php if ($link) : ?>
                            <a class="bttn" href="<?php echo esc_url($link_url); ?>"
                                target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                    </div><!-- /.footer-left -->

                </div><!-- /.footer -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="footer-right">
                    <div>
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                    <div>
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                    <div>
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                </div><!-- /.footer-right -->
            </div><!-- /.col-lg-6 -->
            <div class="row">
                <div class="col-12">
                    <div class="footer-bttm">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer', // lub 'primary' jeśli to menu główne
                            'container'      => false,       // usuwa <div>
                        ));
                        ?>
                        <p>&copy; 2025 GOLDHOUSE - Wszelkie prawa zastrzeżone. | <a href="https://roial.pl/"
                                target="_blank"> <svg width="35" height="19" viewBox="0 0 35 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2002_311)">
                                        <path
                                            d="M9.65766 19H6.5223L8.09153 16.2853L9.65766 19ZM11.2269 16.2853L9.65766 19H12.793L11.2269 16.2853ZM14.3638 16.2853L12.7977 19H15.9299L14.3638 16.2853ZM17.4992 16.2853L15.933 19H19.0684L17.4992 16.2853ZM20.6361 16.2853L19.0684 19H22.2038L20.6361 16.2853ZM23.773 16.2853L22.2038 19H25.3391L23.773 16.2853ZM26.9084 16.2853L25.3422 19H28.4761L26.9084 16.2853ZM6.5223 13.5721L4.95306 16.2853H8.09153L6.5223 13.5721ZM9.65766 13.5721L8.09153 16.2853H11.2269L9.65766 13.5721ZM12.7946 13.5721L11.2269 16.2853H14.3623L12.7946 13.5721ZM15.9315 13.5721L14.3623 16.2853H17.4992L15.9315 13.5721ZM19.0669 13.5721L17.4992 16.2853H20.6345L19.0669 13.5721ZM22.2038 13.5721L20.6361 16.2853H23.7684L22.2038 13.5721ZM25.3391 13.5721L23.7684 16.2853H26.9037L25.3391 13.5721ZM28.4761 13.5721L26.9099 16.2853H30.0437L28.4761 13.5721ZM4.95461 10.8574L3.38848 13.5721H6.5223L4.95461 10.8574ZM8.08998 10.8574L6.5223 13.5721H9.65766L8.08998 10.8574ZM11.2269 10.8574L9.65766 13.5721H12.7946L11.2269 10.8574ZM14.3638 10.8574L12.7977 13.5721H15.9315L14.3638 10.8574ZM17.4992 10.8574L15.9315 13.5721H19.0669L17.4992 10.8574ZM20.6361 10.8574L19.07 13.5721H22.2038L20.6361 10.8574ZM23.773 10.8574L22.2038 13.5721H25.3391L23.773 10.8574ZM26.9084 10.8574L25.3422 13.5721H28.4761L26.9084 10.8574ZM30.0453 10.8574L28.4792 13.5721H31.613L30.0453 10.8574ZM3.38537 8.14264L1.81925 10.8574H4.95461L3.38537 8.14264ZM9.65766 8.14264L8.08998 10.8574H11.2269L9.65766 8.14264ZM15.9315 8.14264L14.3623 10.8574H17.4992L15.9315 8.14264ZM19.0669 8.14264L17.4992 10.8574H20.6345L19.0669 8.14264ZM25.3391 8.14264L23.7684 10.8574H26.9037L25.3391 8.14264ZM31.613 8.14264L30.0453 10.8574H33.1807L31.613 8.14264ZM1.81148 5.42791L0.245361 8.14264H3.37917L1.81148 5.42791ZM8.08377 5.42791L6.51764 8.14264H9.653L8.08377 5.42791ZM14.3576 5.42791L12.7915 8.14264H15.9315L14.3576 5.42791ZM17.493 5.42791L15.9268 8.14264H19.0622L17.493 5.42791ZM20.6299 5.42791L19.0638 8.14264H22.1976L20.6299 5.42791ZM17.4992 2.71473L15.933 5.42946H19.0684L17.4992 2.71473ZM17.4992 0L15.9315 2.71473H19.0669L17.4992 0ZM26.9084 5.43256L25.3422 8.14729H28.4761L26.9084 5.43256ZM33.1822 5.43256L31.613 8.14729H34.7483L33.1822 5.43256Z"
                                            fill="#EFD6AE"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2002_311">
                                            <rect width="35" height="19" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg> roial.pl </a></p>
                    </div><!-- /.footer-bttm -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer><!-- /.footer-area -->