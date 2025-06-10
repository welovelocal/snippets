<?php
/**
 * WooCommerce Stripe Payment Form Styling
 * 
 * This code customizes the Stripe payment form using Stripe's Elements Appearance API
 * through WooCommerce's official filter system.
 * 
 * DOCUMENTATION SOURCES:
 * - WooCommerce Stripe Styling: https://woocommerce.com/document/stripe/customization/style-payment-form/
 * - Stripe Elements Appearance API: https://docs.stripe.com/elements/appearance-api
 * 
 * IMPLEMENTATION METHOD:
 * - Uses the wc_stripe_upe_params filter (WooCommerce's official hook)
 * - Applies to both block checkout and shortcode checkout
 * - Uses only officially supported CSS selectors and properties
 * 
 * COMPATIBILITY:
 * - Requires WooCommerce Stripe Gateway 8.1.0+ (new checkout experience)
 * - Works with both WooCommerce blocks and shortcode checkouts
 * - Compatible with most WordPress themes
 */

add_filter( 'wc_stripe_upe_params', function ( $stripe_params ) {
    
    // Brand colors - customize these to match your brand
    $primary_color = '#35C4B5';  // Primary brand color (used for focus states)
    $text_color = '#353735';     // Brand text color
    
    // Font stack - customize to match your brand fonts
    // Uses fallbacks if primary font isn't available
    $brand_font = '"Your Brand Font", "Helvetica Neue", Arial, sans-serif';
    
    $appearance_settings = array(
        
        // VARIABLES: Control broad styling across all components
        // These are Stripe's official variables from their API documentation
        'variables' => array(
            'fontFamily' => $brand_font,      // Apply brand font to all form elements
            'colorPrimary' => $primary_color, // Used for focus states, selections
            'colorText' => $text_color,       // Default text color throughout form
        ),
        
        // RULES: Specific styling for individual components
        // Uses only official CSS selectors from Stripe's documentation
        'rules' => array(
            
            // .Input selector: All input fields (card number, expiry, CVC)
            // Official Stripe selector - supports all standard CSS properties
            '.Input' => array(
                'padding' => '12px 16px',        // Comfortable input padding
                'border' => '1px solid #ddd',    // Subtle border color
            ),
            
            // .Input:focus pseudo-class: Input fields when clicked/focused
            // Creates branded focus state for better UX
            '.Input:focus' => array(
                'borderColor' => $primary_color, // Brand color border on focus
                'boxShadow' => '0 0 0 1px ' . $primary_color, // Subtle glow effect
            ),
            
            // .Label selector: Field labels ("Card number", "Expiration date", etc.)
            // Makes labels stand out better for improved form hierarchy
            '.Label' => array(
                'fontWeight' => 'bold',          // Bold labels for better scanning
            ),
        ),
        
        // CONFIGURATION: Additional form behavior settings
        'labels' => 'above',  // Position labels above fields (cleaner than floating)
    );
    
    // Apply settings to both checkout types for full compatibility
    // blocksAppearance: For new WooCommerce block-based checkout
    // appearance: For traditional shortcode checkout
    $stripe_params['blocksAppearance'] = (object) $appearance_settings;
    $stripe_params['appearance'] = (object) $appearance_settings;
    
    return $stripe_params;
} );

/**
 * CUSTOMIZATION INSTRUCTIONS:
 * 
 * 1. Update brand colors:
 *    - Change $primary_color to your brand's primary color
 *    - Change $text_color to your preferred text color
 * 
 * 2. Update fonts:
 *    - Replace "Your Brand Font" with your actual font name
 *    - Keep fallback fonts for better compatibility
 * 
 * 3. Adjust styling:
 *    - Modify padding, border colors in the .Input rules
 *    - Add more styling rules using official Stripe selectors
 * 
 * TROUBLESHOOTING NOTES:
 * 
 * 1. If changes don't appear immediately:
 *    - Stripe caches styling in WordPress transients
 *    - Clear cache by deactivating/reactivating this code
 *    - Or manually run: delete_transient('wc_stripe_appearance'); delete_transient('wc_stripe_blocks_appearance');
 * 
 * 2. If fonts don't load:
 *    - Ensure your brand font is loaded on your site
 *    - Fallback fonts (Helvetica Neue, Arial) will be used automatically
 * 
 * 3. If styling breaks:
 *    - Only modify colors and fonts in the variables section
 *    - Don't change the CSS selectors (.Input, .Label, etc.) - these are official Stripe selectors
 *    - Don't add unsupported CSS properties (check Stripe documentation)
 * 
 * 4. Browser testing:
 *    - Test in multiple browsers (Chrome, Safari, Firefox)
 *    - Check mobile responsiveness
 *    - Verify with different payment methods (cards, PayPal, etc.)
 */

?>
