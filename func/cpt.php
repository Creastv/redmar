<?php

function register_cpt_projekty()
{
    $labels = [
        'name' => 'Projekty',
        'singular_name' => 'Projekt',
        'add_new' => 'Dodaj nowy',
        'add_new_item' => 'Dodaj nowy projekt',
        'edit_item' => 'Edytuj projekt',
        'new_item' => 'Nowy projekt',
        'view_item' => 'Zobacz projekt',
        'search_items' => 'Szukaj projektów',
        'not_found' => 'Nie znaleziono',
        'not_found_in_trash' => 'Nie znaleziono w koszu',
        'menu_name' => 'Projekty',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'rewrite' => ['slug' => 'projekt'], // np. /projekt/nazwa
        'menu_icon' => 'dashicons-building',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ];

    register_post_type('projekty', $args);
}
add_action('init', 'register_cpt_projekty');

function register_crm_investycje_taxonomy()
{
    register_taxonomy(
        'crm_inwestycje',
        ['projekty'], // Dodajesz taxonomy tylko do projektów
        [
            'label' => 'CRM Inwestycje',
            'public' => true,
            'show_in_rest' => true,
            'rewrite' => false,
            'hierarchical' => true,
        ]
    );
}
add_action('init', 'register_crm_investycje_taxonomy');

add_filter('rank_math/frontend/breadcrumb/items', function ($crumbs, $class) {
    if (is_singular('projekty')) {
        $test_breadcrumb = [
            'Projekty',
            site_url('/projekty/'), // URL do podstrony Test

        ];

        array_splice($crumbs, -1, 0, [$test_breadcrumb]);
    }
    return $crumbs;
}, 10, 2);



function register_cpt_lokale()
{
    register_post_type('lokale', [
        'label' => 'Lokale',
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}
add_action('init', 'register_cpt_lokale');

add_action('init', 'go_taxonomy_typ', 0);
function go_taxonomy_typ()
{
    $labels = array(
        'name' => _x('Typ lokalu', 'go'),
        'singular_name' => _x('Typ lokalu', 'go'),
        'search_items' =>  __('Szukaj Typ'),
        'all_items' => __('Wszystkie Typy'),
        'menu_name' => __('Typ lokalu'),
    );
    register_taxonomy('typ-lokalu', array('lokale'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'typ-lokalu'),
    ));
}


add_action('init', 'go_taxonomy_inwestycja', 0);
function go_taxonomy_inwestycja()
{
    $labels = array(
        'name' => _x('Inwestycje', 'go'),
        'singular_name' => _x('Inwestycje', 'go'),
        'search_items' =>  __('Szukaj Typ'),
        'all_items' => __('Wszystkie Typy'),
        'menu_name' => __('Inwestycje'),
    );
    register_taxonomy('inwestycje', array('lokale'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'inwestycje'),
    ));
}