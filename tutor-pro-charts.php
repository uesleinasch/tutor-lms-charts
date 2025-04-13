<?php
/**
 * Plugin Name: Tutor Pro Charts
 * Plugin URI: https://ueslei.pro/tutor-pro-charts
 * Description: Um plugin para exibir gráficos no Tutor LMS
 * Version: 0.0.1
 * Author: Ueslei Nascimento
 * Author URI: https://ueslei.pro
 * Text Domain: tutor-pro-charts
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.2
 */

// Impedir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

// Constantes do plugin
define('TUTOR_PRO_CHARTS_VERSION', '0.0.1');
define('TUTOR_PRO_CHARTS_FILE', __FILE__);
define('TUTOR_PRO_CHARTS_PATH', plugin_dir_path(__FILE__));
define('TUTOR_PRO_CHARTS_URL', plugin_dir_url(__FILE__));

/**
 * Class Tutor_Pro_Charts
 */
final class Tutor_Pro_Charts {
    
    /**
     * Instância única 
     */
    private static $instance = null;
    
    /**
     * Cria ou retorna a instância
     */
    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
            self::$instance->setup();
        }
        return self::$instance;
    }
    
    /**
     * Configurações iniciais
     */
    private function setup() {
        // Carregar arquivos
        $this->load_files();
        
        // Registrar hooks
        $this->register_hooks();
    }
    
    /**
     * Carrega os arquivos necessários
     */
    private function load_files() {
        // Carregar classes e funções
        require_once TUTOR_PRO_CHARTS_PATH . 'includes/functions.php';
        require_once TUTOR_PRO_CHARTS_PATH . 'includes/class-assets.php';
        require_once TUTOR_PRO_CHARTS_PATH . 'admin/class-admin.php';
    }
    
    /**
     * Registra os hooks
     */
    private function register_hooks() {
        // Ativação
        register_activation_hook(TUTOR_PRO_CHARTS_FILE, array($this, 'activation'));
        
        // Desativação
        register_deactivation_hook(TUTOR_PRO_CHARTS_FILE, array($this, 'deactivation'));
        
        // Inicialização
        add_action('plugins_loaded', array($this, 'init_plugin'));
    }
    
    /**
     * Ações na ativação do plugin
     */
    public function activation() {
        // Código para executar durante a ativação
    }
    
    /**
     * Ações na desativação do plugin
     */
    public function deactivation() {
        // Código para executar durante a desativação
    }
    
    /**
     * Inicializa o plugin
     */
    public function init_plugin() {
        // Carregar texto para tradução
        load_plugin_textdomain('tutor-pro-charts', false, TUTOR_PRO_CHARTS_PATH . 'languages');
        
        // Inicializar classes
        new Tutor_Pro_Charts\Assets();
        new Tutor_Pro_Charts\Admin();
    }
}

/**
 * Inicializa o plugin
 */
function tutor_pro_charts() {
    return Tutor_Pro_Charts::instance();
}

// Iniciar o plugin
tutor_pro_charts();