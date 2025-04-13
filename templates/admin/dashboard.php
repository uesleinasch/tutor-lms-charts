<?php
/**
 * Template para o painel administrativo do plugin
 *
 * @package Tutor_Pro_Charts
 */

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap tutor-pro-charts-admin">
    <h1><?php echo esc_html__('Tutor Pro Charts', 'tutor-pro-charts'); ?></h1>
    
    <div class="tutor-pro-charts-admin-content">
        <div class="tutor-card">
            <div class="tutor-card-header">
                <h2><?php echo esc_html__('Configurações de Gráficos', 'tutor-pro-charts'); ?></h2>
            </div>
            <div class="tutor-card-body">
                <form method="post" action="options.php">
                    <?php
                    settings_fields('tutor_pro_charts_settings');
                    do_settings_sections('tutor_pro_charts_settings');
                    ?>
                    <div class="tutor-form-row">
                        <div class="tutor-form-group">
                            <p><?php echo esc_html__('Bem-vindo ao painel de configurações do Tutor Pro Charts!', 'tutor-pro-charts'); ?></p>
                        </div>
                    </div>
                    <?php submit_button(__('Salvar Configurações', 'tutor-pro-charts')); ?>
                </form>
            </div>
        </div>
    </div>
</div>