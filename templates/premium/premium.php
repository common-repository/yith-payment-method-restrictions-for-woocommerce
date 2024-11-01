<style>
    .section{
        margin-left: -20px;
        margin-right: -20px;
        font-family: "Raleway",san-serif;
        overflow-x: hidden;
    }
    .section h1{
        text-align: center;
        text-transform: uppercase;
        color: #808a97;
        font-size: 35px;
        font-weight: 700;
        line-height: normal;
        display: inline-block;
        width: 100%;
        margin: 50px 0 0;
    }
    .section ul{
        list-style-type: disc;
        padding-left: 15px;
    }
    .section:nth-child(even){
        background-color: #fff;
    }
    .section:nth-child(odd){
        background-color: #f1f1f1;
    }
    .section .section-title img{
        display: table-cell;
        vertical-align: middle;
        width: auto;
        margin-right: 15px;
    }
    .section h2,
    .section h3 {
        display: inline-block;
        vertical-align: middle;
        padding: 0;
        font-size: 24px;
        font-weight: 700;
        color: #808a97;
        text-transform: uppercase;
    }

    .section .section-title h2{
        display: table-cell;
        vertical-align: middle;
        line-height: 25px;
    }

    .section-title{
        display: table;
    }

    .section h3 {
        font-size: 14px;
        line-height: 28px;
        margin-bottom: 0;
        display: block;
    }

    .section p{
        font-size: 13px;
        margin: 25px 0;
    }
    .section ul li{
        margin-bottom: 4px;
    }
    .landing-container{
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
        padding: 50px 0 30px;
    }
    .landing-container:after{
        display: block;
        clear: both;
        content: '';
    }
    .landing-container .col-1,
    .landing-container .col-2{
        float: left;
        box-sizing: border-box;
        padding: 0 15px;
    }
    .landing-container .col-1 img{
        width: 100%;
    }
    .landing-container .col-1{
        width: 55%;
    }
    .landing-container .col-2{
        width: 45%;
    }
    .premium-cta{
        background-color: #808a97;
        color: #fff;
        border-radius: 6px;
        padding: 20px 15px;
    }
    .premium-cta:after{
        content: '';
        display: block;
        clear: both;
    }
    .premium-cta p{
        margin: 7px 0;
        font-size: 13px;
        font-weight: 500;
        display: inline-block;
        width: 60%;
    }
    .premium-cta a.button{
        border-radius: 6px;
        height: 60px;
        float: right;
        background: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/upgrade.png) #ff643f no-repeat 13px 13px;
        border-color: #ff643f;
        box-shadow: none;
        outline: none;
        color: #fff;
        position: relative;
        padding: 9px 50px 9px 70px;
    }
    .premium-cta a.button:hover,
    .premium-cta a.button:active,
    .premium-cta a.button:focus{
        color: #fff;
        background: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/upgrade.png) #971d00 no-repeat 13px 13px;
        border-color: #971d00;
        box-shadow: none;
        outline: none;
    }
    .premium-cta a.button:focus{
        top: 1px;
    }
    .premium-cta a.button span{
        line-height: 13px;
    }
    .premium-cta a.button .highlight{
        display: block;
        font-size: 20px;
        font-weight: 700;
        line-height: 20px;
    }
    .premium-cta .highlight{
        text-transform: uppercase;
        background: none;
        font-weight: 800;
        color: #fff;
    }

    .section.one{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/01-bg.png); background-repeat: no-repeat; background-position: 85% 75%
    }
    .section.two{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/02-bg.png); background-repeat: no-repeat; background-position: 15% 100%
    }
    .section.three{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/03-bg.png); background-repeat: no-repeat; background-position: 85% 75%
    }
    .section.four{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/04-bg.png); background-repeat: no-repeat; background-position: 15% 100%
    }
    .section.five{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/05-bg.png); background-repeat: no-repeat; background-position: 85% 75%
    }
    .section.six{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/06-bg.png); background-repeat: no-repeat; background-position: 15% 100%
    }
    .section.seven{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/07-bg.png); background-repeat: no-repeat; background-position: 85% 75%
    }
    .section.eight{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/08-bg.png); background-repeat: no-repeat; background-position: 15% 100%
    }
    .section.nine{
        background-image: url(<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/09-bg.png); background-repeat: no-repeat; background-position: 85% 75%
    }

    @media (max-width: 768px) {
        .section{margin: 0}
        .premium-cta p{
            width: 100%;
        }
        .premium-cta{
            text-align: center;
        }
        .premium-cta a.button{
            float: none;
        }
    }

    @media (max-width: 480px){
        .wrap{
            margin-right: 0;
        }
        .section{
            margin: 0;
        }
        .landing-container .col-1,
        .landing-container .col-2{
            width: 100%;
            padding: 0 15px;
        }
        .section-odd .col-1 {
            float: left;
            margin-right: -100%;
        }
        .section-odd .col-2 {
            float: right;
            margin-top: 65%;
        }
    }

    @media (max-width: 320px){
        .premium-cta a.button{
            padding: 9px 20px 9px 70px;
        }

        .section .section-title img{
            display: none;
        }
    }
