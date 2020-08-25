<?php

add_theme_support("woocommerce");

function tamilano_scripts()
{
    wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/jquery-3.5.1.min.js','',true );
    wp_enqueue_script('jquery');

    wp_register_script('custom', get_stylesheet_directory_uri() . '/js/tamilano.js',array( 'jquery' ),'',true );
    wp_enqueue_script('custom');
}

function tamilano_styles()
{
    wp_register_style('custom', get_stylesheet_directory_uri() . '/css/tamilano.css', array(), '1.0', 'all');
    wp_enqueue_style('custom');
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function footer_widgets() {

	register_sidebar( array(
		'name'          => 'Footer Column 1',
		'id'            => 'footer_column_1',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>'
    ) );
    
    register_sidebar( array(
		'name'          => 'Footer Column 2',
		'id'            => 'footer_column_2',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>'
    ) );
    
    register_sidebar( array(
		'name'          => 'Footer Column 3',
		'id'            => 'footer_column_3',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>'
	) );

	register_sidebar( array(
		'name'          => 'Shop sidebar',
		'id'            => 'shop',
		'before_widget' => '<div class="shop-sidebar">',
		'after_widget'  => '</div>'
	) );
}

function new_nav_menu_items($items, $args) {
 $languages = apply_filters( 'wpml_active_languages', NULL, 'skip_missing=0' );
 if ( $languages && ($args->menu->slug == 'menu-principale-dx' || $args->menu->slug == 'menu-principale-dx-ita')) {
 	if(!empty($languages)){
 		echo"<select class='lang-switcher'>";
 		foreach($languages as $l){
			$l["active"] ? $selected ="selected" : $selected ="";
			echo '<option ' .$selected.' value="'. $l['url'].'">'. $l['native_name'].'</option>';
		} 
		echo"</select>";
 	}
 }
 
 return $items;
}

function redirect_non_logged_users_to_login() {
	if (is_user_logged_in()) return;
	if (is_account_page()) {  
		wp_redirect( site_url( '/login' ) ); 
	  exit();
	}
}

// hide coupon field on the cart page
function disable_coupon_field_on_cart( $enabled ) {
	if ( is_cart() ) {
		$enabled = false;
	}
	return $enabled;
}


/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

	echo '<input type="checkbox" id="richiedi-fattura"><label for="richiedi-fattura" class="ml-1"><h2>';
	_e("Need an invoice?", "woocommerce");
	echo'</h2></label><div class="campi-fattura">';

	woocommerce_form_field( 'company', array(
        'type'          => 'text',
        'class'         => array('fake-company form-row-wide'),
        'placeholder'   => __('Company'),
		), $checkout->get_value( 'company' ));

	woocommerce_form_field( 'vat', array(
		'type'          => 'text',
		'class'         => array('fake-vat form-row-wide'),
		'placeholder'   => __('VAT number'),
		), $checkout->get_value( 'vat' ));

    woocommerce_form_field( 'cf', array(
        'type'          => 'text',
        'class'         => array('form-row-wide'),
        'placeholder'   => __('Fiscal code'),
		), $checkout->get_value( 'cf' ));
	
	woocommerce_form_field( 'sdi', array(
		'type'          => 'text',
		'class'         => array('form-row-wide'),
		'placeholder'   => __('Pec/Codice SDI'),
		), $checkout->get_value( 'sdi' ));

    echo '</div>';

}


add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {

    if ( ! empty( $_POST['cf'] ) ) {
        update_post_meta( $order_id, 'cf', sanitize_text_field( $_POST['cf'] ) );
	}
	
	if ( ! empty( $_POST['sdi'] ) ) {
        update_post_meta( $order_id, 'sdi', sanitize_text_field( $_POST['sdi'] ) );
    }
}

