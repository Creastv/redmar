<?php
$experts = get_field('specjalisci', 'options');
if ($experts) :
    foreach ($experts as $investition) {
        $contact = get_field('kontakt', $investition);
        if ($contact) :
            $logo = $contact['logo'] ?? '';
            $name = $contact['nazwa'] ?? '';
            $address = $contact['adres'] ?? '';
            $mapLink = $contact['link_do_mapy'] ?? '';
            $link = $contact['link'] ?? '';
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            endif;
        endif;
    }
endif;
$nextxperts = get_field('dodatkowi_specjalisci', 'options');


?>
<?php if (!is_singular('projekty') && !is_singular('lokale') && !$expert && $nextxperts) : ?>
    <!-- =================== Expert box Area =================== -->
    <section class="expert-area">
        <div class="container">
            <div class="row">
                <?php foreach ($experts as $investition) {
                    $contact = get_field('kontakt', $investition);
                    if ($contact) :
                        $logo = $contact['logo'] ?? '';
                        $name = $contact['nazwa'] ?? '';
                        $address = $contact['adres'] ?? '';
                        $mapLink = $contact['link_do_mapy'] ?? '';
                        $link = $contact['link'] ?? '';
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        endif;
                    endif;
                    $persons = get_field('specjalisci', $investition);
                ?>
                    <div class="col-xl-6">
                        <div>
                            <div class="biuro-aria">
                                <?php if ($logo) : ?>
                                    <?php echo wp_get_attachment_image($logo); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/sm-Logo-GoldHouse-nowe.jpg"
                                        alt="GoldHouse">
                                <?php endif; ?>
                                <?php if ($name) : ?>
                                    <span><?php echo $name; ?></span>
                                <?php endif; ?>
                            </div><!-- /.biuro-aria -->
                            <?php if ($address) : ?>
                                <div class="expert-location">
                                    <?php if ($mapLink) : ?>
                                        <a href="<?php echo $mapLink; ?>" target="_blank">
                                        <?php endif; ?>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.33203 8.45307C3.33203 4.70522 6.3168 1.66699 9.9987 1.66699C13.6806 1.66699 16.6654 4.70522 16.6654 8.45307C16.6654 12.1715 14.5376 16.5107 11.2178 18.0624C10.4439 18.4241 9.55348 18.4241 8.77959 18.0624C5.4598 16.5107 3.33203 12.1715 3.33203 8.45307Z"
                                                stroke="#e89e01" stroke-width="1.25" />
                                            <circle cx="10" cy="8.33301" r="2.5" stroke="#e89e01" stroke-width="1.25" />
                                        </svg>
                                        <?php echo $address; ?>
                                        <?php if ($mapLink) : ?>
                                        </a>
                                    <?php endif; ?>
                                </div><!-- /.expert-location -->
                            <?php endif; ?>
                            <div class="expert-inner expert-inner-col-tab">
                                <?php foreach ($persons as $person) : ?>
                                    <div class="expert-box">
                                        <div class="expert-info">
                                            <div class="expert-top">
                                                <div class="expert-top-left">
                                                    <?php if ($person['avatar']) : ?>
                                                        <?php echo wp_get_attachment_image($person['avatar'], 'full', false, [
                                                            'class' => 'expert-img',
                                                            'title' => esc_attr($person['imie_i_nazwisko']),
                                                            'alt'   => esc_attr($person['imie_i_nazwisko'])
                                                        ]);  ?>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- /.expert-top-left -->
                                                <div class="expert-top-right">
                                                    <?php if ($person['imie_i_nazwisko']): ?>
                                                        <h6 class=" mb-0"><?php echo $person['imie_i_nazwisko']; ?>
                                                        </h6>
                                                    <?php endif; ?>
                                                    <?php if ($person['pozycja']): ?>
                                                        <p class="text-muted small">
                                                            <?php echo $person['pozycja']; ?>
                                                        </p>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- /.expert-top-right -->
                                            </div>
                                            <!-- /.expert-top -->
                                            <div class="expert-contact">
                                                <?php if ($person['nr_telefonu']): ?>
                                                    <a href="tel:<?php echo $person['nr_telefonu']; ?>">
                                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.36336 4.93031L8.9042 5.89941C9.39228 6.77398 9.19635 7.92126 8.42762 8.68999C8.42762 8.69 8.42762 8.69 8.42762 8.69C8.42752 8.69009 7.49526 9.62254 9.18579 11.3131C10.8758 13.003 11.8082 12.0719 11.8089 12.0712C11.8089 12.0712 11.8089 12.0712 11.8089 12.0712C12.5776 11.3025 13.7249 11.1066 14.5994 11.5947L15.5686 12.1355C16.8892 12.8725 17.0451 14.7245 15.8843 15.8853C15.1868 16.5828 14.3324 17.1256 13.3878 17.1614C11.7977 17.2216 9.09726 16.8192 6.38845 14.1104C3.67964 11.4016 3.27721 8.70118 3.33749 7.11107C3.3733 6.1665 3.91603 5.31203 4.61354 4.61452C5.77433 3.45373 7.62634 3.60969 8.36336 4.93031Z"
                                                                stroke="#e89e01" stroke-width="1.25" stroke-linecap="round"></path>
                                                        </svg>
                                                        <?php echo $person['nr_telefonu']; ?>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($person['adres_email']): ?>
                                                    <a href="mailto: <?php echo $person['adres_email']; ?>">
                                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1.66797 10.5002C1.66797 7.35747 1.66797 5.78612 2.64428 4.80981C3.62059 3.8335 5.19194 3.8335 8.33464 3.8335H11.668C14.8107 3.8335 16.382 3.8335 17.3583 4.80981C18.3346 5.78612 18.3346 7.35747 18.3346 10.5002C18.3346 13.6429 18.3346 15.2142 17.3583 16.1905C16.382 17.1668 14.8107 17.1668 11.668 17.1668H8.33463C5.19194 17.1668 3.62059 17.1668 2.64428 16.1905C1.66797 15.2142 1.66797 13.6429 1.66797 10.5002Z"
                                                                stroke="#e89e01" stroke-width="1.25"></path>
                                                            <path
                                                                d="M5 7.1665L6.79908 8.66574C8.32961 9.94118 9.09488 10.5789 10 10.5789C10.9051 10.5789 11.6704 9.94118 13.2009 8.66574L15 7.1665"
                                                                stroke="#e89e01" stroke-width="1.25" stroke-linecap="round"></path>
                                                        </svg>
                                                        <?php echo $person['adres_email']; ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php foreach ($nextxperts as $exp):
                    $title = $exp['tytul'] ?? '';
                    $logo = $exp['logo'] ?? '';
                    $expert = $exp['specjalista'] ?? '';
                    if ($expert):
                        $avatar = $expert['avatar'] ?? '';
                        $name = $expert['imie_i_nazwisko'] ?? '';
                        $position = $expert['pozycja'] ?? '';
                        $address = $expert['adres'] ?? '';
                        $email = $expert['email'] ?? '';
                        $phone = $expert['nr_telefonu'] ?? '';
                    endif;



                ?>
                    <div class="col-xl-6 extra-specialists">
                        <div class="expert-box mrt-50">
                            <?php if ($title): ?>
                                <h4><?php echo $title; ?></h4>
                            <?php endif; ?>
                            <div class="expert-info  expert-with-logo">
                                <div>
                                    <div class="expert-top">
                                        <div class="expert-top-left">
                                            <?php if ($avatar) : ?>
                                                <?php echo wp_get_attachment_image($avatar, 'full', false, [
                                                    'class' => 'expert-img',
                                                    'title' => esc_attr($name),
                                                    'alt'   => esc_attr($name)
                                                ]);  ?>
                                            <?php endif; ?>
                                        </div><!-- /.expert-top-left -->
                                        <div class="expert-top-right">
                                            <?php if ($name): ?>
                                                <h6 class="mb-0"><?php echo $name; ?></h6>
                                            <?php endif; ?>
                                            <?php if ($position): ?>
                                                <p class="text-muted small"><?php echo $position; ?></p>
                                            <?php endif; ?>
                                        </div><!-- /.expert-top-right -->
                                    </div><!-- /.expert-top -->
                                    <div class="expert-contact">
                                        <?php if ($phone): ?>
                                            <a href="tel:<?php echo $phone; ?>">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M8.36336 4.93031L8.9042 5.89941C9.39228 6.77398 9.19635 7.92126 8.42762 8.68999C8.42762 8.69 8.42762 8.69 8.42762 8.69C8.42752 8.69009 7.49526 9.62254 9.18579 11.3131C10.8758 13.003 11.8082 12.0719 11.8089 12.0712C11.8089 12.0712 11.8089 12.0712 11.8089 12.0712C12.5776 11.3025 13.7249 11.1066 14.5994 11.5947L15.5686 12.1355C16.8892 12.8725 17.0451 14.7245 15.8843 15.8853C15.1868 16.5828 14.3324 17.1256 13.3878 17.1614C11.7977 17.2216 9.09726 16.8192 6.38845 14.1104C3.67964 11.4016 3.27721 8.70118 3.33749 7.11107C3.3733 6.1665 3.91603 5.31203 4.61354 4.61452C5.77433 3.45373 7.62634 3.60969 8.36336 4.93031Z"
                                                        stroke="#e89e01" stroke-width="1.25" stroke-linecap="round"></path>
                                                </svg>
                                                <?php echo $phone; ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($email): ?>
                                            <a href="mailto:<?php echo $email; ?>">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.66797 10.5002C1.66797 7.35747 1.66797 5.78612 2.64428 4.80981C3.62059 3.8335 5.19194 3.8335 8.33464 3.8335H11.668C14.8107 3.8335 16.382 3.8335 17.3583 4.80981C18.3346 5.78612 18.3346 7.35747 18.3346 10.5002C18.3346 13.6429 18.3346 15.2142 17.3583 16.1905C16.382 17.1668 14.8107 17.1668 11.668 17.1668H8.33463C5.19194 17.1668 3.62059 17.1668 2.64428 16.1905C1.66797 15.2142 1.66797 13.6429 1.66797 10.5002Z"
                                                        stroke="#e89e01" stroke-width="1.25"></path>
                                                    <path
                                                        d="M5 7.1665L6.79908 8.66574C8.32961 9.94118 9.09488 10.5789 10 10.5789C10.9051 10.5789 11.6704 9.94118 13.2009 8.66574L15 7.1665"
                                                        stroke="#e89e01" stroke-width="1.25" stroke-linecap="round"></path>
                                                </svg>
                                                <?php echo $email; ?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($address): ?>
                                            <div class="expert-location">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.33203 8.45307C3.33203 4.70522 6.3168 1.66699 9.9987 1.66699C13.6806 1.66699 16.6654 4.70522 16.6654 8.45307C16.6654 12.1715 14.5376 16.5107 11.2178 18.0624C10.4439 18.4241 9.55348 18.4241 8.77959 18.0624C5.4598 16.5107 3.33203 12.1715 3.33203 8.45307Z"
                                                        stroke="#e89e01" stroke-width="1.25"></path>
                                                    <circle cx="10" cy="8.33301" r="2.5" stroke="#e89e01" stroke-width="1.25">
                                                    </circle>
                                                </svg>
                                                <?php echo $address; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ($avatar) : ?>
                                    <?php echo wp_get_attachment_image($logo, 'full', false, [
                                        'alt'   => "logo"
                                    ]);  ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- /.row -->
            </div><!-- /.container -->
    </section><!-- /.expert-area -->

<?php endif; ?>