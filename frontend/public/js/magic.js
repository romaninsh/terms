$(function(){
    $('.header-push').each(function(){
    	var header = $('#header header').outerHeight();
    	$(this).css('padding-top', header);
    });
});