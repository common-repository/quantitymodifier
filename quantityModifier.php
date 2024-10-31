<?php
/*
Plugin Name: quantityModifier
Plugin URI: http://Hypertext-Studios.com/
Description: Adds buttons on product pages that quickly change the quantity the user wishes to add to their cart of a single item.
Author: Kaser
Version: 0.1
Author URI: andrewkaser.com
*/

/*
 * actions
 */
add_action( 'admin_menu', 'quantityModifier_menu' );
add_action( 'wp_enqueue_scripts', 'quantityModifier_adding_scripts' );
add_action( 'admin_enqueue_scripts', 'quantityModifier_adding_admin_scripts' );

/*
 * create submenu page in /wp-admin/
 */
function quantityModifier_menu()
{
	add_submenu_page('options-general.php', 'quantityModifier', 'quantityModifier', 'manage_options', 'quantityModifier', 'quantityModifier_options' );
}

/*
 * Structure of settings page
 */
function quantityModifier_options()
{
	?>
	<div class="wrap">
		<h1 class="wp-heading-inline">quantityModifier</h1>
		<p>There are currently no settings.</p>
	</div>
	<?php
}


/*
 * hook to woocommerce add to cart button
 */
add_filter('woocommerce_short_description', 'quantityModifier_product_qty_options', 10, 2);

/*
 * Output the options to modify quantity
 */
function quantityModifier_product_qty_options( $content )
{
	$content .= 'Quantity Quick Add Buttons : <br /><button value="5" class="qtyMdfr">+5</button>&nbsp;<button value="25" class="qtyMdfr">+25</button>&nbsp;<button value="50" class="qtyMdfr">+50</button>';

	return $content;
 
}

/*
 * load styles and JS for front end of website.
 */
function quantityModifier_adding_scripts()
{
	wp_register_style( 'quantityModifier_style', plugins_url( 'assets/css/quantityModifier.css', __FILE__) );
	wp_enqueue_style( 'quantityModifier_style' );
	wp_register_script( 'quantityModifier_script', plugins_url('assets/js/quantityModifier.js', __FILE__), array('jquery'), '1.1', true );
	wp_enqueue_script( 'quantityModifier_script' );
}

/*
 * load styles and js for wp-admin page
 */
function quantityModifier_adding_admin_scripts()
{
	wp_register_style( 'quantityModifiern_admin_style', plugins_url( 'assets/css/admin_quantityModifier.css', __FILE__) );
	wp_enqueue_style( 'quantityModifier_admin_style' );
	wp_register_script( 'quantityModifier_admin_script', plugins_url('assets/js/admin_quantityModifier.js', __FILE__), array('jquery'), '1.1', true );
	wp_enqueue_script( 'quantityModifier_admin_script' );
}
?>