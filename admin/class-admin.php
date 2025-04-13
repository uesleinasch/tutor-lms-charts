<?php
/**
 * Classe para gerenciar as funcionalidades administrativas
 *
 * @package Tutor_Pro_Charts
 */

namespace Tutor_Pro_Charts;

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Classe Admin
 */
class Admin {

    /**
     * Construtor
     */
    public function __construct() {
        add_action('admin_menu', array($this, 'register_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    /**
     * Registra o menu administrativo
     *
     * @return void
     */
    public function register_admin_menu() {
        add_submenu_page(
            'tutor',
            __('Charts', 'tutor-pro-charts'),
            __('Charts', 'tutor-pro-charts'),
            'manage_options',
            'tutor-pro-charts',
            array($this, 'render_admin_page')
        );
    }

    /**
     * Registra as configurações do plugin
     *
     * @return void
     */
    public function register_settings() {
        // Registro de configurações
        register_setting('tutor_pro_charts_settings', 'tutor_pro_charts_options');
    }

    /**
     * Renderiza a página admin
     *
     * @return void
     */
    public function render_admin_page() {
        include TUTOR_PRO_CHARTS_PATH . 'templates/admin/dashboard.php';
    }
}