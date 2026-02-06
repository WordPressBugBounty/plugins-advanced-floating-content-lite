<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * PHP Version 7
 *
 * @category Basic
 * @package  Advanced_Floating_Content
 * @author   CodeTides <codetides@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://1.envato.market/5By11
 * @since    1.0.0 
 */
?>
<div class="afc-panel theme-settings">                        	
    <!-- POSITION -->
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_position_place"><?php esc_html_e( 'Position', 'advanced-floating-content' )?></label>
            <div class="position-controls">
                <select name="ct_afc_position_place" id="ct_afc_position_place">
                    <?php
                        $options = array(
                            'fixed'    => esc_html__( 'Fixed', 'advanced-floating-content' ),
                            'absolute' => esc_html__( 'Absolute', 'advanced-floating-content' )
                        );
                        foreach ( $options as $key => $value ) {
                    ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected( get_text_value(get_the_ID(), 'ct_afc_position_place', 'fixed'), $key ); ?>><?php echo esc_attr($value); ?></option>
                    <?php } ?>
                </select>
                <select name="ct_afc_position_y" id="ct_afc_position_y">
                    <?php
                        $options = array(
                            'top'    => esc_html__( 'Top', 'advanced-floating-content' ),
                            'bottom' => esc_html__( 'Bottom', 'advanced-floating-content' )
                        );
                        foreach ( $options as $key => $value ) { 
                    ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected( get_text_value(get_the_ID(), 'ct_afc_position_y', 'top'), $key ); ?>><?php echo esc_attr($value); ?></option>
                    <?php } ?>
                </select>
                <select name="ct_afc_position_x" id="ct_afc_position_x">
                    <?php
                        $options = array(
                            'left'  => esc_html__( 'Left', 'advanced-floating-content' ),
                            'right' => esc_html__( 'Right', 'advanced-floating-content' )
                        );
                        foreach ( $options as $key => $value ) { 
                    ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected( get_text_value(get_the_ID(), 'ct_afc_position_x', 'right'), $key ); ?>><?php echo esc_attr($value); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    
    <!-- CLOSE BUTTON -->
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_close_button"><?php esc_html_e( 'Show Close Button', 'advanced-floating-content' )?></label>
            <div class="radio-button-group">
                <label class="radio-option">
                    <input type="radio" name="ct_afc_close_button" id="ct_afc_close_button_yes" value="yes" <?php checked( get_text_value(get_the_ID(), 'ct_afc_close_button', 'yes'), 'yes' ); ?>>
                    <span class="radio-label"><?php esc_html_e( 'Enable', 'advanced-floating-content' ); ?></span>
                </label>
                <label class="radio-option">
                    <input type="radio" name="ct_afc_close_button" id="ct_afc_close_button_no" value="no" <?php checked( get_text_value(get_the_ID(), 'ct_afc_close_button', 'yes'), 'no' ); ?>>
                    <span class="radio-label"><?php esc_html_e( 'Disable', 'advanced-floating-content' ); ?></span>
                </label>
            </div>
        </div>
    </div>
    
    <!-- WIDTH -->
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_width"><?php esc_html_e( 'Width', 'advanced-floating-content' )?></label>
            <div class="width-control">
                <input type="number" name="ct_afc_width" id="ct_afc_width" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_width', 100) ); ?>" class="width-input">
                <select name="ct_afc_width_unit" id="ct_afc_width_unit">
                    <?php
                        $options = array(
                            'px' => esc_html__( 'Pixels', 'advanced-floating-content' ),
                            '%'  => esc_html__( 'Percentage', 'advanced-floating-content' ),
                        );
                        foreach ( $options as $key => $value ) { 
                    ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected( get_text_value(get_the_ID(), 'ct_afc_width_unit', 'px'), $key ); ?>><?php echo esc_attr($value); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    
    <!-- BACKGROUND COLOR -->
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_background_color"><?php esc_html_e( 'Background Color', 'advanced-floating-content' )?></label>
            <div class="color-control">
                <input type="text" name="ct_afc_background_color" id="ct_afc_background_color" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_background_color', '#FFFFFF') ); ?>" class="color-picker-afc">
            </div>
        </div>
    </div>
    
    <!-- MARGIN -->
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_margin_top"><?php esc_html_e( 'Margin', 'advanced-floating-content' )?></label>
            <div class="spacing-grid">
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Top', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_top" id="ct_afc_margin_top" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_top', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Right', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_right" id="ct_afc_margin_right" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_right', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Bottom', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_bottom" id="ct_afc_margin_bottom" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_bottom', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Left', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_margin_left" id="ct_afc_margin_left" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_margin_left', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- BORDER -->
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_border_top"><?php esc_html_e( 'Border', 'advanced-floating-content' )?></label>
            <div class="spacing-grid">
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Top', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_top" id="ct_afc_border_top" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_top', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Right', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_right" id="ct_afc_border_right" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_right', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Bottom', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_bottom" id="ct_afc_border_bottom" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_bottom', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
                <div class="spacing-input">
                    <span class="spacing-label"><?php esc_html_e( 'Left', 'advanced-floating-content' ); ?></span>
                    <input type="number" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="ct_afc_border_left" id="ct_afc_border_left" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_left', 0) ); ?>">
                    <span class="spacing-unit">px</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- BORDER PROPERTIES -->
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_border_type"><?php esc_html_e( 'Border Properties', 'advanced-floating-content' ); ?></label>
            <div class="border-properties">
                <select name="ct_afc_border_type" id="ct_afc_border_type">
                    <?php
                        $options = array(
                            'dotted' => esc_html__( 'dotted', 'advanced-floating-content' ),
                            'solid'  => esc_html__( 'solid', 'advanced-floating-content' ),
                            'double' => esc_html__( 'double', 'advanced-floating-content' ),
                            'dashed' => esc_html__( 'dashed', 'advanced-floating-content' ),
                            'groove' => esc_html__( 'groove', 'advanced-floating-content' ),
                            'ridge'  => esc_html__( 'ridge', 'advanced-floating-content' ),
                            'inset'  => esc_html__( 'inset', 'advanced-floating-content' ),
                            'outset' => esc_html__( 'outset', 'advanced-floating-content' )
                        );
                        foreach ( $options as $key => $value ) { 
                    ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected( get_text_value(get_the_ID(), 'ct_afc_border_type', 'solid'), $key ); ?>><?php echo esc_attr($value); ?></option>
                    <?php } ?>
                </select>
                <input type="text" name="ct_afc_border_color" id="ct_afc_border_color" value="<?php echo esc_attr( get_text_value(get_the_ID(), 'ct_afc_border_color', '#FFFFFF') ); ?>" class="color-picker-afc">
                <select name="ct_afc_border_radius" id="ct_afc_border_radius">
                    <?php
                        $options = array(
                            '0' => esc_html__( 'Straight Corner', 'advanced-floating-content' ),
                            '1' => esc_html__( 'Round Corner', 'advanced-floating-content' )
                        );
                        foreach ( $options as $key => $value ) { 
                    ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected( get_text_value(get_the_ID(), 'ct_afc_border_radius', '0'), $key ); ?>><?php echo esc_attr($value); ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>                       
</div>
<div id="advanced-floating-content-meta-box-nonce" class="hidden">
<?php wp_nonce_field( 'advanced_floating_content_save', 'advanced_floating_content_nonce' ); ?>
</div>