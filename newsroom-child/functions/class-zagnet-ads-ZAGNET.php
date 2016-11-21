<?php
/**
 * ZAGNET ADS
 */
class zagnet_Ads_ZAGNET {
	/**
	 * Class variables
	 */
	var $ajax_action = 'zagnet_ad';
	var $ajax_url = 'wp-admin/admin-ajax.php';
	var $ad_base_url = '//www.googletagservices.com/tag/js/gpt.js';
	var $client_id = 'div-gpt-ad-1427688969360';
	protected $pattern_slot = '#[^A-Z0-9\-_]+#i';

	/**
	 * Register actions and filters
	 *
	 * @uses add_action, add_filter
	 * @return null
	 */
	public function __construct() {

		add_action( 'wp_ajax_' . $this->ajax_action, array( $this, 'ajax' ) );
		add_action( 'wp_ajax_nopriv_' . $this->ajax_action, array( $this, 'ajax' ) );

		add_filter( 'acm_default_url', array( $this, 'filter_acm_default_url' ) );
		add_filter( 'acm_ad_tag_ids', array( $this, 'filter_acm_ad_tag_ids_GRIONET' ) );
		add_filter( 'acm_output_tokens', array( $this, 'filter_acm_output_tokens_GRIONET' ) );
		add_filter( 'acm_whitelisted_conditionals', array( $this, 'filter_acm_whitelisted_conditionals' ) );
		add_filter( 'acm_whitelisted_script_urls', array( $this, 'filter_acm_whitelisted_script_urls' ) );
		add_filter( 'acm_output_html', array( $this, 'filter_acm_output_html' ), 10, 2 );
	}

	/**
	 * Render ad code via Ajax.
	 * Used within an iframe to support ad refreshes within galleries.
	 *
	 * @uses esc_url
	 * @action wp_ajax_zagnet_ad, wp_ajax_nopriv_zagnet_ad
	 * @return string
	 */
	public function ajax() {
		?>
			<!DOCTYPE html>
			<html>
				<head>
					<style type="text/css">
						body { text-align: center; margin: 0 auto; }
					</style>

					<?php
						global $wp_scripts;
						$wp_scripts->do_item( 'jquery-core' );
					?>

					<script type="text/javascript">
						jQuery( document ).ready( function( $ ) {
							var x = setTimeout( function() {
								var frameHeight = document.documentElement.scrollHeight;
								if(window.parent.iframeLoaded)
									window.parent.iframeLoaded( window.name, frameHeight );
							} , 2000 );

						});

					</script>
				</head>
				<body>
					<?php if ( isset( $_GET[ 'src' ] ) && parse_url( $_GET[ 'src' ], PHP_URL_HOST ) == parse_url( $this->ad_base_url, PHP_URL_HOST ) ) : ?>
						<?php $source = $_GET[ 'src' ]; ?>
						<script type="text/javascript" src="<?php echo esc_url( $source ); ?>"></script>
					<?php endif; ?>
				</body>
			</html>
		<?php
		die;
	}

	/**
	 * Render ad tag or iframe for posts
	 *
	 * @param string $slot
	 * @uses is_singular, has_post_format, add_query_arg esc_url, home_url, do_action
	 * @return string
	 */
	public function get_ad( $slot = false ) {

		$slot = preg_replace( $this->pattern_slot, '', $slot );

		if ( empty( $slot ) )
			return;

		if ( is_home() || ( is_singular() && ( has_post_format( 'gallery' ) || ( strpos( get_queried_object()->post_content,  '[polldaddy ' ) !== false ) ) ) ) {
			//Get ad tag within requested context to ensure that conditional tags are properly populated.
			do_action( 'acm_tag', $slot );
		}
		else {
			do_action( 'acm_tag', $slot );
		}
	}

	/**
	 * Set ZAGNET Ad URL
	 *
	 * @param string $url
	 * @filter acm_default_url
	 * @return string
	 */
	public function filter_acm_default_url( $url ) {
			return $url;
	}

