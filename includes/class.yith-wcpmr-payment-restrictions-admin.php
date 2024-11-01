<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
if ( !defined( 'YITH_WCPMR_VERSION' ) ) {
    exit( 'Direct access forbidden.' );
}

/**
 *
 *
 * @class      YITH_Payment_Restrictions_Admin
 * @package    Yithemes
 * @since      Version 1.0.0
 * @author     Carlos Rodríguez <carlos.rodriguez@yourinspiration.it>
 *
 */

if ( !class_exists( 'YITH_Payment_Restrictions_Admin' ) ) {
    /**
     * Class YITH_Payment_Restrictions_Admin
     *
     * @author Carlos Rodríguez <carlos.rodriguez@yourinspiration.it>
     */
    class YITH_Payment_Restrictions_Admin
    {

        /**
         * @var Panel object
         */
        protected $_panel = null;


        /**
         * @var Panel page
         */
        protected $_panel_page = 'yith_wcpmr_payment_restriction_panel';

        /**
         * @var bool Show the premium landing page
         */
        public $show_premium_landing = true;

        /**
         * @var string Official plugin documentation
         */
        protected $_official_documentation = 'http://docs.yithemes.com/yith-payment-method-restrictions-for-woocommerce/';

        /**
         * @var string
         */
        protected $_premium_landing_url = 'http://yithemes.com/themes/plugins/yith-payment-method-restrictions-for-woocommerce/';

        /**
         * Single instance of the class
         *
         * @var \YITH_Payment_Restrictions_Admin
         * @since 1.0.0
         */
        protected static $instance;

        /**
         * Returns single instance of the class
         *
         * @return \YITH_Payment_Restrictions_Admin
         * @since 1.0.0
         */
        public static function get_instance() {
            $self = __CLASS__ . ( class_exists( __CLASS__ . '_Premium' ) ? '_Premium' : '' );

            if ( is_null( $self::$instance ) ) {
                $self::$instance = new $self;
            }

            return $self::$instance;
        }


        /**
         * Construct
         *
         * @author Carlos Rodríguez <carlos.rodriguez@yourinspiration.it>
         * @since 1.0
         */
        protected function __construct()
        {
            /* === Register Panel Settings === */
            add_action('admin_menu', array($this, 'register_panel'), 5);
            /* === Premium Tab === */
            add_action( 'yith_wcpmr_premium_tab', array( $this, 'show_premium_landing' ) );
            /* === Settings Tab === */
            add_action( 'yith_wcpmr_settings_tab', array( $this,'payment_method_restriction_settings_tab' ) );

            /* === Enqueue Scripts === */
            add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

        }

        /**
         * Add a panel under YITH Plugins tab
         *
         * @return   void
         * @since    1.0
         * @author   Carlos Rodríguez <carlos.rodriguez@yourinspiration.it>
         * @use     /Yit_Plugin_Panel class
         * @see      plugin-fw/lib/yit-plugin-panel.php
         */
        public function register_panel()
        {

            if (!empty($this->_panel)) {
                return;
            }

            $admin_tabs = apply_filters('yith_wcpmr_admin_tabs', array(
                    'rules' => __('Rules', 'yith-payment-method-restrictions-for-woocommerce'),
            ));

            if( $this->show_premium_landing ){
                $admin_tabs['premium'] = __( 'Premium Version', 'yith-payment-method-restrictions-for-woocommerce' );
            }

            $args = array(
                'create_menu_page' => true,
                'parent_slug' => '',
                'page_title' => _x('Payment Method Restrictions', 'plugin name in admin page title', 'yith-payment-method-restrictions-for-woocommerce'),
                'menu_title' => _x('Payment Method Restrictions', 'plugin name in admin WP menu', 'yith-payment-method-restrictions-for-woocommerce'),
                'capability' => 'manage_options',
                'parent' => '',
                'parent_page' => 'yit_plugin_panel',
                'page' => $this->_panel_page,
                'admin-tabs' => $admin_tabs,
                'options-path' => YITH_WCPMR_OPTIONS_PATH,
                'links' => $this->get_sidebar_link()
            );


            /* === Fixed: not updated theme/old plugin framework  === */
            if (!class_exists('YIT_Plugin_Panel_WooCommerce')) {
                require_once('plugin-fw/lib/yit-plugin-panel-wc.php');
            }


            $this->_panel = new YIT_Plugin_Panel_WooCommerce($args);

            add_action('woocommerce_admin_field_yith_payment_method_restrictions_upload', array($this->_panel, 'yit_upload'), 10, 1);
        }

        /**
         * Show the premium landing
         *
         * @author Carlos Rodriguez <carlos.rodriguez@yourinspiration.it>
         * @since 1.0.0
         * @return void
         */
        public function show_premium_landing(){
            if( file_exists( YITH_WCPMR_TEMPLATE_PATH . 'premium/premium.php' )&& $this->show_premium_landing ){
                require_once( YITH_WCPMR_TEMPLATE_PATH . 'premium/premium.php' );
            }
        }

        /**
         * Get the premium landing uri
         *
         * @since   1.0.0
         * @author  Andrea Grillo <andrea.grillo@yithemes.com>
         * @return  string The premium landing link
         */
        public function get_premium_landing_uri()
        {
            return defined('YITH_REFER_ID') ? $this->_premium_landing_url . '?refer_id=' . YITH_REFER_ID : $this->_premium_landing_url.'?refer_id=1030585';
        }

        /**
         * Sidebar links
         *
         * @return   array The links
         * @since    1.2.1
         * @author   Carlos Rodríguez <carlos.rodriguez@yourinspiration.it>
         */
        public function get_sidebar_link()
        {
            $links = array(
                array(
                    'title' => __('Plugin documentation', 'yith-payment-method-restrictions-for-woocommerce'),
                    'url' => $this->_official_documentation,
                ),
                array(
                    'title' => __('Help Center', 'yith-payment-method-restrictions-for-woocommerce'),
                    'url' => 'http://support.yithemes.com/hc/en-us/categories/202568518-Plugins',
                ),
                array(
                    'title' => __('Support platform', 'yith-payment-method-restrictions-for-woocommerce'),
                    'url' => 'https://yithemes.com/my-account/support/dashboard/',
                ),
                array(
                    'title' => sprintf('%s (%s %s)', __('Changelog', 'yith-payment-method-restrictions-for-woocommerce'), __('current version', 'yith-payment-method-restrictions-for-woocommerce'), YITH_WCPMR_VERSION),
                    'url' => 'https://yithemes.com/docs-plugins/yith-payment-method-restrictions-for-woocommerce/changelog',
                ),
            );

            return $links;
        }


        /**
         * Enqueue Scripts
         *
         * Register and enqueue scripts for Admin
         *
         * @author Carlos Rodríguez <carlos.rodriguez@yourinspiration.it>
         * @since 1.0
         * @return void
         */

        public function enqueue_scripts()
        {
            wp_register_style('yith_wcpmr_admincss', YITH_WCPMR_ASSETS_URL . 'css/wcpmr-admin.css', YITH_WCPMR_VERSION);
            wp_register_script('yith_wcpmr_admin', YITH_WCPMR_ASSETS_URL . 'js/wcpmr-admin.js', array('jquery', 'jquery-ui-sortable', 'wc-enhanced-select'), YITH_WCPMR_VERSION, true);

            wp_localize_script('yith_wcpmr_admin', 'yith_wcpmr_admin', apply_filters('yith_wcpmr_admin_localize', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'before_3_0' => version_compare( WC()->version, '3.0', '<' ) ? true : false,
            )));

            if (is_admin()) {
                wp_enqueue_script('yith_wcpmr_admin');
                wp_enqueue_style('woocommerce_admin_styles');
                wp_enqueue_style('yith_wcpmr_admincss');
            }

            do_action('yith_wcpmr_enqueue_scripts');

        }

        /**
         *
         * Payment method restriction tab
         *
         * @author Carlos Rodríguez <carlos.rodriguez@yourinspiration.it>
         * @since 1.0
         * @return void
         */
        public function payment_method_restriction_settings_tab() {
            wc_get_template('admin/payment-restriction-tab.php', array(), '', YITH_WCPMR_TEMPLATE_PATH);
        }
    }
}