add_action( 'woocommerce_add_to_cart_redirect', 'prevent_duplicate_products_redirect' );
function prevent_duplicate_products_redirect( $url = false ) {
  // if another plugin gets here first, let it keep the URL
  if( !empty( $url ) ) {
    return $url;
  }
  // redirect back to the original page, without the 'add-to-cart' parameter.
  // we add the 'get_bloginfo' part so it saves a redirect on https:// sites.
  return get_bloginfo( 'wpurl' ).add_query_arg( array(), remove_query_arg( 'add-to-cart' ) );
} // end function

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
	echo '<p><strong>'.__('Fiscal code').':</strong> ' . get_post_meta( $order->id, 'cf', true ) . '</p>';
    echo '<p><strong>'.__('Pec/Codice SDI').':</strong> ' . get_post_meta( $order->id, 'sdi', true ) . '</p>';
}
/*
add_filter( 'woocommerce_cart_shipping_packages', 'split_cart_by_shipping_class' );

function split_cart_by_shipping_class($packages){	

	if(is_checkout() ){
	$packages = array();
	$new_packages =	array();
	$too_hot = false;

	if(WC()->customer->get_shipping_country() && WC()->customer->get_shipping_postcode()){
		
		$country= strtolower(WC()->customer->get_shipping_country()); 
		$city = WC()->customer->get_shipping_postcode();

		$jsonurl = "http://api.openweathermap.org/data/2.5/forecast?zip=".$city.",".$country."&units=metric&appid=587e150f13ecc4f10448d2fbd73f26fa";
		$json = file_get_contents($jsonurl);
		
			if($json){	
				$weather = json_decode($json);
				$temp = array();
				foreach ($weather->list as $day) {
					$celsius= $day->main->temp_max;
					$temp[] = $celsius;
				}

				$temp = array_filter($temp);
				if(count($temp)) {
					$average = array_sum($temp)/count($temp);
				}
				if($average > 20){
					$too_hot = true;
				}
			}else{
				wc_add_notice(__("You must enter a valid postal code for your country to calculate your shipping cost"),"notice" ); 
				return $packages;
			}

			$shipping_class = array();
			foreach ( WC()->cart->get_cart() as $item_key => $item ) {
				$shipping_class[] = $item['data']->get_shipping_class();
			}
		
			if(in_array("stef-shipping", $shipping_class) || (in_array("variable-shipping", $shipping_class) && $too_hot)){
				$sc = new WC_Product_Data_Store_CPT();
				$sc = $sc->get_shipping_class_id_by_slug("stef-shipping");
				foreach ( WC()->cart->get_cart() as $item_key => $item) {
					$item['data']->set_shipping_class_id($sc);
					$new_packages["STEF"][$item_key]  =   $item;
				}
			}else{
				$sc = new WC_Product_Data_Store_CPT();
				$sc = $sc->get_shipping_class_id_by_slug("dhl-shipping");
				foreach ( WC()->cart->get_cart() as $item_key => $item ) {
					$item['data']->set_shipping_class_id($sc);
					$new_packages["DHL"][$item_key]  =   $item;
				}
			}	

			if(is_array($new_packages)){
				foreach($new_packages as $splitted_package_items){
					$packages[] = array(
						'contents'        => $splitted_package_items,
						'contents_cost'   => array_sum( wp_list_pluck( $splitted_package_items, 'line_total' ) ),
						'applied_coupons' => WC()->cart->get_applied_coupons(),
						'user'            => array(
							'ID' => get_current_user_id(),
						),
						'destination'    => array(
							'country'    => WC()->customer->get_shipping_country(),
							'state'      => WC()->customer->get_shipping_state(),
							'postcode'   => WC()->customer->get_shipping_postcode(),
							'city'       => WC()->customer->get_shipping_city(),
							'address'    => WC()->customer->get_shipping_address(),
							'address_2'  => WC()->customer->get_shipping_address_2()
						)
					);
				}
			}
			return $packages;
		}else{
			wc_add_notice(__("You must enter a valid postal code and your country to calculate your shipping cost"),"notice"); 
			return $packages;
		}
	}
}
*/

add_action( 'woocommerce_checkout_update_order_review', 'taxexempt_checkout_based_on_vat' );
  
function taxexempt_checkout_based_on_vat( $post_data ) {
		WC()->customer->set_is_vat_exempt( false );
		parse_str( $post_data, $checkoutFields);
		$vat = $checkoutFields['billing_eu_vat_number'];
        if (WC()->customer->get_shipping_country() != "IT" && $vat) WC()->customer->set_is_vat_exempt( true );
}




add_filter( 'woocommerce_cart_shipping_method_full_label', 'change_shipping_label', 9999, 2 );
   
