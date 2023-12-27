<?php
/**
 * Plugin Name: Aecoded Extra
 * Plugin URI: 
 * Description:
 * Version: 1.0.0
 * Author: Dev Bucks
 * Author URI: 
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: aecoded
 */


// Prevent direct access to the plugin file
defined( 'ABSPATH' ) || exit;

function product_extra_addons() {

    session_start();

    if (isset($_POST['add_cart'])) {
        $product_id = $_POST['product_id'];

        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

        $product_price = isset( $_POST['product_price'] ) && !empty( $_POST['product_price'] ) ? $_POST['product_price'] : 0;

        $cart_item_data = array(
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_time' => $start_time,
            'end_time' => $end_time,
        );

        $start_datetime = new DateTime($start_date);
        $end_datetime = new DateTime($end_date);
        $interval = $start_datetime->diff($end_datetime);
        $total_days = $interval->days;
        $_SESSION['new_price'] = $total_days * $product_price;

        WC()->cart->add_to_cart($product_id, 1, 0, array(), $cart_item_data);
        
        $checkout_url = wc_get_checkout_url();
        wp_redirect($checkout_url);
        exit;
    }

    $output = '';

    $output .= '
        <style>
            .add_cart {
                background: rgba(240, 90, 40, 1);
                border-radius: 100px;
                Padding: 10px 24px 10px 24px;
                color: #fff;
                cursor: pointer;
            }
			.form_field {
				display: flex;
				gap: 20px;
				align-items: center;
				margin-bottom: 30px;
			}
            .form_field label {
                margin: 0;
            }
            .form_control {
                border-radius: 100px !important;
                width: 192.5px !important;
                height: 43.59px !important;
                display: block;
                margin-top: 10px;
                border-color: #4d4d4d !important;
            }

            @media (max-width: 767px) {
                .form_field {
                    align-items: start;
                    flex-direction: column;
                }
                .form_field label {
                    width: 100% !important;
                }
                .form_control {
                    width: 100% !important;
                }
            }
        </style>
        <form action="" method="post">
            <input type="hidden" name="product_id" value="'.get_the_id().'">
            <input type="hidden" name="product_price" value="'.get_post_meta(get_the_id(), '_sale_price', true).'">
            <div class="form_field">
                <label>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                        <g clip-path="url(#clip0_1_639)">
                        <path d="M4.73675 10.12C4.63107 10.1226 4.52599 10.1035 4.42797 10.0639C4.32995 10.0244 4.24105 9.9652 4.16675 9.89002C4.09137 9.81586 4.03206 9.72699 3.99249 9.62893C3.95292 9.53087 3.93395 9.42572 3.93675 9.32002C3.93675 9.09302 4.01375 8.90302 4.16675 8.75002C4.24087 8.6746 4.32973 8.61525 4.4278 8.57568C4.52587 8.53611 4.63103 8.51716 4.73675 8.52002C4.96375 8.52002 5.15375 8.59702 5.30675 8.75002C5.46075 8.90402 5.53675 9.09402 5.53675 9.32002C5.53931 9.42569 5.52022 9.53077 5.48067 9.6288C5.44112 9.72682 5.38193 9.81572 5.30675 9.89002C5.23262 9.96544 5.14376 10.0248 5.04569 10.0644C4.94762 10.1039 4.84246 10.1229 4.73675 10.12ZM7.93675 10.12C7.83107 10.1226 7.72599 10.1035 7.62797 10.0639C7.52995 10.0244 7.44105 9.9652 7.36675 9.89002C7.29137 9.81586 7.23206 9.72699 7.19249 9.62893C7.15292 9.53087 7.13395 9.42572 7.13675 9.32002C7.13675 9.09302 7.21375 8.90302 7.36675 8.75002C7.44087 8.6746 7.52973 8.61525 7.6278 8.57568C7.72587 8.53611 7.83104 8.51716 7.93675 8.52002C8.16275 8.52002 8.35275 8.59702 8.50675 8.75002C8.66075 8.90402 8.73675 9.09402 8.73675 9.32002C8.73931 9.42569 8.72022 9.53077 8.68067 9.6288C8.64112 9.72682 8.58193 9.81572 8.50675 9.89002C8.43262 9.96544 8.34376 10.0248 8.24569 10.0644C8.14762 10.1039 8.04246 10.1229 7.93675 10.12ZM11.1367 10.12C11.0309 10.1227 10.9256 10.1037 10.8274 10.0641C10.7292 10.0246 10.6402 9.96533 10.5657 9.89002C10.4904 9.81586 10.4311 9.72699 10.3915 9.62893C10.3519 9.53087 10.3329 9.42572 10.3357 9.32002C10.3357 9.09302 10.4127 8.90302 10.5657 8.75002C10.6399 8.6746 10.7287 8.61525 10.8268 8.57568C10.9249 8.53611 11.03 8.51716 11.1357 8.52002C11.3627 8.52002 11.5527 8.59702 11.7057 8.75002C11.8597 8.90402 11.9357 9.09402 11.9357 9.32002C11.9383 9.42569 11.9192 9.53077 11.8797 9.6288C11.8401 9.72682 11.7809 9.81572 11.7057 9.89002C11.6316 9.96544 11.5428 10.0248 11.4447 10.0644C11.3466 10.1039 11.2415 10.1229 11.1357 10.12H11.1367ZM2.33675 16.52C1.89675 16.52 1.52075 16.363 1.20675 16.05C1.05524 15.9039 0.935353 15.7282 0.854508 15.5338C0.773663 15.3394 0.733582 15.1305 0.736746 14.92V3.72002C0.736746 3.28002 0.893746 2.90302 1.20675 2.59002C1.52175 2.27602 1.89775 2.12002 2.33675 2.12002H3.13675V0.52002H4.73675V2.12002H11.1367V0.52002H12.7367V2.12002H13.5357C13.9757 2.12002 14.3527 2.27702 14.6657 2.59002C14.9797 2.90402 15.1357 3.28002 15.1357 3.72002V14.92C15.1357 15.36 14.9787 15.737 14.6657 16.05C14.5195 16.2014 14.3438 16.3213 14.1494 16.4021C13.9551 16.4829 13.7462 16.5231 13.5357 16.52H2.33675ZM2.33675 14.92H13.5357V6.92002H2.33675V14.92Z" fill="#3A3A3A"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_639">
                            <rect width="15" height="16" fill="white" transform="translate(0.241699 0.52002)"/>
                        </clipPath>
                        </defs>
                    </svg>

                    Ophaaldatum

                    <input type="date" name="start_date" class="form_control" required>

                </label>

                <label>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                        <g clip-path="url(#clip0_1_639)">
                        <path d="M4.73675 10.12C4.63107 10.1226 4.52599 10.1035 4.42797 10.0639C4.32995 10.0244 4.24105 9.9652 4.16675 9.89002C4.09137 9.81586 4.03206 9.72699 3.99249 9.62893C3.95292 9.53087 3.93395 9.42572 3.93675 9.32002C3.93675 9.09302 4.01375 8.90302 4.16675 8.75002C4.24087 8.6746 4.32973 8.61525 4.4278 8.57568C4.52587 8.53611 4.63103 8.51716 4.73675 8.52002C4.96375 8.52002 5.15375 8.59702 5.30675 8.75002C5.46075 8.90402 5.53675 9.09402 5.53675 9.32002C5.53931 9.42569 5.52022 9.53077 5.48067 9.6288C5.44112 9.72682 5.38193 9.81572 5.30675 9.89002C5.23262 9.96544 5.14376 10.0248 5.04569 10.0644C4.94762 10.1039 4.84246 10.1229 4.73675 10.12ZM7.93675 10.12C7.83107 10.1226 7.72599 10.1035 7.62797 10.0639C7.52995 10.0244 7.44105 9.9652 7.36675 9.89002C7.29137 9.81586 7.23206 9.72699 7.19249 9.62893C7.15292 9.53087 7.13395 9.42572 7.13675 9.32002C7.13675 9.09302 7.21375 8.90302 7.36675 8.75002C7.44087 8.6746 7.52973 8.61525 7.6278 8.57568C7.72587 8.53611 7.83104 8.51716 7.93675 8.52002C8.16275 8.52002 8.35275 8.59702 8.50675 8.75002C8.66075 8.90402 8.73675 9.09402 8.73675 9.32002C8.73931 9.42569 8.72022 9.53077 8.68067 9.6288C8.64112 9.72682 8.58193 9.81572 8.50675 9.89002C8.43262 9.96544 8.34376 10.0248 8.24569 10.0644C8.14762 10.1039 8.04246 10.1229 7.93675 10.12ZM11.1367 10.12C11.0309 10.1227 10.9256 10.1037 10.8274 10.0641C10.7292 10.0246 10.6402 9.96533 10.5657 9.89002C10.4904 9.81586 10.4311 9.72699 10.3915 9.62893C10.3519 9.53087 10.3329 9.42572 10.3357 9.32002C10.3357 9.09302 10.4127 8.90302 10.5657 8.75002C10.6399 8.6746 10.7287 8.61525 10.8268 8.57568C10.9249 8.53611 11.03 8.51716 11.1357 8.52002C11.3627 8.52002 11.5527 8.59702 11.7057 8.75002C11.8597 8.90402 11.9357 9.09402 11.9357 9.32002C11.9383 9.42569 11.9192 9.53077 11.8797 9.6288C11.8401 9.72682 11.7809 9.81572 11.7057 9.89002C11.6316 9.96544 11.5428 10.0248 11.4447 10.0644C11.3466 10.1039 11.2415 10.1229 11.1357 10.12H11.1367ZM2.33675 16.52C1.89675 16.52 1.52075 16.363 1.20675 16.05C1.05524 15.9039 0.935353 15.7282 0.854508 15.5338C0.773663 15.3394 0.733582 15.1305 0.736746 14.92V3.72002C0.736746 3.28002 0.893746 2.90302 1.20675 2.59002C1.52175 2.27602 1.89775 2.12002 2.33675 2.12002H3.13675V0.52002H4.73675V2.12002H11.1367V0.52002H12.7367V2.12002H13.5357C13.9757 2.12002 14.3527 2.27702 14.6657 2.59002C14.9797 2.90402 15.1357 3.28002 15.1357 3.72002V14.92C15.1357 15.36 14.9787 15.737 14.6657 16.05C14.5195 16.2014 14.3438 16.3213 14.1494 16.4021C13.9551 16.4829 13.7462 16.5231 13.5357 16.52H2.33675ZM2.33675 14.92H13.5357V6.92002H2.33675V14.92Z" fill="#3A3A3A"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_639">
                            <rect width="15" height="16" fill="white" transform="translate(0.241699 0.52002)"/>
                        </clipPath>
                        </defs>
                    </svg>

                    Retourdatum

                    <input type="date" name="end_date" class="form_control" required>

                </label>
            </div>

            <div class="form_field">
                <label>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                        <g clip-path="url(#clip0_1_670)">
                        <path d="M8.2667 14.1789C9.8633 14.1789 11.3945 13.5448 12.5235 12.4161C13.6525 11.2873 14.2867 9.75644 14.2867 8.16017C14.2867 6.56389 13.6525 5.033 12.5235 3.90426C11.3945 2.77553 9.8633 2.14141 8.2667 2.14141C6.6701 2.14141 5.13889 2.77553 4.00992 3.90426C2.88095 5.033 2.2467 6.56389 2.2467 8.16017C2.2467 9.75644 2.88095 11.2873 4.00992 12.4161C5.13889 13.5448 6.6701 14.1789 8.2667 14.1789ZM8.2667 0.636719C10.2625 0.636719 12.1765 1.42937 13.5877 2.84029C14.9989 4.25121 15.7917 6.16483 15.7917 8.16017C15.7917 10.1555 14.9989 12.0691 13.5877 13.4801C12.1765 14.891 10.2625 15.6836 8.2667 15.6836C4.10537 15.6836 0.741699 12.2981 0.741699 8.16017C0.741699 6.16483 1.53451 4.25121 2.94572 2.84029C4.35693 1.42937 6.27095 0.636719 8.2667 0.636719ZM8.64295 4.39844V8.34825L12.0292 10.357L11.4648 11.2824L7.5142 8.91251V4.39844H8.64295Z" fill="#3A3A3A"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_670">
                            <rect width="15.05" height="16" fill="white" transform="translate(0.741699 0.160156)"/>
                        </clipPath>
                        </defs>
                    </svg>

                    Ophaaltijd

                    <input type="time" name="start_time" class="form_control" required>

                </label>

                <label>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                        <g clip-path="url(#clip0_1_670)">
                        <path d="M8.2667 14.1789C9.8633 14.1789 11.3945 13.5448 12.5235 12.4161C13.6525 11.2873 14.2867 9.75644 14.2867 8.16017C14.2867 6.56389 13.6525 5.033 12.5235 3.90426C11.3945 2.77553 9.8633 2.14141 8.2667 2.14141C6.6701 2.14141 5.13889 2.77553 4.00992 3.90426C2.88095 5.033 2.2467 6.56389 2.2467 8.16017C2.2467 9.75644 2.88095 11.2873 4.00992 12.4161C5.13889 13.5448 6.6701 14.1789 8.2667 14.1789ZM8.2667 0.636719C10.2625 0.636719 12.1765 1.42937 13.5877 2.84029C14.9989 4.25121 15.7917 6.16483 15.7917 8.16017C15.7917 10.1555 14.9989 12.0691 13.5877 13.4801C12.1765 14.891 10.2625 15.6836 8.2667 15.6836C4.10537 15.6836 0.741699 12.2981 0.741699 8.16017C0.741699 6.16483 1.53451 4.25121 2.94572 2.84029C4.35693 1.42937 6.27095 0.636719 8.2667 0.636719ZM8.64295 4.39844V8.34825L12.0292 10.357L11.4648 11.2824L7.5142 8.91251V4.39844H8.64295Z" fill="#3A3A3A"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_1_670">
                            <rect width="15.05" height="16" fill="white" transform="translate(0.741699 0.160156)"/>
                        </clipPath>
                        </defs>
                    </svg>

                    Retourtijd

                    <input type="time" name="end_time" class="form_control" required>

                </label>
            </div>

            <button name="add_cart" class="add_cart">Nu reserveren</button>
        </form>
    ';

    return $output;
}
add_shortcode( 'extra-options', 'product_extra_addons' );

