jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/

jQuery(document).ready(function() {

  (function($) {
    $.fn.cascadeSlider = function(opt) {
      var $this = this,
        itemClass = opt.itemClass || 'cascade-slider_item',
        arrowClass = opt.arrowClass || 'cascade-slider_arrow',
        $item = $this.find('.' + itemClass),
        $arrow = $this.find('.' + arrowClass),
        itemCount = $item.length;

      var defaultIndex = 0;

      changeIndex(defaultIndex);

      $arrow.on('click', function() {
        var action = $(this).data('action'),
          nowIndex = $item.index($this.find('.now'));

        if(action == 'next') {
          if(nowIndex == itemCount - 1) {
            changeIndex(0);
          } else {
            changeIndex(nowIndex + 1);
          }
        } else if (action == 'prev') {
          if(nowIndex == 0) {
            changeIndex(itemCount - 1);
          } else {
            changeIndex(nowIndex - 1);
          }
        }

        $('.cascade-slider_dot').removeClass('cur');
        //$('.cascade-slider_dot').next().addClass('cur');
      });

      // add data attributes
      for (var i = 0; i < itemCount; i++) {
        $('.cascade-slider_item').each(function(i) {
          $(this).attr('data-slide-number', [i]);
        });
      }

      // dots
      $('.cascade-slider_dot').bind('click', function(){
        // add class to current dot on click
        $('.cascade-slider_dot').removeClass('cur');
        $(this).addClass('cur');

        var index = $(this).index();

        $('.cascade-slider_item').removeClass('now prev next');
        var slide = $('.cascade-slider_slides').find('[data-slide-number=' + index + ']');
        slide.prev().addClass('prev');
        slide.addClass('now');
        slide.next().addClass('next');

        if(slide.next().length == 0) {
          $('.cascade-slider_item:first-child').addClass('next');
        }

        if(slide.prev().length == 0) {
          $('.cascade-slider_item:last-child').addClass('prev');
        }
      });

      function changeIndex(nowIndex) {
        // clern all class
        $this.find('.now').removeClass('now');
        $this.find('.next').removeClass('next');
        $this.find('.prev').removeClass('prev');
        if(nowIndex == itemCount -1){
          $item.eq(0).addClass('next');
        }
        if(nowIndex == 0) {
          $item.eq(itemCount -1).addClass('prev');
        }

        $item.each(function(index) {
          if(index == nowIndex) {
            $item.eq(index).addClass('now');
          }
          if(index == nowIndex + 1 ) {
            $item.eq(index).addClass('next');
          }
          if(index == nowIndex - 1 ) {
            $item.eq(index).addClass('prev');
          }
        });
      }
    };
  })(jQuery);

    // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove();

	 // Makes sure last grid item floats left
	jQuery('.archive-grid .columns').last().addClass( 'end' );

	// Adds Flex Video to YouTube and Vimeo Embeds
  jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
    if ( jQuery(this).innerWidth() / jQuery(this).innerHeight() > 1.5 ) {
      jQuery(this).wrap("<div class='widescreen flex-video'/>");
    } else {
      jQuery(this).wrap("<div class='flex-video'/>");
    }
  });

});


/**
 * jQuery.marquee - scrolling text like old marquee element
 * @author Aamir Afridi - aamirafridi(at)gmail(dot)com / http://aamirafridi.com/jquery/jquery-marquee-plugin
 */