function change_shipping_label( $label, $method ) {

	if ($method->method_id == 'flat_rate' || $method->method_id == 'wf_dhl_shipping'){
		if ($method->cost == 0 ) {
			$new_label = _e("Free shipping", "tamilano-child-clone");
			return $new_label;
		}

		$shipping_class = array();
		foreach ( WC()->cart->get_cart() as $item_key => $item ) {
			$shipping_class[] = $item['data']->get_shipping_class();
		}
		if(in_array("stef-shipping", $shipping_class)){
			$new_label = preg_replace( '/^.+:/', _e("Controlled temperature shipping", "tamilano-child-clone"), $label );
		}else{
			$new_label = preg_replace( '/^.+:/', _e("Standard shipping", "tamilano-child-clone"), $label );
		}
	}else{
		$new_label = _e("Free shipping", "tamilano-child-clone");
	}
    
    return $new_label;
}





add_filter ( 'woocommerce_account_menu_items', 'remove_my_account_links' );
function remove_my_account_links( $menu_links ){
	unset( $menu_links['dashboard'] ); // Remove Dashboard
	unset( $menu_links['edit-address'] ); // Addresses
	unset( $menu_links['downloads'] ); // Disable Downloads
	unset( $menu_links['payment-methods'] ); // Remove Payment Methods
 
	//unset( $menu_links['orders'] ); // Remove Orders
	//unset( $menu_links['edit-account'] ); // Remove Account details tab
	//unset( $menu_links['customer-logout'] ); // Remove Logout link
 
	return $menu_links;
 
}

function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}


add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

add_action( 'woocommerce_before_checkout_form', 'remove_checkout_coupon_form', 9 );
function remove_checkout_coupon_form(){
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
}

add_filter('woocommerce_checkout_fields','custom_wc_checkout_fields_no_label');

function custom_wc_checkout_fields_no_label($fields) {
    foreach ($fields as $category => $value) {
        foreach ($fields[$category] as $field => $property) {
            unset($fields[$category][$field]['label']);
        }
    }
     return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );
function override_billing_checkout_fields( $fields ) {
	$fields['billing']['billing_first_name']['placeholder'] = esc_html('First name', 'tamilano-child-clone');
	$fields['billing']['billing_last_name']['placeholder'] = esc_html('Last name', 'tamilano-child-clone');
	$fields['billing']['billing_company']['placeholder'] = esc_html('Company (optional)', 'tamilano-child-clone');
	$fields['billing']['billing_postcode']['placeholder'] = esc_html('Postcode/ZIP', 'tamilano-child-clone');
	$fields['billing']['billing_city']['placeholder'] = esc_html('City', 'tamilano-child-clone');
	$fields['billing']['billing_phone']['placeholder'] = esc_html('Phone', 'tamilano-child-clone');
	$fields['billing']['order_comments'] = $fields['order']['order_comments'];
	$fields['billing']['order_comments']['placeholder'] = esc_html('Order notes (optional)', 'tamilano-child-clone');
	$fields['email']['billing_email'] = $fields['billing']['billing_email'];
	$fields['email']['billing_email']['placeholder'] = esc_html('Email*', 'tamilano-child-clone');
	unset($fields['billing']['billing_email'] );
	unset($fields['billing']['billing_address_2']);
	unset($fields['order']['order_comments']);
	$fields['shipping']['shipping_first_name']['placeholder'] = esc_html('First name', 'tamilano-child-clone');
	$fields['shipping']['shipping_last_name']['placeholder'] = esc_html('Last name', 'tamilano-child-clone');
	$fields['shipping']['shipping_company']['placeholder'] = esc_html('Company (optional)', 'tamilano-child-clone');
	$fields['shipping']['shipping_postcode']['placeholder'] = esc_html('Postcode/ZIP', 'tamilano-child-clone');
	$fields['shipping']['shipping_city']['placeholder'] = esc_html('City', 'tamilano-child-clone');
	unset($fields['shipping']['shipping_address_2']);
	unset($fields['shipping']['shipping_company'] );
    return $fields;
}

add_filter('woocommerce_default_address_fields', 'wc_override_address_fields');
	function wc_override_address_fields( $fields ) {
	$fields['address_1']['placeholder'] = 'Street Address';
	return $fields;
}