// price update function 
function update_cart_item_price($cart_object) {
    session_start();
    foreach ($cart_object->cart_contents as $cart_item_key => $cart_item) {
        if (isset($cart_item['start_date']) && isset($cart_item['end_date'])) {

            $new_price = $_SESSION['new_price']; 
            
            $cart_item['data']->set_price($new_price);
        }
    }
}
add_action('woocommerce_before_calculate_totals', 'update_cart_item_price', 10, 1);

// display custom field 
function display_custom_product_field_on_cart($cart_item_data, $cart_item) {

    if (isset($cart_item['start_date'])) {
        $cart_item_data[] = array(
            'name' => 'Ophaaldatum',
            'value' => $cart_item['start_date'],
        );
    }
    if (isset($cart_item['end_date'])) {
        $cart_item_data[] = array(
            'name' => 'Retourdatum',
            'value' => $cart_item['end_date'],
        );
    }
    if (isset($cart_item['start_time'])) {
        $cart_item_data[] = array(
            'name' => 'Ophaaltijd',
            'value' => $cart_item['start_time'],
        );
    }
    if (isset($cart_item['end_time'])) {
        $cart_item_data[] = array(
            'name' => 'Retourtijd',
            'value' => $cart_item['end_time'],
        );
    }

    return $cart_item_data;
}
add_filter('woocommerce_get_item_data', 'display_custom_product_field_on_cart', 10, 2);

