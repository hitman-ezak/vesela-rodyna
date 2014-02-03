jQuery(document).ready(function() {
 jQuery('#slideshow').cycle({ 
 	timeout : 3000,
 });
 	jQuery('a[name=modal]').click(function(e) {
		e.preventDefault();
		var id = jQuery(this).attr('href');
		var maskHeight = jQuery(document).height();
		var maskWidth = jQuery(window).width();
		jQuery('#mask').css({'width':maskWidth,'height':maskHeight});
		jQuery('#mask').fadeIn(1000);
		jQuery('#mask').fadeTo("slow",0.8);
		var winH = jQuery(window).height();
		var winW = jQuery(window).width();
		jQuery(id).css('top',  winH/2-jQuery(id).height()/2);
		jQuery(id).css('left', winW/2-jQuery(id).width()/2);
		jQuery(id).fadeIn(2000);
	});
	jQuery('.window .close').click(function (e) {
		e.preventDefault();
		jQuery('#mask, .window').hide();
	});
	jQuery('#mask').click(function () {
		jQuery(this).hide();
		jQuery('.window').hide();
	});
});

function setEqualHeight(columns){
	var tallestcolumn = 0;
	
	columns.each(function(){
		currentHeight = jQuery(this).height();
		if(currentHeight > tallestcolumn){
			tallestcolumn = currentHeight;
		}
	}

	);
	columns.height(tallestcolumn);
}
jQuery(document).ready(function() {
		setEqualHeight(jQuery(".all-recipes"));
});
jQuery(document).ready(function() {
		setEqualHeight(jQuery(".all-recipes2"));
});
