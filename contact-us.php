<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact | Vegleaf</title>
  <link rel="icon" href="#" type="image/ico">
  <!-- Bootstrap -->
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <?php include "header.php" ?>
  <div class="contact-form-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 contact-form-container">
          <div class="row">
            <div class="col-md-4 col-md-offset-1 contact-img">
              <div class="row">
                <img src="./images/contact-form-img.png" alt="" class="img-responsive">
              </div>
            </div>
            <div class="col-md-6 center contact-form d-flex flex-column">
              <h2>For any Enquiry? Write Us</h2>
              <form id="contactForm" method="POST">
                <div class="form-group custom-form">
                  <input type="text" class="form-control" id="name" minLength="2" required>
                  <label for="name">Name</label>
                </div>
                <div class="form-group custom-form">
                  <input type="email" class="form-control" id="email" required>
                  <label for="email">Email</label>
                </div>
                <div class="d-flex" style="justify-content: space-between;">
                  <div class="form-group custom-form w-50" style="padding-right: 30px;">
                    <input type="text" class="form-control" id="phone" minLength="8" pattern="^\d{8,
                    }$" required>
                    <label for="phone">Phone</label>
                  </div>
                  <div class="form-group custom-form w-50">
                    <input type="text" class="form-control" id="area" required>
                    <label for="area">Area</label>
                  </div>
                </div>
                
                <div class="form-group custom-form">
                  <input type="text" class="form-control" id="comments">
                  <label for="comments">Comments</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                <p class="form-text error-msg pt-3"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "footer.php" ?>
  <script>

    // Text based inputs
    var input_selector = ['text', 'password', 'email', 'url', 'tel', 'number', 'search', 'search-md'].map(function (selector) {
      return 'input[type=' + selector + ']';
    }).join(', ') + ', textarea';
    var text_area_selector = '.materialize-textarea';

    var update_text_fields = function update_text_fields($input) {

      var $labelAndIcon = $input.siblings('label, i');
      var hasValue = $input.val().length;
      var hasPlaceholder = $input.attr('placeholder');
      // let isValid     = $input.validity.badInput === true;
      var addOrRemove = (hasValue || hasPlaceholder ? 'add' : 'remove') + 'Class';

      $labelAndIcon[addOrRemove]('active');
    };
    var validate_field = function validate_field($input) {

      if ($input.hasClass('validate')) {
        var value = $input.val();
        var noValue = !value.length;
        var isValid = !$input[0].validity.badInput;

        if (noValue && isValid) {
          $input.removeClass('valid').removeClass('invalid');
        } else {
          var valid = $input.is(':valid');
          var length = Number($input.attr('length')) || 0;

          if (valid && (!length || length > value.length)) {
            $input.removeClass('invalid').addClass('valid');
          } else {
            $input.removeClass('valid').addClass('invalid');
          }
        }
      }
    };
    var textarea_auto_resize = function textarea_auto_resize() {

      var $textarea = $(undefined);
      if ($textarea.val().length) {
        var _$hiddenDiv = $('.hiddendiv');
        var fontFamily = $textarea.css('font-family');
        var fontSize = $textarea.css('font-size');

        if (fontSize) {
          _$hiddenDiv.css('font-size', fontSize);
        }
        if (fontFamily) {
          _$hiddenDiv.css('font-family', fontFamily);
        }
        if ($textarea.attr('wrap') === 'off') {
          _$hiddenDiv.css('overflow-wrap', 'normal').css('white-space', 'pre');
        }

        _$hiddenDiv.text($textarea.val() + '\n');
        var content = _$hiddenDiv.html().replace(/\n/g, '<br>');
        _$hiddenDiv.html(content);

        // When textarea is hidden, width goes crazy.
        // Approximate with half of window size
        _$hiddenDiv.css('width', $textarea.is(':visible') ? $textarea.width() : $(window).width() / 2);
        $textarea.css('height', _$hiddenDiv.height());
      }
    };
    // Set active on labels and icons (DOM ready scope);
    $(input_selector).each(function (index, input) {
      var $this = $(input);
      var $labelAndIcon = $this.siblings('label, i');
      update_text_fields($this);
      var isValid = input.validity.badInput; // pure js
      if (isValid) {
        $labelAndIcon.addClass('active');
      }
    });

    // Add active when element has focus
    $(document).on('focus', input_selector, function (e) {
      $(e.target).siblings('label, i').addClass('active');
    });

    // Remove active on blur when not needed or invalid
    $(document).on('blur', input_selector, function (e) {
      var $this = $(e.target);
      var noValue = !$this.val();
      var invalid = !e.target.validity.badInput;
      var noPlaceholder = $this.attr('placeholder') === undefined;

      if (noValue && invalid && noPlaceholder) {
        $this.siblings('label, i').removeClass('active');
      }

      validate_field($this);
    });

    // Add active if form auto complete
    $(document).on('change', input_selector, function (e) {
      var $this = $(e.target);
      update_text_fields($this);
      validate_field($this);
    });

    // Handle HTML5 autofocus
    $('input[autofocus]').siblings('label, i').addClass('active');

    // HTML form reset
    $(document).on('reset', function (e) {
      var $formReset = $(e.target);
      if ($formReset.is('form')) {

        var $formInputs = $formReset.find(input_selector);
        // Reset inputs
        $formInputs.removeClass('valid').removeClass('invalid').each(function (index, input) {
          var $this = $(input);
          var noDefaultValue = !$this.val();
          var noPlaceholder = !$this.attr('placeholder');
          if (noDefaultValue && noPlaceholder) {
            $this.siblings('label, i').removeClass('active');
          }
        });

        // Reset select
        $formReset.find('select.initialized').each(function (index, select) {
          var $select = $(select);
          var $visible_input = $select.siblings('input.select-dropdown');
          var default_value = $select.children('[selected]').val();

          $select.val(default_value);
          $visible_input.val(default_value);
        });
      }
    });

    // Textarea auto extend
    if ($('.md-textarea-auto').length) {
      var init = function init() {
        var text = $('.md-textarea-auto');
        text.each(function () {
          var _this = this;
          function resize() {
            _this.style.height = 'auto';
            _this.style.height = _this.scrollHeight + 'px';
          }
          /* 0-timeout to get the already changed text */
          function delayedResize() {
            window.setTimeout(resize, 0);
          }
          observe(_this, 'change', resize);
          observe(_this, 'cut', delayedResize);
          observe(_this, 'paste', delayedResize);
          observe(_this, 'drop', delayedResize);
          observe(_this, 'keydown', delayedResize);
          resize();
        });
      };

      var observe;
      if (window.attachEvent) {
        observe = function observe(element, event, handler) {
          element.attachEvent('on' + event, handler);
        };
      } else {
        observe = function observe(element, event, handler) {
          element.addEventListener(event, handler, false);
        };
      }

      init();
    }

    // Textarea Auto Resize
    if (!$('.hiddendiv').first().length) {
      $hiddenDiv = $('<div class="hiddendiv common"></div>');
      $('body').append($hiddenDiv);
    }

    $(text_area_selector).each(textarea_auto_resize);
    $('body').on('keyup keydown', text_area_selector, textarea_auto_resize);
  </script>
  <script>
    $(document).ready(function () {
      $('#contactForm').on('submit', function (e) {
        $('#contactForm .btn-primary').addClass("disabled");
        e.preventDefault();
        var formValidate = true;
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var area = $('#area').val();
        var delivery = $("input[name='delivery']:checked").val();
        var comments = $('#comments').val();
        // if (name == "") {
        //   $("#name").siblings("small").removeClass("invisible");
        //   formValidate = false;
        // }
        // if (number == "") {
        //   $("#contact-number").siblings("small").removeClass("invisible");
        //   formValidate = false;
        // }
        // if (message == "") {
        //   $("#message").siblings("small").removeClass("invisible");
        //   formValidate = false;
        // }
        if (formValidate) {
          $.ajax({
            type: "POST",
            url: 'formsubmit.php',
            data: { formValidate: formValidate, name: name, email: email, number: phone, delivery: delivery, message: comments },
            success: function (data) {
              $('.error-msg').html(data.errorMsg);
              $('#contactForm .btn-primary').removeClass("disabled");
              if (data.reset = true) {
                $('#contactForm')[0].reset();
              }
            }
          });
        }
      });
    });
  </script>
</html>