(function($) {
    $.fn.autosubmit = function() {
      this.submit(function(event) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
          type: form.attr('method'),
          url: form.attr('action'),
          data: form.serialize()
        }).done(function(data) {

            loadMain(data);
            loadID(data);
            loadID('selectName');
            changeDefaultSelect();
            loadID('selectedName');            

        }).fail(function(data) {
            alert('fail postData');
        });
      });
      return this;
    };
  })(jQuery);


$(function() {
    $('form[data-autosubmit]').autosubmit();
  });