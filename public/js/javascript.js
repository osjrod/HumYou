'use strict';


$(document).ready(function(){

  

  $("#postear").click(function(){


    $.ajax({
          url: '/post',
          data: { text : $("#text").val()}
        })
        .done(function(response) {

              var HA=new RegExp(/(\S*#\[[^\]]+\])|(\S*#\S+)/gi),
              text=response.text,
              hashtags =(text.match(HA));

              var ME=new RegExp(/(\S*@\[[^\]]+\])|(\S*@\S+)/gi),
              text=response.text,
              mentions =(text.match(ME));

              try{

            for (var i = 0; i < mentions.length; i++){
              $.ajax({
                    url: '/createMention',
                    data: {  nickname: mentions[i], hum_id: response.id}
                  })
                  .done(function(response) {
                    console.log(response);
                  })
                  .fail(function() {
                    alert('error');
                  });
           }

         }
         catch(e){}


         try{
           for (var i = 0; i < hashtags.length; i++){
              $.ajax({
                    url: '/createHashtag',
                    data: {  tag: hashtags[i], hum_id: response.id}
                  })
                  .done(function(response) {
                    console.log(response);
                  })
                  .fail(function() {
                    alert('error');
                  });
           }
         }
         catch(x){}

           console.log(response);
           window.location.href = "/";
         

        })
        .fail(function() {
          alert('error');
        });


  });


$("#edit").click(function(){


    $.ajax({
          url: '/updateProfile',
          data: { id : $("#id").val(), name : $("#name").val(), last_name : $("#last_name").val(), email : $("#email").val(), avatar_path : $("#avatar_path").val(), phone : $("#phone").val(), birthday : $("#birthday").val(), biography : $("#biography").html()}
        })
        .done(function(response) {
             

           console.log(response);
         

        })
        .fail(function() {
          alert('error');
        });


  });


});

 
(function($) {

  
  $.fn.charCounter = function (max, settings) {
    max = max || 100;
    settings = $.extend({
      container: "<span></span>",
      classname: "charcounter",
      format: "(%1 characters remaining)",
      pulse: true,
      delay: 0
    }, settings);
    var p, timeout;
    
    function count(el, container) {
      el = $(el);
      if (el.val().length > max) {
          el.val(el.val().substring(0, max));
          if (settings.pulse && !p) {
            pulse(container, true);
          };
      };
      if (settings.delay > 0) {
        if (timeout) {
          window.clearTimeout(timeout);
        }
        timeout = window.setTimeout(function () {
          container.html(settings.format.replace(/%1/, (max - el.val().length)));
        }, settings.delay);
      } else {
        container.html(settings.format.replace(/%1/, (max - el.val().length)));
      }
    };
    
    function pulse(el, again) {
      if (p) {
        window.clearTimeout(p);
        p = null;
      };
      el.animate({ opacity: 0.1 }, 100, function () {
        $(this).animate({ opacity: 1.0 }, 100);
      });
      if (again) {
        p = window.setTimeout(function () { pulse(el) }, 200);
      };
    };
    
    return this.each(function () {
      var container;
      if (!settings.container.match(/^<.+>$/)) {
        // use existing element to hold counter message
        container = $(settings.container);
      } else {
        // append element to hold counter message (clean up old element first)
        $(this).next("." + settings.classname).remove();
        container = $(settings.container)
                .insertAfter(this)
                .addClass(settings.classname);
      }
      $(this)
        .unbind(".charCounter")
        .bind("keydown.charCounter", function () { count(this, container); })
        .bind("keypress.charCounter", function () { count(this, container); })
        .bind("keyup.charCounter", function () { count(this, container); })
        .bind("focus.charCounter", function () { count(this, container); })
        .bind("mouseover.charCounter", function () { count(this, container); })
        .bind("mouseout.charCounter", function () { count(this, container); })
        .bind("paste.charCounter", function () { 
          var me = this;
          setTimeout(function () { count(me, container); }, 10);
        });
      if (this.addEventListener) {
        this.addEventListener('input', function () { count(this, container); }, false);
      };
      count(this, container);
    });
  };

})(jQuery);

$(function() {
    $(".counted").charCounter(140,{container: "#counter"});
});
