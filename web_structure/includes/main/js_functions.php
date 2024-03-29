<script src="js/jquery-1.9.1.min.js"></script>     
<script src="slick/slick.min.js"></script>
<script src="magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>     
<script src="js/bootstrap.min.js"></script> 
<script>


function result_info() {
  var newLine = "\r\n"
  var msg = "Je kunt de resultaten als volgt bekijken."
  msg += newLine;
  msg += "Je vult een race id in die gekoppeld staat aan een race.";
  msg += newLine;
  msg += "De race id's zijn gebaseerd op de kalender volgorde.";
  msg += newLine;
  msg += newLine;
  msg += "Zoals :";
  msg += newLine;
  msg += "Australië = 1";
  msg += newLine;
  msg += "Bahrein = 2";
  msg+= newLine;
  msg += "China = 3";
  msg+= newLine;
  msg += "etc.";
  alert(msg);
}

function getOffSet(){
  var _offset = 450;
  var windowHeight = window.innerHeight;

  if(windowHeight > 500) {
    _offset = 400;
  } 
  if(windowHeight > 680) {
    _offset = 300
  }
  if(windowHeight > 830) {
    _offset = 210;
  }

  return _offset;
}

function setParallaxPosition($doc, multiplier, $object){
  var offset = getOffSet();
  var from_top = $doc.scrollTop(),
    bg_css = 'center ' +(multiplier * from_top - offset) + 'px';
  $object.css({"background-position" : bg_css });
}

// Parallax function
// Adapted based on https://codepen.io/roborich/pen/wpAsm        
var background_image_parallax = function($object, multiplier, forceSet){
  multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
  multiplier = 1 - multiplier;
  var $doc = $(document);
  // $object.css({"background-attatchment" : "fixed"});

  if(forceSet) {
    setParallaxPosition($doc, multiplier, $object);
  } else {
    $(window).scroll(function(){          
      setParallaxPosition($doc, multiplier, $object);
    });
  }
};

var background_image_parallax_2 = function($object, multiplier){
  multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
  multiplier = 1 - multiplier;
  var $doc = $(document);
  $object.css({"background-attachment" : "fixed"});
  $(window).scroll(function(){
    var firstTop = $object.offset().top,
        pos = $(window).scrollTop(),
        yPos = Math.round((multiplier * (firstTop - pos)) - 186);              

    var bg_css = 'center ' + yPos + 'px';

    $object.css({"background-position" : bg_css });
  });
};

$(function(){
  // Hero Section - Background Parallax
  background_image_parallax($(".tm-parallax"), 0.30, false);
  background_image_parallax_2($("#contact"), 0.80);   
  
  // Handle window resize
  window.addEventListener('resize', function(){
    background_image_parallax($(".tm-parallax"), 0.30, true);
  }, true);

  // Detect window scroll and update navbar
  $(window).scroll(function(e){          
    if($(document).scrollTop() > 120) {
      $('.tm-navbar').addClass("scroll");
    } else {
      $('.tm-navbar').removeClass("scroll");
    }
  });
  
  // Close mobile menu after click 
  $('#tmNav a').on('click', function(){
    $('.navbar-collapse').removeClass('show'); 
  })
  
  // Add smooth scrolling to all links
  // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 400, function(){
        window.location.hash = hash;
      });
    } // End if
  });

});
</script>