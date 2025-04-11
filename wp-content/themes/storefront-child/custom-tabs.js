jQuery(document).ready(function($) {
    $('.custom-tabs-nav li').on('click', function() {
        // Remove active class from all tabs and panels
        $('.custom-tabs-nav li').removeClass('active');
        $('.custom-tab-panel').removeClass('active');
        
        // Add active class to clicked tab
        $(this).addClass('active');
        
        // Show corresponding panel
        var tabId = $(this).data('tab');
        $('#tab-' + tabId).addClass('active');
    });
});