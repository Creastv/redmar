<?php
$project_id = get_project_id_by_investment();
$pin = get_template_directory_uri() . '/assets/img/map/map-marker-1.svg';
if (is_singular('projekty')):

    $checkMap = get_field('map');

    if (!$checkMap) :
        $mapPin = $checkMap;
    else:
        $map = get_field('map', 'options');
    endif;

    if ($mapPin):
        $pin = "" . $mapPin . "";
    endif;

    $chceckContent = get_field('content_contact');

    if (!$chceckContent['tytul'] && !$chceckContent['opis']) :
        // 
        $content = get_field('content_contact', 'options');
    else :
        $content = get_field('content_contact');
    endif;
    if ($content) :
        $label = $content['etykieta'] ?? '';
        $title = $content['tytul'] ?? '';
        $desc = $content['opis'] ?? '';

    endif;

    $checkContact = get_field('kontakt');

    if (!$checkContact['nazwa'] && !$checkContact['adres']) :
        $contact  = get_field('kontakt', 'options');
    else :
        $contact = $checkContact;
    endif;

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

    $persons = get_field('specjalisci');

elseif (is_singular('lokale') && $project_id):

    $map = get_field('map', $project_id);
    $mapPin = get_field('pin', $project_id);
    if ($mapPin):
        $pin = "" . $mapPin . "";
    endif;
    $content = get_field('content_contact', $project_id) ?? '';
    if ($content) :
        $label = $content['etykieta'] ?? '';
        $title = $content['tytul'] ?? '';
        $desc = $content['opis'] ?? '';

    endif;

    $contact = get_field('kontakt', $project_id);
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

    $persons = get_field('specjalisci', $project_id);

else :
    $map = get_field('map', 'options');
    $content = get_field('content_contact', 'options');
    if ($content) :
        $label = $content['etykieta'] ?? '';
        $title = $content['tytul'] ?? '';
        $desc = $content['opis'] ?? '';

    endif;

    $contact = get_field('kontakt', 'options');
    if ($contact) :
        $logo = $contact['logo'] ?? '';
        $name = $contact['nazwa'] ?? '';
        $address = $contact['adres'] ?? '';
        $mapLink = $contact['link_do_mapy'] ?? '';
        $email = $contact['email'] ?? '';
        $phone = $contact['telefon'] ?? '';
        $phone_2 = $contact['telefon_two'] ?? '';
        if ($phone):
            $number = str_replace('+', '00', $phone);
            $number = str_replace(' ', '', $phone);
        endif;
        if ($phone_2):
            $number_2 = str_replace('+', '00', $phone_2);
            $number_2 = str_replace(' ', '', $phone_2);
        endif;
        $link = $contact['link'] ?? '';
        if ($link):
            $link_url = $link['url'] ?? '';
            $link_title = $link['title'] ?? '';
            $link_target = $link['target'] ? $link['target'] : '_self';
        endif;
    endif;
endif;

?>