add_filter('woocommerce_package_rates', 'set_flat_rate', 10, 2);
function set_flat_rate( $rates, $package ){
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) 
		return $rates;		
		$cart_total = WC()->cart->subtotal;

		$shipping_class = array();
		foreach ( WC()->cart->get_cart() as $item_key => $item ) {
			$shipping_class[] = $item['data']->get_shipping_class();
		}

		$destination_state = $package['destination']['country'];
        foreach ( $rates as $rate_key => $rate ){
            if( $rate->method_id === 'flat_rate' ){
				if(in_array("stef-shipping", $shipping_class)){
					if($destination_state == "IT"){
						if($cart_total<10){
							$rates[$rate_key]->cost = 24;
						}else if($cart_total<21){
							$rates[$rate_key]->cost = 16;
						}else if($cart_total<25){
							$rates[$rate_key]->cost = 14;
						}else if($cart_total<31){
							$rates[$rate_key]->cost = 12;
						}else if($cart_total<36){
							$rates[$rate_key]->cost = 6;
						}else if($cart_total<41){
							$rates[$rate_key]->cost = 4;
						}else{
							$rates[$rate_key]->cost = 0;
						}
					}else{
						unset($rates['wf_dhl_shipping:U|U']);
						unset($rates[$rate_key]);
					}
				}else{
					if($destination_state == "IT"){
						if($cart_total<14){
							$rates[$rate_key]->cost = 9;
						}else if($cart_total<20){
							$rates[$rate_key]->cost = 5;
						}else if($cart_total<25){
							$rates[$rate_key]->cost = 4;
						}else if($cart_total<30){
							$rates[$rate_key]->cost = 2;
						}else{
							$rates[$rate_key]->cost = 0;
						}
					}else{
						
						unset($rates['flat_rate:5']);
					}
				}
            }
        }
    return $rates;
}

function loop_columns() {
	return 1;
}



function lw_loop_shop_per_page() {
 return 12;
}
 
function add_custom_field_to_variations( $loop, $variation_data, $variation ) {
	woocommerce_wp_textarea_input( array(
	'id' => 'custom_field[' . $loop . ']',
	'class' => 'short',
	'label' => __( 'Ingredients', 'woocommerce' ),
	'value' => get_post_meta( $variation->ID, 'custom_field', true )
	)
);
}
 
function save_custom_field_variations( $variation_id, $i ) {
	$custom_field = $_POST['custom_field'][$i];
	if ( isset( $custom_field ) ) update_post_meta( $variation_id, 'custom_field', esc_attr( $custom_field ) );
}
  
function add_custom_field_variation_data( $variations ) {
$variations['custom_field'] = '<div class="woocommerce_custom_field">Ingredients: <span>' . get_post_meta( $variations[ 'variation_id' ], 'custom_field', true ) . '</span></div>';
return $variations;
}

function woocommerce_product_custom_fields(){
	global $woocommerce, $post;
	$product = wc_get_product($post->ID);
	if($product->is_type( 'simple' )){
		echo '<div class="product_custom_field">';
		woocommerce_wp_textarea_input(
			array(
				'id' => '_ingredients',
				'label' => __('Ingredients', 'woocommerce')
			)
		);
		echo '</div>';
	}
}

function woocommerce_product_custom_fields_save($post_id){
    $woocommerce_custom_procut_textarea = $_POST['_ingredients'];
    if (!empty($woocommerce_custom_procut_textarea))
        update_post_meta($post_id, '_ingredients', esc_html($woocommerce_custom_procut_textarea));
}


/* ACTION AND FILTERS */

add_filter('loop_shop_columns', 'loop_columns', 999);
add_filter('loop_shop_per_page', 'lw_loop_shop_per_page', 30 );

add_action( 'woocommerce_variation_options_pricing', 'add_custom_field_to_variations', 10, 10 );
add_action( 'woocommerce_save_product_variation', 'save_custom_field_variations', 10, 2 );
add_filter( 'woocommerce_available_variation', 'add_custom_field_variation_data' );


add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');

remove_action( 'woocommerce_before_main_content', 'action_woocommerce_before_main_content', 10, 2 ); 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_cart' );
add_filter('wp_nav_menu_items', 'new_nav_menu_items', 10, 2);
add_action('get_header', 'redirect_non_logged_users_to_login' );
add_action('widgets_init', 'footer_widgets' );
add_action('wp_enqueue_scripts', 'tamilano_scripts');
add_action('wp_enqueue_scripts', 'tamilano_styles');


?>
