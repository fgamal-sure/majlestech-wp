<?php

// overwrite theme header language default label
function technix_child_header_lang_defualt() {
    $technix_header_lang = get_theme_mod( 'technix_header_lang', true );
    if ( $technix_header_lang ): ?>
        <?php 
            $lang_code = pll_current_language();
            $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
         ?>
        <span class="tp-header-lang-selected-lang tp-lang-toggle"
            id="tp-header-lang-toggle"><?php print esc_html__( $languages[$lang_code]["native_name"], 'technix' );?></span>

        <?php do_action( 'technix_language' );?>

    <?php endif;?>
<?php
}

// overwrite technix language function for theme language switcher
function remove_technix_language_list() {
    remove_action( 'technix_language', 'technix_language_list' );
}
add_action( "wp_head", "remove_technix_language_list" );

function technix_child_language_list() {
    $mar = '';
    $languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    // var_dump($languages);
    if ( !empty( $languages ) ) {
        $mar = '<ul class="tp-header-lang-list tp-lang-list">';
        foreach ( $languages as $lan ) {
            $active = $lan['active'] == 1 ? 'active' : '';
            $mar .= '<li class="' . $active . '"><a href="' . $lan['url'] . '">' . $lan['native_name'] . '</a></li>';
        }
        $mar .= '</ul>';
    } else {
        //remove this code when send themeforest reviewer team
        $mar .= '<ul class="tp-header-lang-list tp-lang-list tp-header-lan-list-area">';
        $mar .= '<li><a href="#">' . esc_html__( 'English', 'technix' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Bangla', 'technix' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'French', 'technix' ) . '</a></li>';
        $mar .= '<li><a href="#">' . esc_html__( 'Hindi', 'technix' ) . '</a></li>';
        $mar .= ' </ul>';
    }
    print _technix_language( $mar );
}
add_action( 'technix_language', 'technix_child_language_list' );
