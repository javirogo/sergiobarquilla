
var $check = $(".a input[type=checkbox]"),el;

$check
  .data('checked', 0)
  .click(function(e) {

    el = $(this);

    switch (el.data('checked')) {

        // indeterminate, going checked
      case 0:
        el.data('checked', 1);
        el.prop('indeterminate', false);
        el.prop('checked', true);
        el.val("1");
            
        break;

      // unchecked, going indeterminate
      case 1:
        el.data('checked', 2);
        el.prop('indeterminate', true);
        el.prop('checked', true);
        el.val("2");
        break;

        // checked, going unchecked
      default:
        el.data('checked', 0);
        el.prop('indeterminate', false);
        el.prop('checked', false);
        el.val("0");

    }

  });
