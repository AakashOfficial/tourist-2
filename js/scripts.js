jQuery(document).ready(function(){
	jQuery(".hm-search-button-icon").click(function() {
		jQuery(".hm-search-box-container").toggle('fast');
		jQuery(this).toggleClass("hm-search-close");
	});
});

jQuery(document).ready(function(){
	jQuery('.image-link').magnificPopup({
		type: 'image',
        gallery:{
            enabled:true,
            tCounter: '<span class="mfp-counter">%curr% из %total%</span>'
        },
        showCloseBtn: true
	});
    jQuery('.room-photo').magnificPopup({
		type: 'image',
        gallery:{
            enabled:true,
            tCounter: '<span class="mfp-counter">%curr% из %total%</span>'
        },
        showCloseBtn: true
	});
});

/* Featured Slider */

jQuery(window).load(function() {
	// The slider being synced must be initialized first
	jQuery('#hm-carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: true,
		itemWidth: 135,
		itemMargin: 10,
		asNavFor: '#hm-slider'
	});
    
    jQuery('#single-slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: true,
		itemWidth: 135,
		itemMargin: 10,
	});

	jQuery('#hm-slider').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: true,
		sync: "#hm-carousel"
	});
});


/* Link the whole slide to the link*/
(function($) {
	$('div.hm-slider-container').on( 'click', function(e) {
		if ( $(e.target).is('span.cat-links') ) { 
			return false;
		} else {
			window.location = $(this).data('loc');
		}
	});
    
    $(window).load(function(){  
        var map_wrap = $('#hotel-map');
        if(map_wrap.length>0){
            var lat = parseFloat(map_wrap.attr('data-lat'));
            var lng = parseFloat(map_wrap.attr('data-lng'));
            var map;
            var position = {lat: lat, lng: lng};
            map = new google.maps.Map(document.getElementById('hotel-map'), {
                center: position,
                zoom: 15
            });
			$('a[href=#raspologenie]').on('click', function(){
				if(!$(this).hasClass('clicked')){
					$(this).addClass('clicked');
					google.maps.event.trigger(map, 'resize');
					setTimeout(function(){
						map.setCenter(position);
					}, 300);			
				}				
			});			
            var infowindow = new google.maps.InfoWindow({
                content: ''
            });
            var markers = hotels.map(function(hotel, i) {
                var sub_marker = new google.maps.Marker({
                    position: {
                        lat : parseFloat(hotel.location.lat),
                        lng : parseFloat(hotel.location.lng),
                    },
                    title: hotel.title,
                    img: hotel.img,
                    icon: {
                        url: '/wp-content/themes/hitmag/images/map-marker-'+hotel.type+'.png',
                        origin: new google.maps.Point(0, 0),
                        size: new google.maps.Size(24, 40),
                    }
                });
                sub_marker.addListener('click', function() {
                    infowindow.close();
                    var content = this.title;
                    infowindow = new google.maps.InfoWindow({
                        content: content
                    });
                    infowindow.open(map, this);
                });
                return sub_marker;
            });
            var markerCluster = new MarkerClusterer(map, markers, {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
        }
    });
})(jQuery);

/* Tabs Widget */
jQuery(document).ready( function() {
	if ( jQuery.isFunction(jQuery.fn.tabs) ) {
		jQuery( ".hm-tabs-wdt" ).tabs();
	}
});