// update custom field 
function display_custom_product_field_on_checkout($item, $cart_item_key, $values, $order) {

    if (isset($values['start_date'])) {
        $item->add_meta_data('Ophaaldatum', $values['start_date'], true);
    }
    if (isset($values['end_date'])) {
        $item->add_meta_data('Retourdatum', $values['end_date'], true);
    }
    if (isset($values['start_time'])) {
        $item->add_meta_data('Ophaaltijd', $values['start_time'], true);
    }
    if (isset($values['end_time'])) {
        $item->add_meta_data('Retourtijd', $values['end_time'], true);
    }
    return $item;
}
add_filter('woocommerce_checkout_create_order_line_item', 'display_custom_product_field_on_checkout', 10, 4);


/**
 * 
 * One Product Cart Item
 * 
 */
add_filter('woocommerce_add_cart_item_data', 'restrict_single_product_to_cart', 10, 3);
function restrict_single_product_to_cart($cart_item_data, $product_id, $variation_id) {
    WC()->cart->empty_cart();

    return $cart_item_data;
}



// filter form 

function filter_car_action() {

    $output = '
    <div
        class="elementor-element elementor-element-4966cce elementor-button-align-stretch elementor-widget elementor-widget-form"
    >
        <div class="elementor-widget-container">
            <form class="elementor-form" method="get" action="/available-result">

                <div class="elementor-form-fields-wrapper elementor-labels-above">
                    <div class="elementor-field-type-date elementor-field-group elementor-column elementor-field-group-name elementor-col-100">
                        <label for="form-field-name" class="elementor-field-label"> Selecteer ophaaldatum &amp; tijd </label>

                        <input
                            type="date"
                            name="start_date"
                            id="form-field-name"
                            class="elementor-field elementor-size-sm elementor-field-textual elementor-date-field elementor-use-native"
                            placeholder="27/10/2023"
                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                            required
                        />
                    </div>
                    <div class="elementor-field-type-date elementor-field-group elementor-column elementor-field-group-field_0ceaea0 elementor-col-100">
                        <label for="form-field-field_0ceaea0" class="elementor-field-label"> Selecteer inleverdatum &amp; tijd </label>

                        <input
                            type="date"
                            name="end_date"
                            id="form-field-field_0ceaea0"
                            class="elementor-field elementor-size-sm elementor-field-textual elementor-date-field elementor-use-native"
                            placeholder="27/10/2023"
                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                            required
                        />
                    </div>
                    <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                        <button type="submit" name="filter_search" class="elementor-button elementor-size-sm">
                            <span>
                                <span class="elementor-button-icon"> </span>
                                <span class="elementor-button-text">BEkijk ons aanbod</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    ';


    return $output;
}
add_shortcode( 'filter_car', 'filter_car_action' );


