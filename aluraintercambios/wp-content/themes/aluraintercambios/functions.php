<?php

function alura_intercambios_registrando_taxonimia()
{
    register_taxonomy(
        'paises',
        'destinos',
        [
            'labels' => ['name' => 'Países'],
            'hierarchical' => true
        ]
    );
}
add_action('init', 'alura_intercambios_registrando_taxonimia');

function alura_intercambios_registrando_post_customizado()
{
    register_post_type(
        'destinos',
        [
            'labels' => ['name' => 'Destinos'],
            'public' => true,
            'menu_position' => 0,
            'supports' => ['title', 'editor', 'thumbnail'],
            'menu_icon' => 'dashicons-admin-site'
        ]
    );
}
add_action('init', 'alura_intercambios_registrando_post_customizado');

function alura_intercambios_adicionando_recursos_ao_tema()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'alura_intercambios_adicionando_recursos_ao_tema');

function alura_intercambios_registrando_menu()
{
    register_nav_menu(
        'menu-navegacao',
        'Menu Navegação'
    );
}
add_action('init', 'alura_intercambios_registrando_menu');

function alura_intercambios_registrando_post_customizado_banner()
{
    register_post_type(
        'banners',
        [
            'labels' => ['name' => 'Banners'],
            'public' => true,
            'menu_position' => 1,
            'supports' => ['title', 'thumbnail'],
            'menu_icon' => 'dashicons-format-image'
        ]
    );
}
add_action('init', 'alura_intercambios_registrando_post_customizado_banner');

function alura_intercambios_registrando_metabox()
{
    add_meta_box(
        'ai_registrando_metabox',
        'Texto para o home',
        'ai_funcao_callback',
        'banners'
    );
}
add_action('add_meta_boxes', 'alura_intercambios_registrando_metabox');

function ai_funcao_callback($post)
{
    $texto_home_1 = get_post_meta($post->ID, '_texto_home_1', true);
    $texto_home_2 = get_post_meta($post->ID, '_texto_home_2', true);
?>
    <label for="texto_home_1">Texto 1</label>
    <input type="text" name="texto_home_1" style="width: 100%;" value="<?= $texto_home_1 ?>" />
    <br />
    <br />
    <label for="texto_home_2">Texto 2</label>
    <input type="text" name="texto_home_2" style="width: 100%;" value="<?= $texto_home_2 ?>" />
<?php
}

function alura_intercambios_salvando_metabox($post_id)
{
    foreach ($_POST as $key => $value) {
        if ($key !== 'texto_home_1' && $key !== 'texto_home_2') {
            continue;
        }

        update_post_meta(
            $post_id,
            '_' . $key,
            $_POST[$key]
        );
    }
}
add_action('save_post', 'alura_intercambios_salvando_metabox');

function pegandoTextosBanner()
{
    $args = [
        'post_type' => 'banners',
        'post_status' => 'publish',
        'posts_per_page' => 1
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) : 
        while ($query->have_posts()) : $query->the_post();
            $texto1 = get_post_meta(get_the_ID(), '_texto_home_1', true);
            $texto2 = get_post_meta(get_the_ID(), '_texto_home_2', true);
            return [
                'texto1' => $texto1,
                'texto2' => $texto2
            ];
        endwhile;
    endif;
}

function alura_intercambios_adicionando_scripts()
{
    $textosBanner = pegandoTextosBanner();

    if (is_front_page()) {
        wp_enqueue_script(
            'typed-js',
            get_template_directory_uri() . '/js/typed.min.js',
            [],
            false,
            true
        );

        wp_enqueue_script(
            'texto-banner-js',
            get_template_directory_uri() . '/js/texto-banner.js',
            ['typed-js'],
            false,
            true
        );

        wp_localize_script('texto-banner-js', 'data', $textosBanner);
    }
}
add_action('wp_enqueue_scripts', 'alura_intercambios_adicionando_scripts');
