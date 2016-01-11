<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The template to display product description on product page or with a shortcode
 *
 * Copy it to your theme implecode folder to edit the output: your-theme-folder-name/implecode/product-description.php
 *
 * @version		1.1.2
 * @package		ecommerce-product-catalog/templates/template-parts/product-page
 * @author 		Norbert Dreszer
 */
$product_id			 = ic_get_product_id();
$product_description = get_product_description( $product_id );
if ( !empty( $product_description ) ) {
	?>
	<div class="product-description"><?php
		if ( get_integration_type() == 'simple' ) {
			echo apply_filters( 'product_simple_description', $product_description );
		} else {
			echo apply_filters( 'the_content', $product_description );
		}
		?>
	</div>
	<?php
}