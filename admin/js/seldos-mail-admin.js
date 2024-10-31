jQuery(function( $ ) {
	'use strict';
    
    //TABS
    $('.seldos-tabsContent .tabContent').hide();
    $('.seldos-tabsContent .tabContent:eq(0)').show();
    $('.seldos-tabs .tab').on('click',function(){
        
        var tabIndex = $(this).index();
        
        $('.seldos-tabsContent .tabContent').hide();
        $('.seldos-tabsContent .tabContent:eq('+tabIndex+')').show();
        
        $('.seldos-tabs .tab').removeClass('active');
        $(this).addClass('active');
    });
    //TABS
    
    
    //TEST SEND BTN
    $('.test-send-btn').on('click',function(){
        
        var mail = $('.seldosmail_smtp_user').val();
        
        var data = {
			'action': 'seldos_mail_ajax_post',
			'type': 'mail-test',
			'mail': mail,
		};
        
        jQuery.post(ajaxurl, data, function(response) {
			$('.seldos-code').html(response);
		});
        
        return false;
    });
    //TEST SEND BTN
});
