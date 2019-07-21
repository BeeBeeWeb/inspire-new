$(function () {

  // Get the form.
  var form = $('#contact-us-form');

  // Get the messages div.
  var formMessages = $('.form-submit-progress');

  // Set up an event listener for the contact form.
  $(form).submit(function (e) {
    // Stop the browser from submitting the form.
    e.preventDefault();

    $('.submit-btn').addClass('running');
    $('form input, form button, form textarea').prop("disabled", true);

    // Serialize the form data.
    var formData = $(form).serialize();

    // Submit the form using AJAX.
    $.ajax({
      type: 'POST',
      url: $(form).attr('action'),
      data: formData
    })
      .done(function (response) {
        console.log('SUCCESS');
        // Make sure that the formMessages div has the 'success' class.
        $('.form-submit-progress').css('display', 'block');
        $(formMessages).removeClass('error success fade-in');
        $(formMessages).addClass('success fade-in');

        // Set the message text.
        $(formMessages).text(response);
        $('.submit-btn').removeClass('running');
        $('.submit-btn').html('Message Sent');
        setTimeout(function() {
          $('.submit-btn').html('Submit<div class="ld ld-ring ld-spin"></div>');
          $(formMessages).removeClass('success fade-in');
        }, 4000);

        // Clear the form.
        $('#contact-us-form').trigger("reset");
        $('form input, form button, form textarea').prop("disabled", false);
      })
      .fail(function (data) {
        console.log('FAILED');
        // Make sure that the formMessages div has the 'error' class.
        $('.form-submit-progress').css('display', 'block');
        $(formMessages).removeClass('error success fade-in');
        $(formMessages).addClass('error fade-in');

        // Set the message text.
        if (data.responseText !== '') {
          $(formMessages).html(data.responseText);
        } else {
          $(formMessages).html('Oops! An error occured and your message could not be sent.');
        }

        $('.submit-btn').removeClass('running');
        $('.submit-btn').html('Message Sent');
        setTimeout(function () {
          $('.submit-btn').html('Submit<div class="ld ld-ring ld-spin"></div>');
          $(formMessages).removeClass('success fade-in');
        }, 4000);
        $('form input, form button, form textarea').prop("disabled", false);
      });

  });
});