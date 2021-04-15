<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://4x4tyres.co.uk
 * @since      1.0.0
 *
 * @package    Fbf_Ebay
 * @subpackage Fbf_Ebay/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fbf_Ebay
 * @subpackage Fbf_Ebay/admin
 * @author     Kevin Price-Ward <kevin.price-ward@4x4tyres.co.uk>
 */
class Fbf_Ebay_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fbf_Ebay_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fbf_Ebay_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fbf-ebay-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Fbf_Ebay_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Fbf_Ebay_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fbf-ebay-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Register menu page
     *
     * @since 1.0.0
     */
    public function add_menu_page()
    {
        add_menu_page(
            __( 'eBay', 'fbf-ebay' ),
            __( 'eBay', 'fbf-ebay' ),
            'manage_options',
            $this->plugin_name,
            [$this, 'display_front_page'],
            'dashicons-admin-tools'
        );
        add_submenu_page(
            $this->plugin_name,
            __('eBay Dashboard', 'fbf-ebay'),
            __('Dashboard', 'fbf-ebay'),
            'manage_options',
            $this->plugin_name,
            [$this, 'display_front_page']
        );
        add_submenu_page(
            $this->plugin_name,
            __('eBay Settings', 'fbf-ebay'),
            __('Settings', 'fbf-ebay'),
            'manage_options',
            $this->plugin_name . '-settings',
            [$this, 'display_settings_page']
        );
    }

    /**
     * Render the options page for plugin
     *
     * @since  1.0.0
     */
    public function display_front_page() {
        echo '<div class="wrap">';
        echo '<h2>Request token</h2>';

        echo '<form action="" method="POST">';
        echo '<input type="hidden" name="fbf-ebay-get-token" value="yes"/>';
        echo '<h2>Credentials:</h2>';
        echo '<p>Enter your eBay Client ID and your Client Secret below</p>';
        echo '
<table class="form-table" role="presentation">
    <tbody>
        <tr>
            <th scope="row">
                <label for="fbf_ebay_client_id">Client ID</label>
            </th>
            <td>
                <input type="text" name="fbf_ebay_client_id" id="fbf_ebay_client_id"/>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="fbf_ebay_client_secret">Client Secret</label>
            </th>
            <td>
                <input type="text" name="fbf_ebay_client_secret" id="fbf_ebay_client_secret"/>
            </td>
        </tr>
    </tbody >
</table>';
        echo '<h2>Scopes:</h2>';
        echo '<p>Enter your required scopes, separated by a space</p>';
        echo '
<table class="form-table" role="presentation">
    <tbody>
        <tr>
            <th scope="row">
                <label for="fbf_ebay_client_scopes">Scopes</label>
            </th>
            <td>
                <input type="text" name="fbf_ebay_client_scopes" id="fbf_ebay_client_scopes"/>
            </td>
        </tr>
    </tbody >
</table>';
        echo '
<p class="submit">
    <input type="submit" name="submit" id="submit" class="button button-primary" value="Request Token">
</p>';


/*

        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        $code = 'v^1.1%23i^1%23I^3%23p^3%23r^1%23f^0%23t^Ul41XzA6QUY1NDk1MkFENUJBRjE0OTVBMjRGQTZBNEFGMTcyOTdfMF8xI0VeMjYw';
        $redirect_uri = 'Top_Gear_Consum-TopGearC-2def-4-pfynm';
        $client_id = 'TopGearC-2def-4f79-8d54-3b6c42dab8f3';
        $client_secret = '99a7b2b8-edb5-4095-9715-bf254df7f3ce';
        $auth = base64_encode($client_id.':'.$client_secret);

        curl_setopt($ch, CURLOPT_URL, 'https://api.ebay.com/identity/v1/oauth2/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=authorization_code&code=' . $code . '&redirect_uri=' . $redirect_uri);

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Authorization: Basic ' . $auth;

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
*/



        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.ebay.com/identity/v1/oauth2/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);




        //refresh token
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        $client_id = 'TopGearC-2def-4f79-8d54-3b6c42dab8f3';
        $client_secret = '99a7b2b8-edb5-4095-9715-bf254df7f3ce';
        $auth = base64_encode($client_id.':'.$client_secret);

        curl_setopt($ch, CURLOPT_URL, 'https://api.ebay.com/identity/v1/oauth2/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token" .
            "&refresh_token=v^1.1#i^1#I^3#f^0#r^1#p^3#t^Ul4xMF8yOkYwNDEwMDgwQjVEM0UyMUZDODBBNTlEN0I3NTNGNzZCXzFfMSNFXjI2MA==" .
            "&scope=https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.marketing.readonly+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.marketing+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.inventory.readonly+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.inventory+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.account.readonly+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.account+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.fulfillment.readonly+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.fulfillment+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.analytics.readonly+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.finances+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fsell.payment.dispute+https%3A%2F%2Fapi.ebay.com%2Foauth%2Fapi_scope%2Fcommerce.identity.readonly");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Authorization: Basic ' . $auth;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    /**
     * Render the submenu page for plugin
     *
     * @since  1.0.0
     */
    public function display_settings_page()
    {
        echo 'settings';
    }

}
