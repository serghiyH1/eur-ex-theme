// Fancybox initialization
jQuery( function() {
    jQuery( '.lang-choise a' ).attr('data-fancybox','' );
});

Fancybox.bind('[data-fancybox]', {
});

// jQuery Tabs initialization
jQuery( function() {
    jQuery( ".tabs" ).tabs();
} );

// jQuery Accordion initialization
jQuery( function() {
    jQuery( ".accordion" ).accordion({
        collapsible: true,
        heightStyle: "content"
    });
} );