function filter_result_action() {

    $output = '';

    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'available_start_date',
                'value' => array($start_date, $end_date),
                'compare' => 'BETWEEN',
                'type' => 'DATE',
            ),
        ),
    );


    $query = new WP_Query($args);

    if( $query->have_posts() ) {
        while( $query->have_posts() ) {
            $query->the_post();
            
            $output .= '
                <div class="elementor-element elementor-element-3c9eda3 e-flex e-con-boxed e-con e-child" data-id="3c9eda3" data-element_type="container">
                    <div class="e-con-inner">
                        <div class="elementor-element elementor-element-31007e3 elementor-widget elementor-widget-heading" data-id="31007e3" data-element_type="widget" data-widget_type="heading.default">
                            <div class="elementor-widget-container">
                                <style>
                                    /*! elementor - v3.18.0 - 04-12-2023 */
                                    .elementor-heading-title {
                                        padding: 0;
                                        margin: 0;
                                        line-height: 1;
                                    }
                                    .elementor-widget-heading .elementor-heading-title[class*="elementor-size-"] > a {
                                        color: inherit;
                                        font-size: inherit;
                                        line-height: inherit;
                                    }
                                    .elementor-widget-heading .elementor-heading-title.elementor-size-small {
                                        font-size: 15px;
                                    }
                                    .elementor-widget-heading .elementor-heading-title.elementor-size-medium {
                                        font-size: 19px;
                                    }
                                    .elementor-widget-heading .elementor-heading-title.elementor-size-large {
                                        font-size: 29px;
                                    }
                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xl {
                                        font-size: 39px;
                                    }
                                    .elementor-widget-heading .elementor-heading-title.elementor-size-xxl {
                                        font-size: 59px;
                                    }
                                </style>
                                <h2 class="elementor-heading-title elementor-size-default">'.get_the_title().'</h2>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-9f566b2 elementor-widget elementor-widget-image" data-id="9f566b2" data-element_type="widget" data-widget_type="image.default">
                            <div class="elementor-widget-container">
                                <style>
                                    /*! elementor - v3.18.0 - 04-12-2023 */
                                    .elementor-widget-image {
                                        text-align: center;
                                    }
                                    .elementor-widget-image a {
                                        display: inline-block;
                                    }
                                    .elementor-widget-image a img[src$=".svg"] {
                                        width: 48px;
                                    }
                                    .elementor-widget-image img {
                                        vertical-align: middle;
                                        display: inline-block;
                                    }
                                </style>
                                <img
                                    fetchpriority="high"
                                    decoding="async"
                                    width="329"
                                    height="246"
                                    src="https://aecoded.com/wp-content/uploads/2023/12/bus1-Background-Removed.png"
                                    class="attachment-full size-full wp-image-77"
                                    alt=""
                                    srcset="https://aecoded.com/wp-content/uploads/2023/12/bus1-Background-Removed.png 329w, https://aecoded.com/wp-content/uploads/2023/12/bus1-Background-Removed-300x224.png 300w"
                                    sizes="(max-width: 329px) 100vw, 329px"
                                />
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-5ed791e e-flex e-con-boxed e-con e-child" data-id="5ed791e" data-element_type="container">
                            <div class="e-con-inner">
                                <div class="elementor-element elementor-element-a61bb6c e-con-full e-flex e-con e-child" data-id="a61bb6c" data-element_type="container">
                                    <div class="elementor-element elementor-element-8531caf elementor-widget elementor-widget-button" data-id="8531caf" data-element_type="widget" data-widget_type="button.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-button-wrapper">
                                                <a class="elementor-button elementor-size-sm" role="button">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-text">Op voorraad</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-element elementor-element-f92a89b e-flex e-con-boxed e-con e-child" data-id="f92a89b" data-element_type="container">
                                    <div class="e-con-inner">
                                        <div class="elementor-element elementor-element-0feb06e elementor-widget elementor-widget-heading" data-id="0feb06e" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">$44.00,-/dag</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-element elementor-element-4b5ec77 elementor-align-justify elementor-widget elementor-widget-button" data-id="4b5ec77" data-element_type="widget" data-widget_type="button.default">
                            <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                    <a class="elementor-button elementor-button-link elementor-size-sm" href="'.get_the_permalink().'">
                                        <span class="elementor-button-content-wrapper">
                                            <span class="elementor-button-icon elementor-align-icon-right">
                                                <svg aria-hidden="true" class="e-font-icon-svg e-fas-arrow-right" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"
                                                    ></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-button-text">details &amp; boeken</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
            ';

        }
    } else {
        $output .= 'No car is available';
    }

    return $output;
}
add_shortcode( 'filter_result', 'filter_result_action' );


