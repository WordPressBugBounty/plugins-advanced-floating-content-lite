<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.codetides.com/
 * @since      1.0.0
 *
 * @package    Advanced_Floating_Content
 * @subpackage Advanced_Floating_Content/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advanced_Floating_Content
 * @subpackage Advanced_Floating_Content/public
 * @author     Code Tides <contact@codetides.com>
 */
class Advanced_Floating_Content_Public {

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

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
  
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

	

	}
	
	/*
	* Display Floating Content
	*/
	public function load_floating_content()
	{
			$args = array( 
			  'post_type' => 'ct_afc', 
			  'posts_per_page' => -1,
			  'post_status' => 'publish',
			  'order' => 'ASC'
			);
			$floating_query = new WP_Query( $args );
			//echo $floating_query->found_posts;
			$css = "";
            global $content;
			if ( $floating_query->have_posts() ) :
				while ( $floating_query->have_posts() ) : $floating_query->the_post();
					$id_afc = $floating_query->post->ID;
					$control_device_medium = get_post_meta( $id_afc, 'ct_afc_control_devices_medium', true );
					// Check if the current device matches the hide condition and skip the post if it does.
					if ( $control_device_medium == 1 && !wp_is_mobile() ) {
						// Hide on web/desktop/laptop
						continue;
					}

					if ( $control_device_medium == 2 && wp_is_mobile() ) {
						// Hide on all mobile devices
						continue;
					}
					
					$css .= $this->css_styling($floating_query->post->ID);
					$content .= '<div id="afc_sidebar_'.$id_afc.'" class="afc_popup">';
					$close_btn = get_post_meta( $id_afc, 'ct_afc_close_button', true );
					if($close_btn=="yes"){							
						$content .='<a href="#" class="afc_close_content"><img src="'.plugins_url( 'images/close.png', __FILE__ ).'" class="img" alt="advanced-floating-content-close-btn" /></a>';
					}
					
					$content .= get_the_content();
					$content .='</div>';					
					//exit;
					
				endwhile;
			endif;
		//	echo $css;
			$output_css = $css.'.afc_popup .img{position:absolute; top:-15px; right:-15px;}';
					$output = $content;
					$output_js ="
                                    (function ($) {
                                        $('.afc_close_content').click(function(){			
                                            var afc_content_id = $(this).closest('div').attr('id');
                                            $('#'+afc_content_id).hide();
                                        });
                                    })(jQuery);
                                ";		
                                            
            $allowed_html = wp_kses_allowed_html( 'post' );
            wp_enqueue_style( $this->plugin_name.'-lite', plugin_dir_url( __FILE__ ) . 'css/advanced-floating-content-public.css', array(), $this->version, 'all');
            wp_add_inline_style( $this->plugin_name.'-lite', $output_css );
            wp_enqueue_script( $this->plugin_name.'-lite', plugin_dir_url( __FILE__ ) . 'js/advanced-floating-content-public.js', array( 'jquery' ), $this->version, false );
            wp_add_inline_script( $this->plugin_name.'-lite', $output_js);
            echo wp_kses( $output, $allowed_html );
			wp_reset_query();
	}
	
	
	public function css_styling($id_afc) {
		
		
					$position = get_post_meta( $id_afc, 'ct_afc_position_place', true );
					$position_y = get_post_meta( $id_afc, 'ct_afc_position_y', true );
					$position_x = get_post_meta( $id_afc, 'ct_afc_position_x', true );
					
					$width = get_post_meta( $id_afc, 'ct_afc_width', true );
					$width_unit = get_post_meta( $id_afc, 'ct_afc_width_unit', true );
					$background_color = get_post_meta( $id_afc, 'ct_afc_background_color', true );
					$margin = get_post_meta( $id_afc, 'ct_afc_margin_top', true ).'px '.get_post_meta( $id_afc, 'ct_afc_margin_right', true ).'px '.get_post_meta( $id_afc, 'ct_afc_margin_bottom', true ).'px '.get_post_meta( $id_afc, 'ct_afc_margin_left', true ).'px';
					$border_top = get_post_meta( $id_afc, 'ct_afc_border_top', true ).'px' . get_post_meta( $id_afc, 'ct_afc_border_type', true ). ' '.get_post_meta( $id_afc, 'ct_afc_border_color', true );
					$border_right = get_post_meta( $id_afc, 'ct_afc_border_right', true ).'px' . get_post_meta( $id_afc, 'ct_afc_border_type', true ). ' '.get_post_meta( $id_afc, 'ct_afc_border_color', true );
					$border_bottom = get_post_meta( $id_afc, 'ct_afc_border_bottom', true ).'px' . get_post_meta( $id_afc, 'ct_afc_border_type', true ). ' '.get_post_meta( $id_afc, 'ct_afc_border_color', true );
					$border_left = get_post_meta( $id_afc, 'ct_afc_border_left', true ).'px' . get_post_meta( $id_afc, 'ct_afc_border_type', true ). ' '.get_post_meta( $id_afc, 'ct_afc_border_color', true );
					$border_radius = get_post_meta( $id_afc, 'ct_afc_border_radius', true );
					
					
					$classes = "#afc_sidebar_".$id_afc."{"."background:".$background_color.";";			
					if($position=="fixed") {
					$classes .="position:fixed;";
					}
					if($position=="absolute") {
					$classes .="position:absolute;";
					}			
					if($position_y=="top") {
					$classes .="top:0px;";
					}
					if($position_y=="bottom") {
					$classes .="bottom:0px;";
					}
					if($position_x=="left") {
					$classes .="left:0px;";
					}
					if($position_x=="right") {
					$classes .="right:0px;";
					}
					$classes .="width:".$width.$width_unit.";";
					$classes .="margin:".$margin.';';
					
					
					if($border_radius==1) {
						$classes .="border-radius:".get_post_meta( $id_afc, 'ct_afc_border_top', true ).'px '. get_post_meta( $id_afc, 'ct_afc_border_right', true ).'px '.get_post_meta( $id_afc, 'ct_afc_border_bottom', true ).'px '.get_post_meta( $id_afc, 'ct_afc_border_left', true ).'px'.';';
						$classes .="-moz-border-radius:".get_post_meta( $id_afc, 'ct_afc_border_top', true ).'px '. get_post_meta( $id_afc, 'ct_afc_border_right', true ).'px '.get_post_meta( $id_afc, 'ct_afc_border_bottom', true ).'px '.get_post_meta( $id_afc, 'ct_afc_border_left', true ).'px'.';';
						$classes .="-webkit-border-radius: ".get_post_meta( $id_afc, 'ct_afc_border_top', true ).'px '. get_post_meta( $id_afc, 'ct_afc_border_right', true ).'px '.get_post_meta( $id_afc, 'ct_afc_border_bottom', true ).'px '.get_post_meta( $id_afc, 'ct_afc_border_left', true ).'px'.';';
					}
					$classes .="z-index:999999;";
					$classes .="padding:10px;";
					$classes .="color:#ffffff;";				
					$classes .="}"."\n";
					/*
					global $responsive_view_320,$responsive_view_480;
					$responsive_view_320 .= "#afc_sidebar_".$id_afc."{";
					$responsive_view_320 .= "width:".(300-((get_post_meta( $id_afc, 'ct_afc_border_left', true )+get_post_meta( $id_afc, 'ct_afc_border_right', true ))*2))."px !important";
					$responsive_view_320 .="}"."\n";
					
					$responsive_view_480 .= "#afc_sidebar_".$id_afc."{";
					$responsive_view_480 .= "width:".(460-((get_post_meta( $id_afc, 'ct_afc_border_left', true )+get_post_meta( $id_afc, 'ct_afc_border_right', true ))*2))."px !important";
					$responsive_view_480 .="}";
					*/
					return $classes;
	}
	function wp_is_mobile() {
		if ( empty( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$is_mobile = false;
		} elseif (
			preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $_SERVER['HTTP_USER_AGENT'] ) ||
			preg_match( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr( $_SERVER['HTTP_USER_AGENT'], 0, 4 ) )
		) {
			$is_mobile = true;
		} else {
			$is_mobile = false;
		}

		return $is_mobile;
	}
}