</style>
<div class="landing">
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH Payment Method Restrictions for WooCommerce%2$s to benefit from all features!','yith-payment-method-restrictions-for-woocommerce'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo YITH_Payment_Restrictions_Admin::get_instance()->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith-payment-method-restrictions-for-woocommerce');?></span>
                    <span><?php _e('to the premium version','yith-payment-method-restrictions-for-woocommerce');?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="one section section-even clear">
        <h1><?php _e('Premium Features','yith-payment-method-restrictions-for-woocommerce');?></h1>
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/01.png" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/01-icon.png" />
                    <h2><?php _e('Restrictions for tags and categories','yith-payment-method-restrictions-for-woocommerce');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Thanks to this feature, you can create restriction rules for product categories and tags.%3$s The payment method will be removed if %1$sthe cart includes at least a product%2$s linked to a selected category and/or tag.', 'yith-payment-method-restrictions-for-woocommerce'), '<b>', '</b>','<br>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="two section section-odd clear">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/02-icon.png" />
                    <h2><?php _e('Check the user\'s country','yith-payment-method-restrictions-for-woocommerce');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Remove the payment gateway if the user is from one or more specified countries.%3$s This allows %1$schoosing the gateways to enable for each country%2$s. ', 'yith-payment-method-restrictions-for-woocommerce'), '<b>', '</b>','<br>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/02.png" />
            </div>
        </div>
    </div>
    <div class="three section section-even clear">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/03.png" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/03-icon.png" />
                    <h2><?php _e('Cart total amount','yith-payment-method-restrictions-for-woocommerce');?></h2>
                </div>
                <p>
                    <?php echo _e('Has it ever happened you wanted to prevent users from purchasing by bank cheque if they didn\'t reach a certain threshold in the cart? ', 'yith-payment-method-restrictions-for-woocommerce');?>
                </p>
                <p>
                    <?php echo sprintf(__('With the premium version, you can do it! You can %1$schoose the price range to enable the gateway or not%2$s', 'yith-payment-method-restrictions-for-woocommerce'), '<b>', '</b>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="four section section-odd clear">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/04-icon.png" />
                    <h2><?php _e('Automatic switch of bank account ','yith-payment-method-restrictions-for-woocommerce');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Do you have %1$sdifferent bank accounts%2$s and you would like to alternate their use depending on cart conditions configured?', 'yith-payment-method-restrictions-for-woocommerce'), '<b>', '</b>');?>
                </p>
                <p>
                    <?php echo sprintf(__('Set the restriction rules in a few clicks and the system will handle the %1$sautomatic account switch%2$s when the conditions match with the rules.', 'yith-payment-method-restrictions-for-woocommerce'), '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/04.png" />
            </div>
        </div>
    </div>
    <div class="five section section-even clear">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/05.png" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_WCPMR_ASSETS_URL?>/images/premium/05-icon.png" />
                    <h2><?php _e('Notification messages on Checkout page ','yith-payment-method-restrictions-for-woocommerce');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('It is fair to let your users know why one or more payment gateways are not available on the site. %3$s Insert the %1$snotification messages in the "Checkout page"%2$s for each restriction rule applied.  ', 'yith-payment-method-restrictions-for-woocommerce'), '<b>', '</b>','<br>');?>
                </p>
            </div>
        </div>
    </div>

    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH Payment Method Restrictions for WooCommerce%2$s to benefit from all features!','yith-payment-method-restrictions-for-woocommerce'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo YITH_Payment_Restrictions_Admin::get_instance()->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith-payment-method-restrictions-for-woocommerce');?></span>
                    <span><?php _e('to the premium version','yith-payment-method-restrictions-for-woocommerce');?></span>
                </a>
            </div>
        </div>
    </div>
</div>