<!-- =================== Contact Area =================== -->
<section id="kontakt" class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

                <div class="contact-left">
                    <?php if ($content) : ?>
                        <div class="section-title contact-title">
                            <?php if ($label) : ?>
                                <span><?php echo $label; ?></span>
                            <?php endif; ?>
                            <?php if ($title) : ?>
                                <h3><?php echo $title; ?></h3>
                            <?php endif; ?>
                            <?php if ($desc) : ?>
                                <p><?php echo $desc; ?></p>
                            <?php endif; ?>
                        </div><!-- /.title -->
                    <?php endif; ?>
                    <?php if ($contact) : ?>
                        <div>
                            <div class="biuro-aria">
                                <?php if ($logo) : ?>
                                    <?php echo wp_get_attachment_image($logo); ?>

                                <?php endif; ?>
                                <?php if ($name) : ?>
                                    <span><?php echo $name; ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if ($address) : ?>
                                <div class="expert-location">
                                    <?php if ($mapLink) : ?>
                                        <a href="<?php echo $mapLink; ?>" target="_blank">
                                        <?php endif; ?>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.33203 8.45307C3.33203 4.70522 6.3168 1.66699 9.9987 1.66699C13.6806 1.66699 16.6654 4.70522 16.6654 8.45307C16.6654 12.1715 14.5376 16.5107 11.2178 18.0624C10.4439 18.4241 9.55348 18.4241 8.77959 18.0624C5.4598 16.5107 3.33203 12.1715 3.33203 8.45307Z"
                                                stroke="#b56d5a" stroke-width="1.25" />
                                            <circle cx="10" cy="8.33301" r="2.5" stroke="#b56d5a" stroke-width="1.25" />
                                        </svg>
                                        <?php echo $address; ?>
                                        <?php if ($mapLink) : ?>
                                        </a>
                                    <?php endif; ?>
                                </div><!-- /.expert-location -->
                            <?php endif; ?>

                            <div class="expert-contact">
                                <?php if ($phone) : ?>
                                    <a href="tel:<?php echo $number; ?>">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.36336 4.93031L8.9042 5.89941C9.39228 6.77398 9.19635 7.92126 8.42762 8.68999C8.42762 8.69 8.42762 8.69 8.42762 8.69C8.42752 8.69009 7.49526 9.62254 9.18579 11.3131C10.8758 13.003 11.8082 12.0719 11.8089 12.0712C11.8089 12.0712 11.8089 12.0712 11.8089 12.0712C12.5776 11.3025 13.7249 11.1066 14.5994 11.5947L15.5686 12.1355C16.8892 12.8725 17.0451 14.7245 15.8843 15.8853C15.1868 16.5828 14.3324 17.1256 13.3878 17.1614C11.7977 17.2216 9.09726 16.8192 6.38845 14.1104C3.67964 11.4016 3.27721 8.70118 3.33749 7.11107C3.3733 6.1665 3.91603 5.31203 4.61354 4.61452C5.77433 3.45373 7.62634 3.60969 8.36336 4.93031Z"
                                                stroke="#b56d5a" stroke-width="1.25" stroke-linecap="round"></path>
                                        </svg>
                                        <?php echo $phone; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if ($phone_2) : ?>
                                    <a href="tel:<?php echo $number_2; ?>">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.36336 4.93031L8.9042 5.89941C9.39228 6.77398 9.19635 7.92126 8.42762 8.68999C8.42762 8.69 8.42762 8.69 8.42762 8.69C8.42752 8.69009 7.49526 9.62254 9.18579 11.3131C10.8758 13.003 11.8082 12.0719 11.8089 12.0712C11.8089 12.0712 11.8089 12.0712 11.8089 12.0712C12.5776 11.3025 13.7249 11.1066 14.5994 11.5947L15.5686 12.1355C16.8892 12.8725 17.0451 14.7245 15.8843 15.8853C15.1868 16.5828 14.3324 17.1256 13.3878 17.1614C11.7977 17.2216 9.09726 16.8192 6.38845 14.1104C3.67964 11.4016 3.27721 8.70118 3.33749 7.11107C3.3733 6.1665 3.91603 5.31203 4.61354 4.61452C5.77433 3.45373 7.62634 3.60969 8.36336 4.93031Z"
                                                stroke="#b56d5a" stroke-width="1.25" stroke-linecap="round"></path>
                                        </svg>
                                        <?php echo $phone_2; ?>
                                    </a>
                                <?php endif; ?>
                                <?php if ($email) : ?>
                                    <a href=" mailto:<?php echo $email; ?>">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.66797 10.5002C1.66797 7.35747 1.66797 5.78612 2.64428 4.80981C3.62059 3.8335 5.19194 3.8335 8.33464 3.8335H11.668C14.8107 3.8335 16.382 3.8335 17.3583 4.80981C18.3346 5.78612 18.3346 7.35747 18.3346 10.5002C18.3346 13.6429 18.3346 15.2142 17.3583 16.1905C16.382 17.1668 14.8107 17.1668 11.668 17.1668H8.33463C5.19194 17.1668 3.62059 17.1668 2.64428 16.1905C1.66797 15.2142 1.66797 13.6429 1.66797 10.5002Z"
                                                stroke="#b56d5a" stroke-width="1.25"></path>
                                            <path
                                                d="M5 7.1665L6.79908 8.66574C8.32961 9.94118 9.09488 10.5789 10 10.5789C10.9051 10.5789 11.6704 9.94118 13.2009 8.66574L15 7.1665"
                                                stroke="#b56d5a" stroke-width="1.25" stroke-linecap="round"></path>
                                        </svg>
                                        <?php echo $email; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php if ((is_singular('projekty') || is_singular('lokale')) && $persons): ?>

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
                                                                    stroke="#b56d5a" stroke-width="1.25" stroke-linecap="round"></path>
                                                            </svg>
                                                            <?php echo $person['nr_telefonu']; ?>
                                                        </a>
                                                    <?php endif;
                                                    if ($person['nr_telefonu_stacjonarnego']): ?>
                                                        <a href="tel:<?php echo $person['nr_telefonu_stacjonarnego']; ?>">
                                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.36336 4.93031L8.9042 5.89941C9.39228 6.77398 9.19635 7.92126 8.42762 8.68999C8.42762 8.69 8.42762 8.69 8.42762 8.69C8.42752 8.69009 7.49526 9.62254 9.18579 11.3131C10.8758 13.003 11.8082 12.0719 11.8089 12.0712C11.8089 12.0712 11.8089 12.0712 11.8089 12.0712C12.5776 11.3025 13.7249 11.1066 14.5994 11.5947L15.5686 12.1355C16.8892 12.8725 17.0451 14.7245 15.8843 15.8853C15.1868 16.5828 14.3324 17.1256 13.3878 17.1614C11.7977 17.2216 9.09726 16.8192 6.38845 14.1104C3.67964 11.4016 3.27721 8.70118 3.33749 7.11107C3.3733 6.1665 3.91603 5.31203 4.61354 4.61452C5.77433 3.45373 7.62634 3.60969 8.36336 4.93031Z"
                                                                    stroke="#b56d5a" stroke-width="1.25" stroke-linecap="round"></path>
                                                            </svg>
                                                            <?php echo $person['nr_telefonu_stacjonarnego']; ?>
                                                        </a>
                                                    <?php endif;
                                                    if ($person['adres_email']): ?>
                                                        <a href="mailto: <?php echo $person['adres_email']; ?>">
                                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1.66797 10.5002C1.66797 7.35747 1.66797 5.78612 2.64428 4.80981C3.62059 3.8335 5.19194 3.8335 8.33464 3.8335H11.668C14.8107 3.8335 16.382 3.8335 17.3583 4.80981C18.3346 5.78612 18.3346 7.35747 18.3346 10.5002C18.3346 13.6429 18.3346 15.2142 17.3583 16.1905C16.382 17.1668 14.8107 17.1668 11.668 17.1668H8.33463C5.19194 17.1668 3.62059 17.1668 2.64428 16.1905C1.66797 15.2142 1.66797 13.6429 1.66797 10.5002Z"
                                                                    stroke="#b56d5a" stroke-width="1.25"></path>
                                                                <path
                                                                    d="M5 7.1665L6.79908 8.66574C8.32961 9.94118 9.09488 10.5789 10 10.5789C10.9051 10.5789 11.6704 9.94118 13.2009 8.66574L15 7.1665"
                                                                    stroke="#b56d5a" stroke-width="1.25" stroke-linecap="round"></path>
                                                            </svg>
                                                            <?php echo $person['adres_email']; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($link) : ?>
                                <a class="bttn black-bttn" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($map) : ?>
                        <div class="map map-height">
                            <div id="contactMap"></div>
                        </div><!-- /.map -->
                    <?php endif; ?>
                </div><!-- /.contact-left -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="contact-right">
                    <?php echo do_shortcode('[contact-form-7 id="053d9de" title="Formularz główny"]'); ?>
                </div><!-- /.contact-right -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.contact-area -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/leaflet.js"></script>