    /**
     * Set ZAGNET ad slots
     *
     * @filter acm_ad_tag_ids
     * @return array
     */
    public function filter_acm_ad_tag_ids_GRIONET() {
        return array(
            //160x600
            array(
                'tag' => '160x600',
                'url_vars' => array(
                    'sz' => '160x600',
                    'width' => '160',
                    'height' => '600',
                    'slot' => '0',
                    'suffix' => '',
                )
            ),
            //160x600_BTF
            array(
                'tag' => '160x600_BTF',
                'url_vars' => array(
                    'sz' => '160x600',
                    'width' => '160',
                    'height' => '600',
                    'slot' => '1',
                    'suffix' => '',
                )
            ),
            //300x250
            array(
                'tag' => '300x250',
                'url_vars' => array(
                    'sz' => '300x250',
                    'width' => '300',
                    'height' => '250',
                    'slot' => '2',
                    'suffix' => '',
                )
            ),
            //300x250_BTF
            array(
                'tag' => '300x250_BTF',
                'url_vars' => array(
                    'sz' => '300x250',
                    'width' => '300',
                    'height' => '250',
                    'slot' => '3',
                    'suffix' => '',
                )
            ),
            //300x250_BTF2
            array(
                'tag' => '300x250_BTF2',
                'url_vars' => array(
                    'sz' => '300x250',
                    'width' => '300',
                    'height' => '250',
                    'slot' => '4',
                    'suffix' => '',
                )
            ),
            //300x250_BTF3
            array(
                'tag' => '300x250_BTF3',
                'url_vars' => array(
                    'sz' => '300x250',
                    'width' => '300',
                    'height' => '250',
                    'slot' => '5',
                    'suffix' => '',
                )
            ),
            //300x600
            array(
                'tag' => '300x600',
                'url_vars' => array(
                    'sz' => '300x600',
                    'width' => '300',
                    'height' => '600',
                    'slot' => '6',
                    'suffix' => '',
                )
            ),
            //Leaderboard
            array(
                'tag' => 'Leaderboard',
                'url_vars' => array(
                    'sz' => '728x90',
                    'width' => '728',
                    'height' => '90',
                    'slot' => '7',
                    'suffix' => '',
                )
            ),
            //Leaderboard_BTF
            array(
                'tag' => 'Leaderboard_BTF',
                'url_vars' => array(
                    'sz' => '728x90',
                    'width' => '728',
                    'height' => '90',
                    'slot' => '8',
                    'suffix' => '',
                )
            ),
            // Mobile 300x250
            array(
                'tag' => 'W-Mobile_300x250',
                'url_vars' => array(
                    'sz' => '300x250',
                    'width' => '300',
                    'height' => '250',
                    'slot' => '11',
                )
            ),
            // Mobile 300x250 BTF
            array(
                'tag' => 'W-Mobile_300x250_BTF',
                'url_vars' => array(
                    'sz' => '300x250',
                    'width' => '300',
                    'height' => '250',
                    'slot' => '12',
                )
            ),
            // Mobile 300x250 BTF2
            array(
                'tag' => 'W-Mobile_300x250_BTF2',
                'url_vars' => array(
                    'sz' => '300x250',
                    'width' => '300',
                    'height' => '250',
                    'slot' => '13',
                )
            ),
            // Mobile 320x50
            array(
                'tag' => 'W-Mobile_320x50',
                'url_vars' => array(
                    'sz' => '320x50',
                    'width' => '320',
                    'height' => '50',
                    'slot' => '15',
                )
            ),
            // Mobile 320x50 BTF
            array(
                'tag' => 'W-Mobile_320x50_BTF',
                'url_vars' => array(
                    'sz' => '320x50',
                    'width' => '320',
                    'height' => '50',
                    'slot' => '16',
                )
            ),
            // Mobile 320x50 BTF1
            array(
                'tag' => 'W-Mobile_320x50_BTF2',
                'url_vars' => array(
                    'sz' => '320x50',
                    'width' => '320',
                    'height' => '50',
                    'slot' => '17',
                )
            ),
            // Mobile 320x50 BTF2
            array(
                'tag' => 'W-Mobile_320x50_BTF3',
                'url_vars' => array(
                    'sz' => '320x50',
                    'width' => '320',
                    'height' => '50',
                    'slot' => '18',
                )
            )
        );
    }

