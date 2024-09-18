<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
  </div> <!-- ast-container -->
  </div><!-- #content -->
<?php 
  astra_content_after();
    
  astra_footer_before();
    
  astra_footer();
    
  astra_footer_after(); 
?>
  </div><!-- #page -->
<?php 
  astra_body_bottom();    
  wp_footer(); 
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://apps.elfsight.com/p/platform.js" defer="true"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('.accordian-title').click(function(e) {
	e.preventDefault();
	jQuery('.faq-wrap').find('details').each(function() { 
        jQuery(this).removeAttr('open');
     });
	jQuery(this).parent().attr('open','open');
});
});	
jQuery('#banner_rev-slider').owlCarousel({
  loop:true,
	margin:0,
	nav:false,
	dots:false,
  smartSpeed : 500, autoplay : true, autoplayTimeout : 8000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
       0:{
        items:1
      },
      480:{
        items:1
      },
      767:{
        items:1
      },
      960:{
        items:1
      },
      1024:{
        items:2
      }
    }
});
jQuery('#client-slider').owlCarousel({
  loop:true,
	margin:5,
	nav:false,
	dots:false,
  smartSpeed : 500, autoplay : true, autoplayTimeout : 8000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
    0:{
        items:2,
	  },
    480:{
        items:2,
	  },
    767:{
        items:3,
	  },
    1023:{
        items:3,	 
    },
	  1024:{
        items:4,	 
    },
    1200:{
        items:5,
	  }, 
	  1400:{
        items:5,
	  }
  }
});	
jQuery('#service-slider').owlCarousel({
  loop:true,
	margin:20,
	nav:true,
	dots:false,
  smartSpeed : 500, autoplay :true, autoplayTimeout : 8000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
    0:{
      items:1,
      autoplay : true,
      loop:true,
    },
    480:{
      items:1,
      autoplay : true,
      loop:true,
    },
    767:{
      items:1,
      autoplay : true,
      loop:true,
    },
    1023:{
      items:1,
      autoplay : true,
      loop:true,
    },
    1024:{
      items:1,
      autoplay : true,
      loop:true,
    },
    1200:{
      items:1,
      autoplay : true,
      loop:true,
    }, 
    1400:{
      items:1,
    }
  }
});	
jQuery('#mservice-slider').owlCarousel({
  loop:true,
	margin:20,
	nav:true,
	dots:false,
  smartSpeed : 500, autoplay :true, autoplayTimeout : 8000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
    0:{
      items:1,
      autoplay : true,
      loop:true,
    },
    480:{
      items:1,
      autoplay : true,
      loop:true,
    },
    767:{
      items:1,
      autoplay : true,
      loop:true,
    },
    1023:{
      items:1,
      autoplay : true,
      loop:true,
    },
    1024:{
      items:1,
      autoplay : true,
      loop:true,
    },
    1200:{
      items:1,
      autoplay : true,
      loop:true,
    }, 
    1400:{
      items:1,
    }
  }
});
jQuery('#review-slider').owlCarousel({
  loop:true,
	margin:0,
	nav:true,
	center: true,
	dots:false,
  smartSpeed : 500, autoplay : true, autoplayTimeout : 8000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
    0:{
      items:1,
    },
    480:{
      items:1,
    },
    767:{
      items:1,
    },
    1023:{
      items:1,	 
    },
    1024:{
      items:1,
    },
    1200:{
      items:1,
    }, 
    1400:{
      items:1,
    }
  }
});	
jQuery('#whychoose-slider').owlCarousel({
  loop:true,
	margin:20,
	nav:true,
	dots:false,
  smartSpeed : 500, autoplay : true, autoplayTimeout : 8000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
    0:{
        items:1,
	 },
    480:{
        items:1,
	 },
    767:{
        items:1,
	},
    1023:{
        items:1,	 
  },
	  1024:{
        items:1,	 
  },
    1200:{
        items:1,
	 }, 
	  1400:{
        items:1,
	 }
  }
});	
jQuery('#mwhychoose-slider').owlCarousel({
  loop:true,
  margin:20,
  nav:true,
  dots:false,
  smartSpeed : 500, autoplay :true, autoplayTimeout : 6000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
    0:{
      items:1
    },
    480:{
      items:1
    },
    767:{
      items:1
    },
    960:{
      items:1
    },
    1000:{
      items:1
    }
  }
});		
jQuery('#blog-slider').owlCarousel({
  loop:true,
	margin:20,
	nav:true,
	dots:false,
  smartSpeed : 500, autoplay : true, autoplayTimeout : 8000, autoplayHoverPause : true, smartSpeed : 500, fluidSpeed : 500, autoplaySpeed : 500,
  responsive:{
   0:{
        items:1,
	 },
    480:{
        items:1,
	 },
    767:{
        items:1,
	},
    1023:{
        items:1,	 
  },
	  1024:{
        items:2,	 
  },
    1200:{
        items:2,
	 }, 
	  1400:{
        items:3,
	 }
  }
});
	
$(function(){
var owl = $('#team-slider');
owl.owlCarousel({
  autoplay: false,
  margin:40,
	dots: false,
	nav: true,
  loop: true,
	responsive:{
    0:{
        items:1,
        autoplay: true,
	  },
    480:{
        items:1,
        autoplay: true,
    },
    767:{
        items:1,
        autoplay: true,
    },
    1023:{
        items:1,	
        autoplay: true, 
    },
	  1024:{
        items:2,	 
    },
    1200:{
        items:2,
	  }, 
	  1400:{
        items:2,
	  }
  },
  onInitialized  : counter, //When the plugin has initialized.
  onTranslated : counter //When the translation of the stage has finished.
});
function counter(event) {
  var element   = event.target;         // DOM element, in this example .owl-carousel
  var items     = event.item.count;     // Number of items
  var item      = event.item.index + 1;     // Position of the current item
// it loop is true then reset counter from 1
  if(item > items) {item = item - items}
  $('#counter').html(+item+" / "+items)
  }
});
</script>
