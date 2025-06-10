<?php
/**
 * WooCommerce Stripe Payment Form Styling
 * 
 * Customizes Stripe payment forms using the Elements Appearance API.
 * 
 * Documentation:
 * - https://woocommerce.com/document/stripe/customization/style-payment-form/
 * - https://docs.stripe.com/elements/appearance-api
 * 
 * Requirements: WooCommerce Stripe Gateway 8.1.0+
 */

add_filter( 'wc_stripe_upe_params', function ( $stripe_params ) {
    
    // Customize these colors to match your brand
    $primary_color = '#35C4B5';
    $text_color = '#353735';
    $brand_font = '"Your Brand Font", "Helvetica Neue", Arial, sans-serif';
    
    $appearance_settings = array(
        'variables' => array(
            'fontFamily' => $brand_font,
            'colorPrimary' => $primary_color,
            'colorText' => $text_color,
        ),
        'rules' => array(
            '.Input' => array(
                'padding' => '12px 16px',
                'border' => '1px solid #ddd',
            ),
            '.Input:focus' => array(
                'borderColor' => $primary_color,
                'boxShadow' => '0 0 0 1px ' . $primary_color,
            ),
            '.Label' => array(
                'fontWeight' => 'bold',
            ),
        ),
        'labels' => 'above',
    );
    
    // Apply to both block and shortcode checkouts
    $stripe_params['blocksAppearance'] = (object) $appearance_settings;
    $stripe_params['appearance'] = (object) $appearance_settings;
    
    return $stripe_params;
} );

/**
 * Troubleshooting:
 * 
 * Changes not showing? Clear Stripe cache:
 * delete_transient('wc_stripe_appearance');
 * delete_transient('wc_stripe_blocks_appearance');
 * 
 * Only modify colors/fonts above. Don't change CSS selectors.
 * Test in multiple browsers and with different payment methods.
 */

?>