<script>
    (function($) {
        // Contact Map
        $(document).ready(function() {
            function initMap() {
                // Coordinates for the investment location (example: Warsaw, Poland)
                const investmentLocation = [<?php echo $map['lat']; ?>, <?php echo $map['lng']; ?>];

                // Create map instance
                const map = L.map("contactMap").setView(investmentLocation, 10);

                L.tileLayer(
                    "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png",
                ).addTo(map);

                // Option 1: Custom SVG Marker
                const svgMarker = L.divIcon({
                    className: "custom-div-icon",
                    html: `
                <svg width="40" height="40" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 10 L20 90 L80 90 Z" fill="#FF5733" stroke="#000" stroke-width="5"/>
                    <circle cx="50" cy="50" r="10" fill="#FFFFFF"/>
                </svg>
            `,
                    iconSize: [40, 40],
                    iconAnchor: [20, 40],
                });

                // Option 2: PNG Marker (external image)
                const pngMarker = L.icon({
                    iconUrl: "<?php echo $pin; ?>",
                    iconSize: [22, 28],
                    // iconAnchor: [0, 0],
                    popupAnchor: [-3, -76],
                });

                L.marker([<?php echo $map['lat']; ?>, <?php echo $map['lng']; ?>], {
                        icon: pngMarker
                    })
                    .addTo(map)
                    .bindPopup("<?php echo $address; ?>");
            }

            // Call the function when document is ready
            initMap();
        });
    })(jQuery);
</script>