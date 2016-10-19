 $(function() {
      var gnav = $('.gnav');
      var modal = $('.modal');
      var gnavbtn = $('.gnav-btn');
      gnavbtn.on('click', function() {
        if ($(this).hasClass('is-open')) {
          $(this).removeClass('is-open');
          gnav.removeClass('on');
          modal.removeClass('on');
        } else {
          $(this).addClass('is-open');
          gnav.addClass('on');
          modal.addClass('on');
        }
      });
      modal.on("click", function() {
        $(this).removeClass("on");
        gnav.removeClass("on");
        gnavbtn.removeClass('is-open');
      });
    });