<?php
/**
 * My Orders
 *
 * @deprecated  2.6.0 this template file is no longer used. My Account shortcode uses orders.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*global $pluginOptionsVal;
$pluginOptionsVal=get_wshk_sidebar_options();

if(isset($pluginOptionsVal['wshk_enablescusre']) && $pluginOptionsVal['wshk_enablescusre']==99)
{*/
$getenablescusre = get_option('wshk_enablescusre');
if ( isset($getenablescusre) && $getenablescusre =='99')
    {

//Since v.1.0

// ADD YOUR CONTAINERS ID
$wshkvieworderid = get_option('wshk_vieworderid');

} else { $wshkvieworderid = '';}

/*global $pluginOptionsVal;
$pluginOptionsVal=get_wshk_sidebar_options();
if(isset($pluginOptionsVal['wshk_enableorderscontrol']) && $pluginOptionsVal['wshk_enableorderscontrol']==140)
{*/

$getenableorderscontrol = get_option('wshk_enableorderscontrol');
if ( isset($getenableorderscontrol) && $getenableorderscontrol =='140')
    {

$my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
	'order-number'  => __( 'Order', 'woocommerce' ),
	'order-date'    => __( 'Date', 'woocommerce' ),
	'order-status'  => __( 'Status', 'woocommerce' ),
	'order-total'   => __( 'Total', 'woocommerce' ),
	'order-actions' => '&nbsp;',
) );


//Orders list pagination - Fixed v.1.9.2

$wshknumeropedidos = get_option('wshk_numeropedidosnew');
$customer_orders1 = get_posts(apply_filters('woocommerce_my_account_my_orders_query', array(
    'numberposts' => -1,
    'meta_key' => '_customer_user',
    'meta_value' => get_current_user_id(),
    'post_type' => wc_get_order_types('view-orders'),
    'post_status' => array_keys(wc_get_order_statuses())
)));

$total_records = count($customer_orders1);
$posts_per_page = $wshknumeropedidos;
 
if ( !empty($posts_per_page)) {
    
    $total_pages = ceil($total_records / $posts_per_page);
    
} else {
  
    $posts_per_page = '15';
    $total_pages = ceil($total_records / $posts_per_page);
}

//$paged = (get_query_var('page')) ? get_query_var('page') : 1;

$customer_orders = get_posts(array(
    'meta_key' => '_customer_user',
    'meta_value' => get_current_user_id(),
    'post_type' => wc_get_order_types('view-orders'),
    'posts_per_page' => $posts_per_page,
    'paged' => max( 1, get_query_var('paged') ),//$paged,
    'post_status' => array_keys(wc_get_order_statuses())
));


}
else {
    
    $my_orders_columns = apply_filters( 'woocommerce_my_account_my_orders_columns', array(
	'order-number'  => __( 'Order', 'woocommerce' ),
	'order-date'    => __( 'Date', 'woocommerce' ),
	'order-status'  => __( 'Status', 'woocommerce' ),
	'order-total'   => __( 'Total', 'woocommerce' ),
	'order-actions' => '&nbsp;',
) );

$customer_orders = get_posts( apply_filters( 'woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() ),
) ) );

    
}



if ( $customer_orders ) : ?>

	<!--<h2><?php echo apply_filters( 'woocommerce_my_account_my_orders_title', __( 'Recent orders', 'woocommerce' ) ); ?></h2>-->
<div class="wshk_my_account_orders_box">
	<table class="shop_table shop_table_responsive my_account_orders">

		<thead>
			<tr>
				<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
					<th class="<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach ( $customer_orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				$wshkvieworderid = get_option('wshk_vieworderid');
				?>
				<tr class="order">
					<?php foreach ( $my_orders_columns as $column_id => $column_name ) : ?>
						<td class="<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<a href="<?php echo esc_url( $order->get_view_order_url() . $wshkvieworderid ); ?>">
									<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
								</a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php
								/* translators: 1: formatted order total 2: total order items */
								printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
								?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
									$actions = array(
										'pay'    => array(
											'url'  => $order->get_checkout_payment_url(),
											'name' => __( 'Pay', 'woocommerce' ),
										),
										'view'   => array(
											'url'  => $order->get_view_order_url( ) . $wshkvieworderid,
											'name' => __( 'View', 'woocommerce' ),
										),
										'cancel' => array(
											'url'  => $order->get_cancel_order_url( wc_get_page_permalink( 'myaccount' ) ),
											'name' => __( 'Cancel', 'woocommerce' ),
										),
									);

									if ( ! $order->needs_payment() ) {
										unset( $actions['pay'] );
									}

									if ( ! in_array( $order->get_status(), apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) ) {
										unset( $actions['cancel'] );
									}

									if ( $actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order ) ) {
										foreach ( $actions as $key => $action ) {
											echo '<a href="' . esc_url( $action['url'] ) . '" class="button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
										}
									}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	
	<div class="pagination">
    <?php
    $big = 999999999;
    $args = array(
        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ).$wshkvieworderid,
        'format' => '?page=%#%',
        'current' => max( 1, get_query_var('paged') ),//$paged,//max( 3, $paged ),
        'total' => $total_pages,
        'show_all' => false,
        'end_size' => 1,
        'mid_size' => 2,
        'prev_next' => true,
        'prev_text' => __('&laquo; Previous'),
        'next_text' => __('Next &raquo;'),
        'type' => 'button',
        'add_args' => false,
        'add_fragment' => ''
    );
    echo paginate_links($args);
    ?>
    </div>
</div>    
	
	
	<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php _e( 'Go shop', 'woocommerce' ) ?>
		</a>
		<?php _e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>