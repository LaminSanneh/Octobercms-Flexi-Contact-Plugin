$('.flexiContactForm').on 'ajaxSuccess', (ev, context, data, status, jqXHR) ->
  if data.error is true
    console.log(arguments)
  else
    $('.form-groups').hide(1000)