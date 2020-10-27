<?php
/* --------------------------------------------------------------
WP CUSTOMIZE SECTION - CUSTOM SETTINGS
-------------------------------------------------------------- */

add_action( 'customize_register', 'umedical_customize_register' );

function umedical_customize_register( $wp_customize ) {

    /* SOCIAL SETTINGS */
    $wp_customize->add_section('ums_social_settings', array(
        'title'    => __('Redes Sociales', 'umedical'),
        'description' => __('Agregue aqui las redes sociales de la página, serán usadas globalmente', 'umedical'),
        'priority' => 175,
    ));

    $wp_customize->add_setting('ums_social_settings[facebook]', array(
        'default'           => '',
        'sanitize_callback' => 'umedical_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control( 'facebook', array(
        'type' => 'url',
        'section' => 'ums_social_settings',
        'settings' => 'ums_social_settings[facebook]',
        'label' => __( 'Facebook', 'umedical' ),
    ));

    $wp_customize->add_setting('ums_social_settings[twitter]', array(
        'default'           => '',
        'sanitize_callback' => 'umedical_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control( 'twitter', array(
        'type' => 'url',
        'section' => 'ums_social_settings',
        'settings' => 'ums_social_settings[twitter]',
        'label' => __( 'Twitter', 'umedical' ),
    ));

    $wp_customize->add_setting('ums_social_settings[instagram]', array(
        'default'           => '',
        'sanitize_callback' => 'umedical_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'instagram', array(
        'type' => 'url',
        'section' => 'ums_social_settings',
        'settings' => 'ums_social_settings[instagram]',
        'label' => __( 'Instagram', 'umedical' ),
    ));

    $wp_customize->add_setting('ums_social_settings[linkedin]', array(
        'default'           => '',
        'sanitize_callback' => 'umedical_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control( 'linkedin', array(
        'type' => 'url',
        'section' => 'ums_social_settings',
        'settings' => 'ums_social_settings[linkedin]',
        'label' => __( 'LinkedIn', 'umedical' ),
    ));

    $wp_customize->add_setting('ums_social_settings[youtube]', array(
        'default'           => '',
        'sanitize_callback' => 'umedical_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'youtube', array(
        'type' => 'url',
        'section' => 'ums_social_settings',
        'settings' => 'ums_social_settings[youtube]',
        'label' => __( 'YouTube', 'umedical' ),
    ) );

    /* COOKIES SETTINGS */
    $wp_customize->add_section('ums_cookie_settings', array(
        'title'    => __('Cookies', 'umedical'),
        'description' => __('Opciones de Cookies', 'umedical'),
        'priority' => 176,
    ));

    $wp_customize->add_setting('ums_cookie_settings[cookie_text]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control( 'cookie_text', array(
        'type' => 'textarea',
        'label'    => __('Cookie consent', 'umedical'),
        'description' => __( 'Texto del Cookie consent.' ),
        'section'  => 'ums_cookie_settings',
        'settings' => 'ums_cookie_settings[cookie_text]'
    ));

    $wp_customize->add_setting('ums_cookie_settings[cookie_link]', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( 'cookie_link', array(
        'type'     => 'dropdown-pages',
        'section' => 'ums_cookie_settings',
        'settings' => 'ums_cookie_settings[cookie_link]',
        'label' => __( 'Link de Cookies', 'umedical' ),
    ) );

}

function umedical_sanitize_url( $url ) {
    return esc_url_raw( $url );
}

/* --------------------------------------------------------------
CUSTOM CONTROL PANEL
-------------------------------------------------------------- */
/*
function register_umedical_settings() {
    register_setting( 'umedical-settings-group', 'monday_start' );
    register_setting( 'umedical-settings-group', 'monday_end' );
    register_setting( 'umedical-settings-group', 'monday_all' );
}

add_action('admin_menu', 'umedical_custom_panel_control');

function umedical_custom_panel_control() {
    add_menu_page(
        __( 'Panel de Control', 'umedical' ),
        __( 'Panel de Control','umedical' ),
        'manage_options',
        'umedical-control-panel',
        'umedical_control_panel_callback',
        'dashicons-admin-generic',
        120
    );
    add_action( 'admin_init', 'register_umedical_settings' );
}

function umedical_control_panel_callback() {
    ob_start();
?>
<div class="umedical-admin-header-container">
    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="umedical" />
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
</div>
<form method="post" action="options.php" class="umedical-admin-content-container">
    <?php settings_fields( 'umedical-settings-group' ); ?>
    <?php do_settings_sections( 'umedical-settings-group' ); ?>
    <div class="umedical-admin-content-item">
        <table class="form-table">
            <tr valign="center">
                <th scope="row"><?php _e('Monday', 'umedical'); ?></th>
                <td>
                    <label for="monday_start">Starting Hour: <input type="time" name="monday_start" value="<?php echo esc_attr( get_option('monday_start') ); ?>"></label>
                    <label for="monday_end">Ending Hour: <input type="time" name="monday_end" value="<?php echo esc_attr( get_option('monday_end') ); ?>"></label>
                    <label for="monday_all">All Day: <input type="checkbox" name="monday_all" value="1" <?php checked( get_option('monday_all'), 1 ); ?>></label>
                </td>
            </tr>
        </table>
    </div>
    <div class="umedical-admin-content-submit">
        <?php submit_button(); ?>
    </div>
</form>
<?php
    $content = ob_get_clean();
    echo $content;
}
*/
