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
 * @link     http://www.codetides.com/
 * @since    1.0.0 
 */
?>
<div class="afc-panel">  
	<div class="afc-panel-div">
        <label for="width"><?php esc_html_e('Control Devices Medium','advanced-floating-content')?></label>
        <div class="control-radio">
         <?php
                $options = array(
                    '0'=> esc_html__( 'Dont Hide on Any Device', 'advanced-floating-content' ),
                    '1'=> esc_html__( 'Hide On Web/Desktop/laptop', 'advanced-floating-content' ),
					'2'=> esc_html__( 'Hide On All Mobile Devices', 'advanced-floating-content' )
                );
                foreach($options as $key => $value) { 
                ?>
                <label><input type="radio" name="ct_afc_control_devices_medium" value="<?php echo esc_attr($key);?>" <?php if ($key==get_text_value(get_the_ID(),'ct_afc_control_devices_medium','0')) {?> checked="checked" <?php } ?> /><?php echo esc_attr($value);?></label>
                <?php } ?>
        </div>        
    </div> 
                        
</div>