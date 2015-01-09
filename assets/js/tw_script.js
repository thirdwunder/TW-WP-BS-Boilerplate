/*** Video Poster***/
jQuery(function() {
    var videos  = jQuery(".video");
    videos.on("click", function(){
        var elm = jQuery(this),
            conts   = elm.contents(),
            le      = conts.length,
            ifr     = null;

        for(var i = 0; i<le; i++){
          if(conts[i].nodeType === 8){ ifr = conts[i].textContent; }
        }
        jQuery(".section-video").css("background", "");
        elm.addClass("player").html(ifr);
        elm.off("click");
    });
});

/*** Scroll to Top ***/
jQuery(function(){

	jQuery(document).on( 'scroll', function(){

		if (jQuery(window).scrollTop() > 100) {
			jQuery('.scroll-top-wrapper').addClass('show');
		} else {
			jQuery('.scroll-top-wrapper').removeClass('show');
		}
	});

	jQuery('.scroll-top-wrapper').on('click', scrollToTop);
});

function scrollToTop() {
	verticalOffset = typeof(verticalOffset) !== 'undefined' ? verticalOffset : 0;
	element = jQuery('body');
	offset = element.offset();
	offsetTop = offset.top;
	jQuery('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}


jQuery(document).bind('keyup', function(e) {
  if(e.which === 39){
    jQuery('.carousel').carousel('next');
  }
  else if(e.which === 37){
    jQuery('.carousel').carousel('prev');
  }
});

jQuery('#scroll-to-top-wrapper').affix({
  offset: {
    top: 100,
    bottom: function () {
      return (this.bottom = jQuery('#site-footer').outerHeight(true));
    }
  }
});