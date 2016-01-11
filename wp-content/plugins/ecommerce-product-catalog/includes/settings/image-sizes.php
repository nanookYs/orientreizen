<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Manages attributes settings
 *
 * Here attributes settings are defined and managed.
 *
 * @version		1.1.4
 * @package		ecommerce-product-catalog/functions
 * @author 		Norbert Dreszer
 */
add_action( 'admin_init', 'ic_add_wp_screens_settings' );

function ic_add_wp_screens_settings() {
	add_settings_section( 'default', __( 'Product Catalog Images', 'ecommerce-product-catalog' ), 'ic_catalog_image_sizes_settings', 'media' );
}

function ic_catalog_image_sizes_settings() {
	$images = ic_get_catalog_image_sizes();
	?>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row"><?php _e( 'Product Page Image', 'ecommerce-product-catalog' ) ?></th>
				<td><fieldset><legend class="screen-reader-text"><span>Large size</span></legend>
						<label for="product_page_image_w"><?php _e( 'Max Width' ) ?></label>
						<input name="catalog_image_sizes[product_page_image_w]" type="number" step="1" min="0" id="product_page_image_w" value="<?php echo $images[ 'product_page_image_w' ] ?>" class="small-text">
						<label for="product_page_image_h"><?php _e( 'Max Height' ) ?></label>
						<input name="catalog_image_sizes[product_page_image_h]" type="number" step="1" min="0" id="product_page_image_h" value="<?php echo $images[ 'product_page_image_h' ] ?>" class="small-text">
					</fieldset></td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Product Category Page Image', 'ecommerce-product-catalog' ) ?></th>
				<td><fieldset><legend class="screen-reader-text"><span>Large size</span></legend>
						<label for="product_category_page_image_w"><?php _e( 'Max Width' ) ?></label>
						<input name="catalog_image_sizes[product_category_page_image_w]" type="number" step="1" min="0" id="product_category_page_image_w" value="<?php echo $images[ 'product_category_page_image_w' ] ?>" class="small-text">
						<label for="product_category_page_image_h"><?php _e( 'Max Height' ) ?></label>
						<input name="catalog_image_sizes[product_category_page_image_h]" type="number" step="1" min="0" id="product_category_page_image_h" value="<?php echo $images[ 'product_category_page_image_h' ] ?>" class="small-text">
					</fieldset></td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Modern Grid Image', 'ecommerce-product-catalog' ) ?></th>
				<td><fieldset><legend class="screen-reader-text"><span>Large size</span></legend>
						<label for="modern_grid_image_w"><?php _e( 'Max Width' ) ?></label>
						<input name="catalog_image_sizes[modern_grid_image_w]" type="number" step="1" min="0" id="product_page_image_w" value="<?php echo $images[ 'modern_grid_image_w' ] ?>" class="small-text">
						<label for="modern_grid_image_h"><?php _e( 'Max Height' ) ?></label>
						<input name="catalog_image_sizes[modern_grid_image_h]" type="number" step="1" min="0" id="product_page_image_h" value="<?php echo $images[ 'modern_grid_image_h' ] ?>" class="small-text"><br>
					</fieldset></td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Classic Grid Image', 'ecommerce-product-catalog' ) ?></th>
				<td><fieldset><legend class="screen-reader-text"><span><?php _e( 'Classic Grid Image', 'ecommerce-product-catalog' ) ?></span></legend>
						<label for="classic_grid_image_w"><?php _e( 'Max Width' ) ?></label>
						<input name="catalog_image_sizes[classic_grid_image_w]" type="number" step="1" min="0" id="product_page_image_w" value="<?php echo $images[ 'classic_grid_image_w' ] ?>" class="small-text">
						<label for="classic_grid_image_h"><?php _e( 'Max Height' ) ?></label>
						<input name="catalog_image_sizes[classic_grid_image_h]" type="number" step="1" min="0" id="product_page_image_h" value="<?php echo $images[ 'classic_grid_image_h' ] ?>" class="small-text">
					</fieldset></td>
			</tr>
			<tr>
				<th scope="row"><?php _e( 'Classic List Image', 'ecommerce-product-catalog' ) ?></th>
				<td><fieldset><legend class="screen-reader-text"><span><?php _e( 'Classic List Image', 'ecommerce-product-catalog' ) ?></span></legend>
						<label for="classic_list_image_w"><?php _e( 'Max Width' ) ?></label>
						<input name="catalog_image_sizes[classic_list_image_w]" type="number" step="1" min="0" id="product_page_image_w" value="<?php echo $images[ 'classic_list_image_w' ] ?>" class="small-text">
						<label for="classic_list_image_h"><?php _e( 'Max Height' ) ?></label>
						<input name="catalog_image_sizes[classic_list_image_h]" type="number" step="1" min="0" id="product_page_image_h" value="<?php echo $images[ 'classic_list_image_h' ] ?>" class="small-text">
					</fieldset></td>
			</tr>
			<?php do_action( 'catalog_image_sizes_settings', $images ) ?>
		</tbody>
	</table>
	<?php
}

function ic_get_default_catalog_image_sizes() {
	$image_sizes[ 'product_page_image_w' ]			 = 600;
	$image_sizes[ 'product_page_image_h' ]			 = 600;
	$image_sizes[ 'product_category_page_image_w' ]	 = 600;
	$image_sizes[ 'product_category_page_image_h' ]	 = 600;
	$image_sizes[ 'classic_grid_image_w' ]			 = 600;
	$image_sizes[ 'classic_grid_image_h' ]			 = 600;
	$image_sizes[ 'classic_list_image_w' ]			 = 280;
	$image_sizes[ 'classic_list_image_h' ]			 = 160;
	$image_sizes[ 'modern_grid_image_w' ]			 = 600;
	$image_sizes[ 'modern_grid_image_h' ]			 = 384;
	return $image_sizes;
}

function ic_get_catalog_image_sizes() {
	$default	 = ic_get_default_catalog_image_sizes();
	$image_sizes = wp_parse_args( get_option( 'catalog_image_sizes', $default ), $default );
	return $image_sizes;
}

add_action( 'product-settings-list', 'ic_register_image_setting' );

/**
 * Registers catalog image sizes
 *
 */
function ic_register_image_setting() {
	register_setting( 'media', 'catalog_image_sizes' );
}

add_action( 'after_setup_theme', 'ic_add_catalog_image_sizes' );

/**
 * Adds image size for classic grid product listing
 *
 */
function ic_add_catalog_image_sizes() {
	$image_sizes = ic_get_catalog_image_sizes();
	add_image_size( 'classic-grid-listing', $image_sizes[ 'classic_grid_image_w' ], $image_sizes[ 'classic_grid_image_h' ] );
	add_image_size( 'classic-list-listing', $image_sizes[ 'classic_list_image_w' ], $image_sizes[ 'classic_list_image_h' ] );
	add_image_size( 'modern-grid-listing', $image_sizes[ 'modern_grid_image_w' ], $image_sizes[ 'modern_grid_image_h' ], true );
	add_image_size( 'product-page-image', $image_sizes[ 'product_page_image_w' ], $image_sizes[ 'product_page_image_h' ] );
	add_image_size( 'product-category-page-image', $image_sizes[ 'product_category_page_image_w' ], $image_sizes[ 'product_category_page_image_h' ] );
	do_action( 'add_catalog_image_sizes', $image_sizes );
}
