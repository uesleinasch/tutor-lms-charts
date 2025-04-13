<?php
/**
 * Funções auxiliares para o plugin Tutor Pro Charts
 *
 * @package Tutor_Pro_Charts
 */

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Obtém a versão do plugin
 *
 * @return string
 */
function tutor_pro_charts_version() {
    return TUTOR_PRO_CHARTS_VERSION;
}

/**
 * Verifica se o plugin Tutor LMS está ativo
 *
 * @return boolean
 */
function tutor_pro_charts_dependency_fulfilled() {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    return is_plugin_active('tutor/tutor.php');
}