<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( $order ) : ?>

	<div class="thank_you_header text-center">
	
		<?php if ( $order->has_status( 'failed' ) ) : ?>
    
            <p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>
    
            <p><?php
                if ( is_user_logged_in() )
                    _e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
                else
                    _e( 'Please attempt your purchase again.', 'woocommerce' );
            ?></p>
    
            <p>
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
                <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
                <?php endif; ?>
            </p>
    
        <?php else : ?>
    
            <p class="thankyoufororder"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>
            
            <div class="thank_you_header_text">			
                <div class="row">
                    <div class="xlarge-6 xlarge-centered large-8 large-centered columns">
                        
                        <p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>
                    
                    </div><!-- .xlarge-6-->
                </div><!--	.row	-->                
            </div>
    
            <div class="order_details_container">
					
                <div class="row">
                    <div class="xlarge-6 xlarge-centered large-8 large-centered columns">
                
                        <ul class="order_details">
                            <li class="order">
                                <span class="title"><?php _e( 'Order:', 'woocommerce' ); ?></span>
                                <strong><?php echo $order->get_order_number(); ?></strong>
                            </li>
                            <li class="date">
                                <span class="title"><?php _e( 'Date:', 'woocommerce' ); ?></span>
                                <strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
                            </li>
                            <li class="total">
                                <span class="title"><?php _e( 'Total:', 'woocommerce' ); ?></span>
                                <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                            </li>
                            <?php if ( $order->payment_method_title ) : ?>
                            <li class="method">
                                <span class="title"><?php _e( 'Payment method:', 'woocommerce' ); ?></span>
                                <strong><?php echo $order->payment_method_title; ?></strong>
                            </li>
                            <?php endif; ?>
                        </ul>
                
                    </div><!-- .xlarge-6-->
                </div><!--	.row	-->
                
            </div><!--.order_details_container-->
            <div class="clear"></div>
    
        <?php endif; ?>
    
    </div><!-- .thank_you_header-->
    
    <div class="row">
        <div class="xlarge-6 xlarge-centered large-8 large-centered columns">
            
            <div class="thank_you_bank_details">
                <?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
            </div><!-- .thank_you_bank_details-->
            
            
            <?php do_action( 'woocommerce_thankyou', $order->id ); ?>
            
        </div><!-- .medium-10-->
    </div><!--	.row	-->
    
    <!-- Facebook Conversion Code for Purchase Complete - HK -->
	<script>(function() {
	var _fbq = window._fbq || (window._fbq = []);
	if (!_fbq.loaded) {
	var fbds = document.createElement('script');
	fbds.async = true;
	fbds.src = '//connect.facebook.net/en_US/fbds.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(fbds, s);
	_fbq.loaded = true;
	}
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(['track', '6029002441635', {'value':'0.00','currency':'USD'}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6029002441635&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
	
	<!-- Google Code for Purchase Complete Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 964514327;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "5EpUCIS0_l0Ql6T1ywM";
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript"
	src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt=""
	src="//www.googleadservices.com/pagead/conversion/964514327/?label=5EpUCIS0_l0Ql6T1ywM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>

<?php else : ?>
	<div class="row">
		<div class="medium-10 medium-centered  large-8 large-centered text-center columns">
			<div class="thank_you_header">
				<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>
			</div>
		</div>
	</div>
<?php endif; ?>