(function(f){f.fn.marquee=function(x){return this.each(function(){var a=f.extend({},f.fn.marquee.defaults,x),b=f(this),c,h,t,u,k,e=3,y="animation-play-state",n=!1,E=function(a,b,c){for(var e=["webkit","moz","MS","o",""],d=0;d<e.length;d++)e[d]||(b=b.toLowerCase()),a.addEventListener(e[d]+b,c,!1)},F=function(a){var b=[],c;for(c in a)a.hasOwnProperty(c)&&b.push(c+":"+a[c]);b.push();return"{"+b.join(",")+"}"},p={pause:function(){n&&a.allowCss3Support?c.css(y,"paused"):f.fn.pause&&c.pause();b.data("runningStatus",
"paused");b.trigger("paused")},resume:function(){n&&a.allowCss3Support?c.css(y,"running"):f.fn.resume&&c.resume();b.data("runningStatus","resumed");b.trigger("resumed")},toggle:function(){p["resumed"==b.data("runningStatus")?"pause":"resume"]()},destroy:function(){clearTimeout(b.timer);b.find("*").andSelf().unbind();b.html(b.find(".js-marquee:first").html())}};if("string"===typeof x)f.isFunction(p[x])&&(c||(c=b.find(".js-marquee-wrapper")),!0===b.data("css3AnimationIsSupported")&&(n=!0),p[x]());else{var v;
f.each(a,function(c,d){v=b.attr("data-"+c);if("undefined"!==typeof v){switch(v){case "true":v=!0;break;case "false":v=!1}a[c]=v}});a.speed&&(a.duration=a.speed*parseInt(b.width(),10));u="up"==a.direction||"down"==a.direction;a.gap=a.duplicated?parseInt(a.gap):0;b.wrapInner('<div class="js-marquee"></div>');var l=b.find(".js-marquee").css({"margin-right":a.gap,"float":"left"});a.duplicated&&l.clone(!0).appendTo(b);b.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');c=b.find(".js-marquee-wrapper");
if(u){var m=b.height();c.removeAttr("style");b.height(m);b.find(".js-marquee").css({"float":"none","margin-bottom":a.gap,"margin-right":0});a.duplicated&&b.find(".js-marquee:last").css({"margin-bottom":0});var q=b.find(".js-marquee:first").height()+a.gap;a.startVisible&&!a.duplicated?(a._completeDuration=(parseInt(q,10)+parseInt(m,10))/parseInt(m,10)*a.duration,a.duration*=parseInt(q,10)/parseInt(m,10)):a.duration*=(parseInt(q,10)+parseInt(m,10))/parseInt(m,10)}else k=b.find(".js-marquee:first").width()+
a.gap,h=b.width(),a.startVisible&&!a.duplicated?(a._completeDuration=(parseInt(k,10)+parseInt(h,10))/parseInt(h,10)*a.duration,a.duration*=parseInt(k,10)/parseInt(h,10)):a.duration*=(parseInt(k,10)+parseInt(h,10))/parseInt(h,10);a.duplicated&&(a.duration/=2);if(a.allowCss3Support){var l=document.body||document.createElement("div"),g="marqueeAnimation-"+Math.floor(1E7*Math.random()),A=["Webkit","Moz","O","ms","Khtml"],B="animation",d="",r="";l.style.animation&&(r="@keyframes "+g+" ",n=!0);if(!1===
n)for(var z=0;z<A.length;z++)if(void 0!==l.style[A[z]+"AnimationName"]){l="-"+A[z].toLowerCase()+"-";B=l+B;y=l+y;r="@"+l+"keyframes "+g+" ";n=!0;break}n&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s infinite "+a.css3easing,b.data("css3AnimationIsSupported",!0))}var C=function(){c.css("margin-top","up"==a.direction?m+"px":"-"+q+"px")},D=function(){c.css("margin-left","left"==a.direction?h+"px":"-"+k+"px")};a.duplicated?(u?a.startVisible?c.css("margin-top",0):c.css("margin-top","up"==a.direction?
m+"px":"-"+(2*q-a.gap)+"px"):a.startVisible?c.css("margin-left",0):c.css("margin-left","left"==a.direction?h+"px":"-"+(2*k-a.gap)+"px"),a.startVisible||(e=1)):a.startVisible?e=2:u?C():D();var w=function(){a.duplicated&&(1===e?(a._originalDuration=a.duration,a.duration=u?"up"==a.direction?a.duration+m/(q/a.duration):2*a.duration:"left"==a.direction?a.duration+h/(k/a.duration):2*a.duration,d&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s "+a.css3easing),e++):2===e&&(a.duration=a._originalDuration,
d&&(g+="0",r=f.trim(r)+"0 ",d=g+" "+a.duration/1E3+"s 0s infinite "+a.css3easing),e++));u?a.duplicated?(2<e&&c.css("margin-top","up"==a.direction?0:"-"+q+"px"),t={"margin-top":"up"==a.direction?"-"+q+"px":0}):a.startVisible?2===e?(d&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s "+a.css3easing),t={"margin-top":"up"==a.direction?"-"+q+"px":m+"px"},e++):3===e&&(a.duration=a._completeDuration,d&&(g+="0",r=f.trim(r)+"0 ",d=g+" "+a.duration/1E3+"s 0s infinite "+a.css3easing),C()):(C(),t={"margin-top":"up"==
a.direction?"-"+c.height()+"px":m+"px"}):a.duplicated?(2<e&&c.css("margin-left","left"==a.direction?0:"-"+k+"px"),t={"margin-left":"left"==a.direction?"-"+k+"px":0}):a.startVisible?2===e?(d&&(d=g+" "+a.duration/1E3+"s "+a.delayBeforeStart/1E3+"s "+a.css3easing),t={"margin-left":"left"==a.direction?"-"+k+"px":h+"px"},e++):3===e&&(a.duration=a._completeDuration,d&&(g+="0",r=f.trim(r)+"0 ",d=g+" "+a.duration/1E3+"s 0s infinite "+a.css3easing),D()):(D(),t={"margin-left":"left"==a.direction?"-"+k+"px":
h+"px"});b.trigger("beforeStarting");if(n){c.css(B,d);var l=r+" { 100%  "+F(t)+"}",p=c.find("style");0!==p.length?p.filter(":last").html(l):c.append("<style>"+l+"</style>");E(c[0],"AnimationIteration",function(){b.trigger("finished")});E(c[0],"AnimationEnd",function(){w();b.trigger("finished")})}else c.animate(t,a.duration,a.easing,function(){b.trigger("finished");a.pauseOnCycle?b.timer=setTimeout(w,a.delayBeforeStart):w()});b.data("runningStatus","resumed")};b.bind("pause",p.pause);b.bind("resume",
p.resume);a.pauseOnHover&&b.bind("mouseenter mouseleave",p.toggle);n&&a.allowCss3Support?w():b.timer=setTimeout(w,a.delayBeforeStart)}})};f.fn.marquee.defaults={allowCss3Support:!0,css3easing:"linear",easing:"linear",delayBeforeStart:1E3,direction:"left",duplicated:!1,duration:5E3,gap:20,pauseOnCycle:!1,pauseOnHover:!1,startVisible:!1}})(jQuery);
