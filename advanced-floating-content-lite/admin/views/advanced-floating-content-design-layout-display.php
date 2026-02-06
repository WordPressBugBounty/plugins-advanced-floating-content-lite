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
<div class="afc-panel theme-settings">  
    <div class="afc-panel-div">
        <div class="control-row">
            <label for="ct_afc_control_devices_medium"><?php esc_html_e('Control Devices Medium','advanced-floating-content')?></label>
            <div class="radio-button-group-devices">
                <?php
                $options = array(
                    '0' => esc_html__( 'Dont Hide on Any Device', 'advanced-floating-content' ),
                    '1' => esc_html__( 'Hide On Web/Desktop/laptop', 'advanced-floating-content' ),
                    '2' => esc_html__( 'Hide On All Mobile Devices', 'advanced-floating-content' )
                );
                foreach($options as $key => $value) { 
                ?>
                <label class="radio-option-devices">
                    <input type="radio" 
                           name="ct_afc_control_devices_medium" 
                           id="ct_afc_control_devices_medium_<?php echo esc_attr($key); ?>" 
                           value="<?php echo esc_attr($key); ?>" 
                           <?php checked( get_text_value(get_the_ID(), 'ct_afc_control_devices_medium', '0'), $key ); ?>>
                    <span class="radio-label"><?php echo esc_html($value); ?></span>
                </label>
                <?php } ?>
            </div>
        </div>        
    </div>                        
</div>
<div class="afc-pro-teaser">
    <h3><span class="dashicons dashicons-star-filled"></span> Want 50+ Premium Features? <span class="pro-inline-badge">Available in PRO only</span></h3>
	<p>Upgrade to <strong>Advanced Floating Content PRO</strong> and unlock everything you need for high-converting floating content.</p>
    
    <div class="pro-features-grid">
        <div class="pro-feature">
            <h4>WooCommerce Sales Machine</h4>
            <p>Show offers exactly where buyers convert - increase sales by 40%+</p>
            <span class="pro-badge">PRO</span>
        </div>
        
        <div class="pro-feature">
            <h4>Smart Targeting Rules</h4>
            <p>Show content by device, location, user role, scroll behavior & more</p>
            <span class="pro-badge">PRO</span>
        </div>
        <div class="pro-feature">
			<h4>Sticky Announcement Bars</h4>
			<p>Keep announcements visible without breaking layouts. Sticky or integrated modes for perfect UX.</p>
			<span class="pro-badge">PRO</span>
		</div>

		<div class="pro-feature">
			<h4>Smart Scroll & Viewport Logic</h4>
			<p>Show messages exactly when users are engaged. Scroll-based triggers that respect visitor attention.</p>
			<span class="pro-badge">PRO</span>
		</div>
        <div class="pro-feature">
            <h4>20+ Premium Animations</h4>
            <p>Smooth entrance & exit effects that grab attention</p>
            <span class="pro-badge">PRO</span>
        </div>
        
        <div class="pro-feature">
            <h4>Auto-Scheduling & Timing</h4>
            <p>Set start/end dates automatically - perfect for campaigns</p>
            <span class="pro-badge">PRO</span>
        </div>
        
        <div class="pro-feature">
            <h4>Unlimited Floating Elements</h4>
            <p>Create as many bars, CTAs, and widgets as you need</p>
            <span class="pro-badge">PRO</span>
        </div>
        
        <div class="pro-feature">
            <h4>Priority 24/7 Support</h4>
            <p>Get expert help within hours, not days</p>
            <span class="pro-badge">PRO</span>
        </div>
    </div>
    
    <div class="pro-teaser-cta">
        <a href="https://1.envato.market/5By11?subId1=afc_lite_wp&subId2=afc_lite" target="_blank" class="button button-primary button-hero">
            <span class="dashicons dashicons-arrow-right-alt"></span> Upgrade to PRO - Get All 50+ Features
        </a>
        <p class="pro-teaser-note">One-time payment • Lifetime updates • 4,400+ active installations • 4.7★ rating</p>
    </div>
</div>