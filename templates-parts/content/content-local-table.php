<?php
$budynek = get_field('budynek', get_the_ID());
$floor = get_field('pietro', get_the_ID());
$size = get_field('metraz', get_the_ID());
$rooms = get_field('pokoje', get_the_ID());
$balcony = get_field('rozmiar_balkonu', get_the_ID());

$balcony = get_field('rozmiar_balkonu', get_the_ID());
$terrace = get_field('rozmiar_tarasu', get_the_ID());
$terraceBalcony = get_field('rozmiar_ogrodei_taras', get_the_ID());


$status = get_field('status', get_the_ID());
$price = get_field('cena', get_the_ID());
$plan = get_field('plan_mieszkania', get_the_ID());
$plan2d = get_field('rzut_2d', get_the_ID());
$plan3d = get_field('rzut_3d', get_the_ID());
$statusInfo = "";
$statusInfoClass = "";
if ($status == 1) :
    $statusInfo = 'Dostępne';
    $statusInfoClass = "available";
elseif ($status == 2) :
    $statusInfo = 'Zarezerwowane';
    $statusInfoClass = "reserved";
elseif ($status == 3) :
    $statusInfo = 'Sprzedane';
    $statusInfoClass = "sold";
endif;
if ($floor == 0) {
    $floor = "Parter";
}

?>

