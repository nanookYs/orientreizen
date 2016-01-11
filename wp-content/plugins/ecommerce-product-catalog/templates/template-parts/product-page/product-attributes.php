<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * The template to display product attributes on product page or with a shortcode
 *
 * Copy it to your theme implecode folder to edit the output: your-theme-folder-name/implecode/product-attributes.php
 *
 * @version		1.1.2
 * @package		ecommerce-product-catalog/templates/template-parts/product-page
 * @author 		Norbert Dreszer
 */
$single_names		 = get_single_names();
$product_id			 = ic_get_product_id();
$attributes_number	 = product_attributes_number();
$table				 = '';
if ( $attributes_number > 0 && has_product_any_attributes( $product_id ) ) {
	?>
	<div id="product_features" class="product-features">
		<h3><?php echo $single_names[ 'product_features' ] ?></h3>
		<table class="features-table"><?php
			for ( $i = 1; $i <= $attributes_number; $i++ ) {
				$attribute_value = get_attribute_value( $i, $product_id );
				if ( !empty( $attribute_value ) ) {
					?>
					<tr>
						<td class="attribute-label-single"><?php echo get_attribute_label( $i, $product_id ) ?></td>
						<td class="attribute-value-unit-single"><span class="attribute-value-single"><?php echo $attribute_value ?></span> <span class="attribute-unit-single"><?php echo get_attribute_unit( $i, $product_id ) ?></span></td>
					</tr><?php
				}
			}
			?>
		</table>
	</div><?php
}