	/**
	 * Filter ZAGNET Ads output tokens to override $DEFAULT
	 *
	 * @param array $output_tokens
	 * @uses is_home, is_front_page, is_tax, get_queried_object, is_single, get_the_terms, get_the_ID, is_category, get_query_var, is_tag, get_queried_object_id
	 * @filter acm_output_tokens
	 * @return array
	 */
	public function filter_acm_output_tokens_GRIONET( $output_tokens ) {
		//Dynamic zone values
		if ( '$DEFAULT' == $output_tokens[ '%zone1%' ] ) {
			if ( is_home() || is_front_page() ) {
				$output_tokens[ '%zone1%' ] = 'home';
			} else {
				$output_tokens[ '%zone1%' ] = 'ros';
			}
		}
		return $output_tokens;
	}

	/**
	 * Extend permitted conditional tags for use in ZAGNET Ads Manager
	 *
	 * @param array $conditionals
	 * @filter filter_acm_whitelisted_conditionals
	 * @return array
	 */
	public function filter_acm_whitelisted_conditionals( $conditionals ) {
		$conditionals[] = 'is_tax';

		return $conditionals;
	}

	/**
	 * Set ZAGNET Ads Manager URL whitelist
	 *
	 * @param array $whitelisted_urls
	 * @filter acm_whitelisted_script_urls
	 * @return array
	 */
	public function filter_acm_whitelisted_script_urls( $whitelisted_urls ) {
		return array( 'www.googletagservices.com', 'googletagservices.com');
	}

    /**
     * Filter the output html for ads
     * @param type $output_html
     * @return html
     * @filter acm_output_html
     */
    function filter_acm_output_html($output_html, $tag_id) {
        ?>
        <!-- Slot names with slot numbers -->
        <script type='text/javascript'>
        <?php if ('160x600' == $tag_id) {
            $slotnumber = '0';
            ?>
        <?php } ?>
        <?php if ('160x600_BTF' == $tag_id) {
            $slotnumber = '1';
            ?>
        <?php } ?>
        <?php if ('300x250' == $tag_id) {
            $slotnumber = '2';
            ?>
        <?php } ?>
        <?php if ('300x250_BTF' == $tag_id) {
            $slotnumber = '3';
            ?>
        <?php } ?>
        <?php if ('300x250_BTF2' == $tag_id) {
            $slotnumber = '4';
            ?>
        <?php } ?>
        <?php if ('300x250_BTF3' == $tag_id) {
            $slotnumber = '5';
            ?>
        <?php } ?>
        <?php if ('300x600' == $tag_id) {
            $slotnumber = '6';
            ?>
        <?php } ?>
        <?php if ('Leaderboard' == $tag_id) {
            $slotnumber = '7';
            ?>
        <?php } ?>
        <?php if ('Leaderboard_BTF' == $tag_id) {
            $slotnumber = '8';
            ?>
        <?php } ?>
        <?php if ('W-Mobile_300x250' == $tag_id) {
            $slotnumber = '11';
            ?>
        <?php } ?>
        <?php if ('W-Mobile_300x250_BTF' == $tag_id) {
            $slotnumber = '12';
            ?>
        <?php } ?>
        <?php if ('W-Mobile_300x250_BTF2' == $tag_id) {
            $slotnumber = '13';
            ?>
        <?php } ?>
        <?php if ('W-Mobile_320x50' == $tag_id) {
            $slotnumber = '15';
            ?>
        <?php } ?>
        <?php if ('W-Mobile_320x50_BTF' == $tag_id) {
            $slotnumber = '16';
            ?>
        <?php } ?>
        <?php if ('W-Mobile_320x50_BTF2' == $tag_id) {
            $slotnumber = '17';
            ?>
        <?php } ?>
        <?php if ('W-Mobile_320x50_BTF3' == $tag_id) {
            $slotnumber = '18';
            ?>
        <?php } ?>
        </script>
        <?php
        ob_start();
        ?>
        <!-- GRIONET1-<?php echo esc_html($tag_id); ?> -->
            <?php
            if (is_home() || is_front_page()) {
                $targeturl = 'home';
                $categoryurl = 'home';
            } else {
                $url = parse_url(get_permalink($post_id));
                $targeturl = substr($url['path'], 0, 40);
                $category = get_the_category($post_id);
                $categoryurl = $category[0]->name;
            }
            ?>

        <?php if ($tag_id == '160x600') {
            ?>
            <div id='GRIONET1-160x600'>
                    <?php
                } elseif ($tag_id == '160x600_BTF') {
                    ?>
                <div id='GRIONET1-160x600_BTF'>
                <?php
            }
            ?>
                <div id='div-gpt-ad-1477973619953-<?php echo (int) $slotnumber; ?>' style='<?php if ($tag_id == 'Leaderboard') echo 'margin-right:auto; margin-left:auto;'; ?><?php if ($tag_id == 'Leaderboard_BTF') echo 'margin-right:auto; margin-left:auto;'; ?>'>
                    <script type='text/javascript'>
                        googletag.cmd.push(function() {
                            googletag.display('div-gpt-ad-1477973619953-<?php echo (int) $slotnumber; ?>');
                        });
                    </script>
                </div>
        <?php if ($tag_id == '160x600') {
            ?>
                </div>
            <?php
        } elseif ($tag_id == '160x600_BTF') {
            ?>
            </div>
            <?php
        }
        add_rewrite_rule('gpt', '/wp-admin/admin-ajax.php', 'top');
        return ob_get_clean();
    }

}

