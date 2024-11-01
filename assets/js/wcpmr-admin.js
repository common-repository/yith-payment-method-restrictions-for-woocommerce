jQuery( document ).ready( function ( $ ) {
    var $add_new_condition          = $( '#yith-wcpmr-new-condition' ),
        $condition_list             = $( '#yith-wcpmr-conditions-list' ),
        $gateway                    = $( '#yith-wcpmr-rule-gateway' ),
        $bacs_restriction_container = $( '#yith-wcpmr-bacs-payment-restriction-container' ),
        $bacs_select                = $( '#yith-wcpmr-bacs' ),
        $bacs_radio                 = $( 'input[type=radio][name=yith_wcpmr_checked_account]' ),
        $bacs_account_select        = $( '#yith-wcpmr-bacs-account-select' );

    $add_new_condition.on( 'click', function ( event ) {

        event.preventDefault();
        var post_data = {
            index : $( '.yith-wcpmr-conditions-row' ).size(),
            action: 'yith_wcpmr_add_condition_row'
        };
        $.ajax( {
            type   : "POST",
            data   : post_data,
            url    : yith_wcpmr_admin.ajaxurl,
            success: function ( response ) {
                $condition_list.append( response );
                ywcpmr_rule_metabox.show_fields();
                //Lanzar evento comprobar todos los select y ponerles select2
            }
        } );
    } );

    var ywcpmr_rule_metabox = {
        init                  : function () {
            $( document ).on( 'click', '.yith-wcpmr-delete-condition', this.delete_condition );
            this.show_fields();
        },
        delete_condition      : function () {
            $( this ).closest( '.yith-wcpmr-conditions-row' ).remove();
        },
        show_fields           : function () {
            $( '.yith-wcpmr-li' ).each( function () {
                var row = $( this ).closest( '.yith-wcpmr-row' );
                        $( this ).show();
                        if ( $( this ).hasClass( 'yith-wcpmr-select' ) ) {
                            ywcpmr_rule_metabox.yith_change(event, $(this), $(this).data('type'));
                        }
            } );
        },
        yith_change           : function ( event, selector, type_restriction ) {

            var row = selector.closest( '.yith-wcpmr-conditions-row' );
            row.find( '.yith-wcpmr-restriction-by' ).show();
            row.find( '.yith-wcpmr-restriction-type' ).select2();

            row.find( '.yith-wcpmr-select2-product' ).show();
            row.find( '.yith-wcpmr-product-search' ).css( 'display', 'inline' );
            $( document.body ).trigger( 'wc-enhanced-select-init' );
        },
    };

    ywcpmr_rule_metabox.init();
} );