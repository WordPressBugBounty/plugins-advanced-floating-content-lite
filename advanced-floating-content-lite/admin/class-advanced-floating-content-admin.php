<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.1.0
 *
 * @package    Advanced_Floating_Content
 * @subpackage Advanced_Floating_Content/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Floating_Content
 * @subpackage Advanced_Floating_Content/admin
 * @author     Code Tides <contact@codetides.com>
 */
class Advanced_Floating_Content_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    public $options;
    
    
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
        $this->options = get_option( 'ct_afc_options' );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Floating_Content_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Floating_Content_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advanced-floating-content-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advanced_Floating_Content_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advanced_Floating_Content_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advanced-floating-content-admin.js', array( 'wp-color-picker' ), $this->version, false );

	}
	
	/*
	*	Register CPT 
	*/
	
	public function register_cpt_floating_content()
	{
		$labels = array(
            'name'                => _x( 'Advanced Floating Content', 'Post Type General Name', 'advanced-floating-content' ),
            'singular_name'       => _x( 'Advanced Floating Content', 'Post Type Singular Name', 'advanced-floating-content' ),
            'menu_name'           => __( 'Advanced Floating Content', 'advanced-floating-content' ),
            'name_admin_bar'      => __( 'Advanced Floating Content', 'advanced-floating-content' ),
            'parent_item_colon'   => __( 'Parent Advanced Floating Content:', 'advanced-floating-content' ),
            'all_items'           => __( 'All Advanced Floating Content', 'advanced-floating-content' ),
            'add_new_item'        => __( 'Add New Advanced Floating Content', 'advanced-floating-content' ),
            'add_new'             => __( 'Add New', 'advanced-floating-content' ),
            'new_item'            => __( 'New Advanced Floating Content', 'advanced-floating-content' ),
            'edit_item'           => __( 'Edit Advanced Floating Content', 'advanced-floating-content' ),
            'update_item'         => __( 'Update Advanced Floating Content', 'advanced-floating-content' ),
            'view_item'           => __( 'View Advanced Floating Content', 'advanced-floating-content' ),
            'search_items'        => __( 'Search Advanced Floating Content', 'advanced-floating-content' ),
            'not_found'           => __( 'Not found', 'advanced-floating-content' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'advanced-floating-content' ),
        );
        $args = array(
            'label'               => __( 'Advanced Floating Content', 'advanced-floating-content' ),
            'description'         => __( 'Another Flexible Advanced Floating Content', 'advanced-floating-content' ),      
			'labels'              => $labels,     
            'supports'            => array('title','editor'),
            'hierarchical'        => false,
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 10,
            'menu_icon'           => 'dashicons-admin-site',
            'show_in_admin_bar'   => false,
            'show_in_nav_menus'   => false,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'capability_type'     => 'post',
        );
        register_post_type( 'ct_afc', apply_filters( 'ct_afc_register_arguments', $args) );
        
	}
	
	/*
 	* Adds a options details.
	*/
	public function add_meta_box() {
		add_meta_box(
			'advanced_floating_content_meta_box',
			__( 'Build Your Floating Content Theme', 'advanced-floating-content' ),
			array($this,'meta_box_print'),
			'ct_afc'
		);
		add_meta_box(
			'advanced_floating_content_design_layout_meta_box',
			__( 'Design & Layout', 'advanced-floating-content' ),
			array($this,'meta_box_print_design_layout'),
			'ct_afc'
		);
	}
	
	
	/*
	* Prints the box content.
	*/
	public function meta_box_print( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-content-admin-display.php';
		
	}
	public function meta_box_print_design_layout( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-content-design-layout-display.php';
		
	}
	
	/*
 	* Adds a options details for premium users.
	*/
	public function add_meta_box_premium() {
		add_meta_box(
			'advanced_floating_content_premium_meta_box',
			__( 'Explore Admin UI', 'advanced-floating-content' ),
			array($this,'meta_box_premium_print'),
			'ct_afc'
		);
	}
	/*
	* Prints the box content for premium users.
	*/
	public function meta_box_premium_print( $post ) {
	
		require_once plugin_dir_path( __FILE__ ). 'views/advanced-floating-content-premium-display.php';
	}
	
	
	/*
	*	Save the post content
	*/
	
	public function save_meta_box( $post_id ) {
 
		/* If we're not working with a 'post' post type or the user doesn't have permission to save,
		 * then we exit the function.
		 */
			
		if ( ! $this->is_valid_post_type() || ! $this->user_can_save( $post_id, 'advanced_floating_content_nonce', 'advanced_floating_content_save' ) ) {
			return;
		}	

		foreach ( $_POST as $key => $value ) {
			if ( 0 === strpos( $key, 'ct_afc_' ) ) {
				// Sanitize the value using wp_kses_post to allow safe HTML tags and attributes
				$sanitized_value = wp_kses_post( $value );
				update_post_meta( $post_id, $key, $sanitized_value );
			}            
		}
	}
	
	private function is_valid_post_type() {
		
		return ! empty( $_POST['post_type'] ) && 'ct_afc' == $_POST['post_type'];
	}
	
	private function user_can_save( $post_id, $nonce_action, $nonce_id ) {
 
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST[ $nonce_action ] ) && wp_verify_nonce( $_POST[ $nonce_action ], $nonce_id ) );
	 
		// Return true if the user is able to save; otherwise, false.
		return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;
	 
	}
	
	/*
	* Hide quick edit in Fun Facts Pro the box content.
	*/
	public function replace_submit_meta_box() 
      {

          remove_meta_box('submitdiv', 'ct_afc', 'core'); // $item represents post_type
          add_meta_box('submitdiv', 'Advanced Floating Content' , array($this,'submit_meta_box'), 'ct_afc', 'side', 'low');
		  add_meta_box('ct_information', 'Code Tides' , array($this,'ct_meta_box'), 'ct_afc', 'side', 'low');
      }
	  
	  public function ct_meta_box()
	  {
			echo '<div class="ct_info" style="margin-left:-20px;"><iframe frameborder="0" width="300" height="900" src="http://www.codetides.com/free_plugin_right_side.php"></iframe></div>'; 
	   }
	  
	  
	 public function submit_meta_box() {
        global $action, $post;
       
        $post_type = $post->post_type; // get current post_type
        $post_type_object = get_post_type_object($post_type);
        $can_publish = current_user_can($post_type_object->cap->publish_posts);
       
        ?>
        <div class="submitbox" id="submitpost">
         <div id="major-publishing-actions">
         <?php
         do_action( 'post_submitbox_start' );
         ?>
         <div id="delete-action">
         <?php
         if ( current_user_can( "delete_post", $post->ID ) ) {
           if ( !EMPTY_TRASH_DAYS )
                $delete_text = esc_html__('Delete Permanently','advanced-floating-content');
           else
                $delete_text = esc_html__('Move to Trash','advanced-floating-content');
         ?>
         <a class="submitdelete deletion" href="<?php echo esc_attr(get_delete_post_link($post->ID)); ?>"><?php echo esc_attr($delete_text); ?></a><?php
         } //if ?>
        </div>
         <div id="publishing-action">
         <span class="spinner"></span>
         <?php
         if ( !in_array( $post->post_status, array('publish', 'future', 'private') ) || 0 == $post->ID ) {
              if ( $can_publish ) : ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Add Tab') ?>" />
                <?php submit_button( sprintf( __( 'Add %s' ), 'advanced-floating-content' ), 'primary button-large', 'publish', false, array( 'accesskey' => 'p' ) ); ?>
         <?php   
              endif; 
         } else { ?>
                <input name="original_publish" type="hidden" id="original_publish" value="<?php esc_attr_e('Update '); ?>" />
                <input name="save" type="submit" class="button button-primary button-large" id="publish" accesskey="p" value="<?php esc_attr_e('Update', 'advanced-floating-content'); ?>" />
         <?php
         } //if ?>
         </div>
         <div class="clear"></div>
         </div>
         </div>
        <?php
      }  	
    
    
    
    public function initialize_floating_content_options(){

        // create plugin options if not exist
        if( false == $this->options ) {
            add_option( 'ct_afc_options' );
            add_option('verified_purchase', '0');
            add_option('ct_afc_installed_date', current_time( 'timestamp' ));
            add_option('ct_afc_remind_later', '0');
            add_option('ct_afc_remind_date', '');
        }
    }
    
    
    
	public function floating_content_admin_notice(){
		// Check if user permanently dismissed
		$user_id = get_current_user_id();
		$dismissed_permanently = get_user_meta($user_id, 'ct_afc_notice_dismissed', true);
		
		if ($dismissed_permanently) {
			return;
		}
		
		$installed_date = get_option('ct_afc_installed_date');
		$checked_date = strtotime('+1 month', $installed_date); 
		$remind_later = get_option('ct_afc_remind_later');
		
		// Generate nonces
		$remind_nonce = wp_create_nonce('afc_remind_nonce');
		$dismiss_nonce = wp_create_nonce('afc_dismiss_nonce');

		if(current_time('timestamp') > $checked_date){ 
			
			if($remind_later == 1){
				$remind_date = strtotime('+1 week', get_option('ct_afc_remind_date'));
				if(current_time('timestamp') < $remind_date){
					return;
				}       
			}
			
		?>
		<div class="updated settings-error notice is-dismissible afc-pro-notice">
			<div class="afc_banner">
				<button type="button" class="notice-dismiss">
					<span class="screen-reader-text">Dismiss this notice</span>
				</button>
				
				<div class="button_div">
					<a class="button button-primary" target="_blank" href="https://codetides.com/products/advanced-floating-content/">
						<?php esc_html_e('Upgrade to Pro', 'advanced-floating-content'); ?>
					</a>                
				</div>
				
				<div class="text">
					<?php 
						$text = 'You\'ve been using <strong>Advanced Floating Content</strong> for a while now. ';
						$text .= 'Upgrade to <strong>PRO</strong> for 50+ premium features:';
						echo wp_kses($text, array('strong' => array()));
					?>
					
					<ul style="margin: 8px 0; padding-left: 20px; font-size: 13px; line-height: 1.6;">
						<li><strong>Smart Tabbed Navigation</strong> – Setup 70% faster (v4.0 exclusive)</li>
						<li><strong>WooCommerce Targeting</strong> – Increase sales by 40%+</li>
						<li><strong>20+ Premium Animations</strong> – Professional entrance/exit effects</li>
						<li><strong>Auto-Scheduling</strong> – Set start/end dates automatically</li>
						<li><strong>Unlimited Floating Elements</strong> – No restrictions, any website</li>
						<li><strong>24/7 Priority Support</strong> – Get help within hours, not days</li>
					</ul>
					
					<div class="afc-notice-actions">
						<a href="#" class="btn_notification afc-remind-later" data-nonce="<?php echo esc_attr($remind_nonce); ?>">
							<?php esc_html_e('Remind Me Later', 'advanced-floating-content'); ?>
						</a>
						<span style="margin: 0 10px; color: #dcdcde;">|</span>
						<a href="#" class="afc-dismiss-permanently" data-nonce="<?php echo esc_attr($dismiss_nonce); ?>">
							<?php esc_html_e('Never Show Again', 'advanced-floating-content'); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
		
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			// Remind later
			$('.afc-remind-later').on('click', function(e) {
				e.preventDefault();
				var nonce = $(this).data('nonce');
				
				$.post(ajaxurl, {
					action: 'update_remind_later',
					nonce: nonce
				}, function(response) {
					if (response.success) {
						$('.afc-pro-notice').fadeOut(300, function() {
							$(this).remove();
						});
					}
				}).fail(function() {
					// Fallback: hide anyway
					$('.afc-pro-notice').fadeOut(300);
				});
			});
			
			// Permanent dismiss
			$('.afc-dismiss-permanently').on('click', function(e) {
				e.preventDefault();
				var nonce = $(this).data('nonce');
				
				$.post(ajaxurl, {
					action: 'afc_dismiss_permanently',
					nonce: nonce
				}, function(response) {
					if (response.success) {
						$('.afc-pro-notice').fadeOut(300, function() {
							$(this).remove();
						});
					}
				}).fail(function() {
					// Fallback: hide anyway
					$('.afc-pro-notice').fadeOut(300);
				});
			});
			
			// WordPress default dismiss button (X)
			$('.afc-pro-notice .notice-dismiss').on('click', function(e) {
				e.preventDefault();
				var nonce = '<?php echo esc_js($remind_nonce); ?>';
				
				// Set reminder for 30 days when X is clicked
				$.post(ajaxurl, {
					action: 'update_remind_later',
					nonce: nonce,
					days: 30
				}, function() {
					$('.afc-pro-notice').fadeOut(300, function() {
						$(this).remove();
					});
				}).fail(function() {
					// Fallback: hide anyway
					$('.afc-pro-notice').fadeOut(300);
				});
			});
		});
		</script>
		<?php
		}
	}

	public function afc_add_credits(){
		global $post_type;
		if( 'ct_afc' == $post_type ){								
			return esc_html__( 'If you like Advanced Floating Content ', 'advanced-floating-content' )
				. '<a href="https://wordpress.org/support/plugin/advanced-floating-content-lite/reviews/" target="_blank">'
				. esc_html__( 'please leave us a ★★★★★ rating', 'advanced-floating-content' )
				. '</a>. '
				. esc_html__( 'Many thanks from the Advanced Floating Content team in advance :)', 'advanced-floating-content' );
		}
	}

	public function update_remind_later() {
		// Verify nonce
		if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'afc_remind_nonce')) {
			wp_die('Security check failed', 403);
		}
		
		$days = isset($_POST['days']) ? intval($_POST['days']) : 7;
		$remind_date = strtotime("+{$days} days", current_time('timestamp'));
		
		update_option('ct_afc_remind_later', '1');
		update_option('ct_afc_remind_date', $remind_date);
		
		wp_send_json_success();
	}

	public function dismiss_permanently() {
		// Verify nonce
		if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'afc_dismiss_nonce')) {
			wp_die('Security check failed', 403);
		}
		
		$user_id = get_current_user_id();
		update_user_meta($user_id, 'ct_afc_notice_dismissed', time());
		
		wp_send_json_success();
	}
	public function add_plugin_row_meta($links, $file) {
		if ('advanced-floating-content-lite/advanced-floating-content.php' === $file) {
			$pro_link = sprintf(
				'<a href="%s" target="_blank" rel="noopener noreferrer" style="color: #00a32a; font-weight: 700;" onmouseover="this.style.color=\'#008a20\';" onmouseout="this.style.color=\'#00a32a\';">%s</a>',
				esc_url('https://codetides.com/products/advanced-floating-content/'),
				esc_html__('Upgrade to PRO', 'advanced-floating-content')
			);
			
			// Add PRO link before deactivate
			array_splice($links, 1, 0, array('afc_pro' => $pro_link ));
		}
		return $links;
	}
}
