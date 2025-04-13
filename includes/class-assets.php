<?php
/**
 * Classe para gerenciar assets (CSS e JavaScript)
 *
 * @package Tutor_Pro_Charts
 */

namespace Tutor_Pro_Charts;

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Classe Assets
 */
class Assets {

    /**
     * Construtor
     */
    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
    }

    /**
     * Registra e enfileira scripts e estilos para o admin
     *
     * @return void
     */
    public function admin_scripts() {
        // Registrar e enfileirar CSS
        wp_register_style(
            'tutor-pro-charts-admin',
            TUTOR_PRO_CHARTS_URL . 'assets/css/admin.css',
            array(),
            TUTOR_PRO_CHARTS_VERSION
        );
        wp_enqueue_style('tutor-pro-charts-admin');

        // Registrar e enfileirar JavaScript
        wp_register_script(
            'tutor-pro-charts-admin',
            TUTOR_PRO_CHARTS_URL . 'assets/js/admin.js',
            array('jquery'),
            TUTOR_PRO_CHARTS_VERSION,
            true
        );
        wp_enqueue_script('tutor-pro-charts-admin');

        // Localização para JavaScript
        wp_localize_script('tutor-pro-charts-admin', 'tutorProChartsAdmin', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('tutor_pro_charts_nonce'),
        ));
    }

    /**
     * Registra e enfileira scripts e estilos para o frontend
     *
     * @return void
     */
    public function frontend_scripts() {
        // Registrar e enfileirar CSS
        wp_register_style(
            'tutor-pro-charts-frontend',
            TUTOR_PRO_CHARTS_URL . 'assets/css/frontend.css',
            array(),
            TUTOR_PRO_CHARTS_VERSION
        );
        wp_enqueue_style('tutor-pro-charts-frontend');

        // Registrar e enfileirar JavaScript
        wp_register_script(
            'tutor-pro-charts-frontend',
            TUTOR_PRO_CHARTS_URL . 'assets/js/frontend.js',
            array('jquery'),
            TUTOR_PRO_CHARTS_VERSION,
            true
        );
        wp_enqueue_script('tutor-pro-charts-frontend');

        // Localização para JavaScript
        wp_localize_script('tutor-pro-charts-frontend', 'tutorProChartsFrontend', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('tutor_pro_charts_nonce'),
        ));
    }
}