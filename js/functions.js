jQuery(document).ready( function() {

        /** 
         *  Slider Functions 
         *  ----------------------------
         *
         *  @author Will Haynes
         *
         */

         // Globals

         var count = jQuery('ul.slider-nav li').length;
         var position = 3;


         /** 
          * Slide timer 
          * Programically clicks the little bullet every 5 seconds.
          */
         var slideTimer = setInterval( function() {

                 var clickIndex = (position+1)%(count) + 1;
                 jQuery('ul.slider-nav li:nth-child(' + clickIndex + ')').find('a').click();

                 position+=1;

         },5000);

         /**
          * Reset the interval when hover occurs 
          */
         jQuery('#slider').hover(function() {
                 clearInterval(slideTimer);
         }, function() {
                 slideTimer = setInterval( function() {

                         var clickIndex = (position+1)%(count) + 1;
                         console.log(clickIndex);
                         jQuery('ul.slider-nav li:nth-child(' + clickIndex + ')').find('a').click();

                         position+=1;

                 },5000);
         });

         /**
          * Nav Click
          * Handles when the user clicks on an item on the nav
          */
         jQuery("ul.slider-nav li a").click( function(e) {

                 // Prevent default action.
                 e.preventDefault();

                 // Duration of animation
                 var dur = 400;
                 
                 // this element.
                 var t = jQuery(this);

                 if(!t.hasClass('active')) {

                         /* UL LIST */

                         // Remove the active class from all the other links
                         jQuery('ul.slider-nav a').each( function() {
                                 jQuery(this).removeClass('active');
                         });

                         // add the active class to this link
                         t.addClass('active');

                         // the index of the dot clicked
                         var index = t.parents('ul.slider-nav').find('li').index(t.parent('li'));

                         /* TEXT CONTENT */

                         // Hide the current content
                         jQuery('.slide-content-inner.active').animate({
                                 "opacity":0
                         },dur);

                         // Set the opacity back to one, and make sure no content is shown.
                         setTimeout(function() {

                                jQuery('.slide-content-inner').css({
                                         "display":"none",
                                         "opacity":1
                                 });

                                jQuery('.slide-content-inner').removeClass('active');

                                // Fade in the new
                                 jQuery('.slide-content .slide-content-inner:nth-child('+(index+1)+')').css({
                                         "opacity":0,
                                         "display":"block"
                                 }).animate({
                                         "opacity":1
                                 },dur).addClass('active');

                         },dur);

                         /* IMAGE */

                         // Hide the current content
                         jQuery('.main-slide-image.active').animate({
                                 "opacity":0
                         },dur);

                         // Set the opacity back to one, and make sure no content is shown.
                         setTimeout(function() {

                                jQuery('.main-slide-image').css({
                                         "display":"none",
                                         "opacity":1
                                 });

                                 jQuery('.main-slide-image.active').removeClass('active');

                                // Fade in the new
                                 jQuery('.slide-image-container .main-slide-image:nth-child('+(index+1)+')').css({
                                         "opacity":0,
                                         "display":"block"
                                 }).animate({
                                         "opacity":1
                                 },dur).addClass('active');

                         },dur);


                 } /* !hasClass */

         });



});