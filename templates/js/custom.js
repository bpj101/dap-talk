    'use strict';

    $(document).ready(function() {
      $('.nav li').click(function(e) {
        $('.nav .active').removeClass('active');
        $(this).addClass('active');
        // var $parent = $(this).parent();
        // if (!$parent.hasClass('active')) {
        //   $parent.addClass('active');
        // }
  // e.preventDefault();

      });
    });