/**
 * Render ad tag or iframe for posts
 *
 * @param string $slot
 * @uses zagnet_singleton
 * @return string
 */
function zagnet_ad_ZAGNET( $slot = false ) {
	zagnet_singleton( 'zagnet_Ads_ZAGNET' )->get_ad( $slot );
}


class zagnet_ACM_ZAGNET_Ad_Zones extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'zagnet_ACM_ZAGNET_Ad_Zones', // Base ID
			__('ZAGNET ad Zones', 'text_domain'), // Name
			array( 'description' => __( 'Refreshable ads', 'text_domain' ), ) // Args
		);
	}

	// Build the widget settings form
	function form( $instance ) {
		$defaults = array(
			'ad_zone' => '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$zone = $instance['ad_zone'];
		global $ad_code_manager;
		?>
			<p>
			<?php if ( !empty( $ad_code_manager->ad_codes ) ): ?>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ad_zone' ) ); ?>">Choose Ad Zone</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'ad_zone' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ad_zone' ) ); ?>">
				<?php

				foreach ( $ad_code_manager->ad_codes as $key => $value ) {
				?>
					<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $zone ); ?>><?php echo esc_html( $key ); ?></option>
					<?php
				}
				?>
			</select>
			<?php else: ?>
			<?php $create_url = add_query_arg( 'page', $ad_code_manager->plugin_slug, admin_url( 'tools.php' ) ); ?>
			<span class="description"><?php echo esc_html( sprintf( __( "No ad codes have been added yet. <a href='%s'>Please create one</a>.", 'ad-code-manager' ), $create_url ) ); ?></span>
			<?php endif; ?>
			</p>
		<?php
	}

	// Save the widget settings
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['ad_zone'] = sanitize_text_field( $new_instance['ad_zone'] );
		return $instance;
	}

	// Display the widget
	function widget( $args, $instance ) {
		$defaults = array(
			'before_widget' => '',
			'after_widget' => '',
		);
		$args = wp_parse_args( (array) $args, $defaults );

		echo $args[ 'before_widget' ];
		if ( isset( $instance[ 'ad_zone' ] ) ) {
			zagnet_ad_ZAGNET( $instance['ad_zone'] );
		}
		echo $args[ 'after_widget' ];
	}
}

function zagnet_register_acm_widget_ZAGNET(){
	register_widget( 'zagnet_ACM_ZAGNET_Ad_Zones' );
}
add_action( 'widgets_init', 'zagnet_register_acm_widget_ZAGNET' );