/**
 * 
 * Require All Files Here
 * 
 */
require_once plugin_dir_path( __FILE__ ) . 'request-quote.php';
require_once plugin_dir_path( __FILE__ ) . 'request-quote-send-email.php';



function stock_handler_shortcode() {

    $stock_in_message = get_field('stock_in_message');
    $stock_out_message = get_field('stock_out_message');

    $output = '';

    if( !empty($stock_in_message) ) {
        $output .= '
        <a
            class="elementor-button elementor-size-sm"
            role="button"
            style="
                border-radius: 4px;
                background: rgba(32, 181, 38, 0.2);
                color: var(--Branding-Success-Dark, #2c742f);

                /* Body Small/Body Small, 400 */
                font-family: Poppins;
                font-size: 14px;
                font-style: normal;
                font-weight: 400;
                line-height: 150%; /* 21px */
            "
        >
            <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">'.$stock_in_message.'</span>
            </span>
        </a>
        ';
    } elseif ( !empty($stock_out_message) ) {
        $output .= '
        <a
            class="elementor-button elementor-size-sm"
            role="button"
            style="
                border-radius: 4px;
                background: rgba(222, 3, 31, 0.2);
                color: #7b0009;

                /* Body Small/Body Small, 400 */
                font-family: Poppins;
                font-size: 14px;
                font-style: normal;
                font-weight: 400;
                line-height: 150%; /* 21px */
            "
        >
            <span class="elementor-button-content-wrapper">
                <span class="elementor-button-text">'.$stock_out_message.'</span>
            </span>
        </a>
        ';
    }

    return $output;
}
add_shortcode( 'stock_manage', 'stock_handler_shortcode' );