<tr class="odd">
    <td class="sorting_1"><?php the_title(); ?></td>
    <td><?php echo is_numeric($size) ? number_format((float) $size, 2) . ' m²' : '-'; ?></td>
    <td><?php echo $floor ? $floor : '-'; ?></td>
    <td><?php echo $rooms; ?></td>
    <td class="hide-mobile balcony">

        <?php if (!empty($balcony)) : ?>
            <span><?php echo is_numeric($balcony) ? number_format((float) $balcony, 2) . ' m²' : '-'; ?></span>
        <?php elseif (!empty($terrace)) : ?>
            <span><?php echo is_numeric($terrace) ? number_format((float) $terrace, 2) . ' m²' : '-'; ?></span>
        <?php elseif (!empty($terraceBalcony)) : ?>
            <span><?php echo is_numeric($terraceBalcony) ? number_format((float) $terraceBalcony, 2) . ' m²' : '-'; ?></span>
        <?php else: ?>
            -
        <?php endif; ?>

    </td>
    <td><span class="status-<?php echo $statusInfoClass; ?>"><?php echo  $statusInfo; ?></span><br><span
            class="price-mobile"><?php echo $price ?  number_format($price, 2, ',', ' ') . ' zł'  : "-"; ?></span>
    </td>
    <td class="hide-mobile">
        <?php if ($plan): ?>
            <a class="download-plan" href="<?php echo $plan; ?>" target="_blank">
                <svg width="23" height="25" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_76_188)">
                        <path
                            d="M14.7001 0C14.9332 0.070615 15.1674 0.0929679 15.3995 0.178316C16.291 0.506497 16.815 1.31984 17 2.23529V13.7674L11.8005 19H2.35207C1.03038 18.8527 0.093762 17.894 0 16.5381L0.00852382 2.31759C0.136882 1.0958 1.09506 0.119385 2.30193 0H14.7001ZM15.9501 13.0561V2.20989C15.9501 1.75928 15.1102 1.00487 14.6269 1.06481L2.0743 1.1146C1.51674 1.30663 1.10509 1.74658 1.04993 2.35976L1.05194 16.6885C1.0384 17.1879 1.76794 17.9326 2.22722 17.9326H11.1512V15.5703C11.1512 14.3795 12.2648 13.0556 13.4757 13.0556H15.9501V13.0561ZM15.2 14.123H13.3754C13.2099 14.123 12.7251 14.4207 12.5982 14.5528C12.4869 14.6691 12.2006 15.1807 12.2006 15.3168V17.1711L15.2 14.123Z"
                            fill="black" />
                        <path
                            d="M7.23778 7.12399C7.54615 7.06099 8.82171 7.08385 9.12305 7.16615C9.64451 7.3084 10.0928 7.80778 10.1509 8.35695C10.2031 8.84669 10.2106 10.261 10.1384 10.733C10.0672 11.1998 9.66506 11.6362 9.23486 11.7963C8.88438 11.9268 7.71913 11.9375 7.32453 11.8897C7.00614 11.8511 6.87728 11.6667 6.84819 11.3578C6.73588 10.1701 6.93795 8.80249 6.8497 7.59492C6.87176 7.36682 7.01165 7.17123 7.23728 7.125L7.23778 7.12399ZM7.851 10.8209H8.87586C9.01425 10.8209 9.12857 10.5633 9.14612 10.4353C9.19826 10.0609 9.19575 8.94118 9.15163 8.55915C9.13107 8.3788 8.95358 8.12834 8.77558 8.12834H7.92571L7.8505 8.20455V10.8209H7.851Z"
                            fill="black" />
                        <path
                            d="M3.85174 10.0082V11.3545C3.85174 11.4012 3.74594 11.6618 3.70332 11.7116C3.42204 12.0444 2.88253 11.863 2.81334 11.4439C2.87501 10.2429 2.69049 8.87634 2.7998 7.69468C2.81985 7.47877 2.87802 7.27455 3.0881 7.17498C3.29819 7.0754 4.52261 7.08607 4.81994 7.11859C6.08949 7.2588 6.58989 8.86008 5.60163 9.67851C5.49032 9.77046 5.09672 10.0082 4.97588 10.0082H3.85124H3.85174ZM3.85174 8.99217H4.77682C4.8771 8.99217 5.0892 8.72851 5.10173 8.60658C5.11427 8.48466 4.96736 8.17934 4.8771 8.17934H3.85224V8.99217H3.85174Z"
                            fill="black" />
                        <path
                            d="M11.9007 8.17901V8.91564C11.9323 8.96593 11.9699 8.98117 12.0256 8.99184C12.5345 9.08634 13.7439 8.67687 13.5975 9.62382C13.5784 9.74778 13.3819 10.0079 13.2751 10.0079H11.9754L11.9002 10.0841V11.5574C11.9002 11.6061 11.7704 11.7413 11.7177 11.7783C11.3828 12.0151 11.0569 11.8479 10.911 11.4959C10.9766 10.2599 10.7876 8.86027 10.8979 7.64305C10.92 7.40224 11.0764 7.15535 11.3281 7.1147C11.6656 7.06035 13.4967 7.05831 13.8136 7.12334C14.4538 7.25492 14.2262 8.1785 13.7248 8.1785H11.9002L11.9007 8.17901Z"
                            fill="black" />
                    </g>
                    <defs>
                        <clipPath id="clip0_76_188">
                            <rect width="17" height="19" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
        <?php else: ?>
            -
        <?php endif; ?>


    </td>
    <td><a href="<?php the_permalink(); ?>" class="price-btn">Zapytaj</a></td>
    <td class="hide-mobile" data-order="<?php echo $price; ?>">
        <?php echo $price ?  number_format($price, 2, ',', ' ') . ' zł'  : "-"; ?></td>
    <td class=" hide-mobile">
        <button class="favorite-btn grid-favorite-toggle" data-index="<?php echo get_the_ID(); ?>">
            <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill="#fff" ;
                    d="M9.33,15.59c-.42,0-.87-.14-1.38-.44-.45-.26-.9-.62-1.31-.94-.22-.17-.45-.35-.69-.54-1.04-.8-2.21-1.7-3.16-2.77-1.38-1.55-2.04-3.19-2.04-5.03C.75,3.81,1.89,1.96,3.66,1.15c.58-.26,1.19-.4,1.82-.4,1.24,0,2.49.53,3.61,1.53.07.06.16.1.25.1s.18-.03.25-.1c1.11-1,2.36-1.53,3.61-1.53.63,0,1.24.13,1.82.4,1.77.81,2.91,2.66,2.91,4.72,0,1.84-.67,3.48-2.04,5.03-.95,1.07-2.12,1.97-3.16,2.77-.24.19-.47.37-.7.54-.4.32-.86.67-1.31.94-.51.3-.96.44-1.38.44Z" />
                <path fill="#1d1d1b" ;
                    d="M13.19,1.13c.58,0,1.14.12,1.67.36,1.63.75,2.69,2.47,2.69,4.38,0,1.74-.64,3.31-1.95,4.78-.92,1.04-2.09,1.93-3.11,2.72-.24.19-.47.36-.7.54-.37.29-.83.66-1.26.91-.45.26-.84.39-1.19.39s-.74-.13-1.19-.39c-.43-.25-.89-.62-1.26-.91-.22-.17-.45-.35-.7-.54-1.02-.79-2.18-1.68-3.11-2.72-1.31-1.48-1.95-3.04-1.95-4.78,0-1.92,1.05-3.64,2.69-4.38.53-.24,1.09-.36,1.67-.36,1.15,0,2.31.49,3.36,1.43.14.13.32.19.5.19s.36-.06.5-.19c1.04-.94,2.2-1.43,3.36-1.43M13.19.38c-1.27,0-2.61.5-3.86,1.62-1.25-1.12-2.59-1.62-3.86-1.62-.69,0-1.36.15-1.98.43C1.65,1.65.38,3.61.38,5.87s.93,3.92,2.14,5.28c1.19,1.34,2.71,2.42,3.9,3.35.43.34.89.7,1.35.97.46.27.99.49,1.57.49s1.11-.22,1.57-.49c.46-.27.92-.63,1.35-.97,1.19-.94,2.71-2.01,3.9-3.35,1.21-1.37,2.14-3.06,2.14-5.28s-1.28-4.22-3.13-5.06c-.62-.28-1.29-.43-1.98-.43h0Z" />
            </svg>
        </button>
    </td>
</tr>