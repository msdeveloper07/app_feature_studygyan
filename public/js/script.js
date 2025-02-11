   $(document).ready(function() {
       var getUrl = window.location;
       var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
       $("#order_review").height( $("#customer_details").height());
       $.ajax({
           type: "GET",
           url: baseUrl + '/public/main/get_all_data',
           beforeSend: function() {
               $('#loading-image').show();
           },
           complete: function() {
               $('#loading-image').hide();
           },
           success: function(data) {
               var object = jQuery.parseJSON(data);
               $.each(object, function(index, data) {
                   $('#' + index).val(data);
               });
           }
       });
       $('.form_get_display_option').on('submit', function(event) {
           event.preventDefault();
           var formData = {
               business_name: 't',
               dba_name: 't',
               business_logo_url: 't',
               payment_processor: $('input[name=payment_processor]').val(),
               selected_payment_processor_id_or_key: $('input[name=selected_payment_processor_id_or_key]').val(),
               selected_payment_processor_password_or_secret_value: $('input[name=selected_payment_processor_password_or_secret_value]').val(),
               _token: $('input[name=_token]').val(),
               shop: $('input[name=shop]').val()
           }
           $.ajax({
               type: "POST",
               url: $(this).attr('action'),
               data: formData,
               cache: false,
               beforeSend: function() {
                   $('#loading-image').show();
               },
               complete: function() {
                   $('#loading-image').hide();
               },
               success: function(data) {
                   console.log(data);
               }
           })
       });
       $('.form_set_scripts').on('submit', function(event) {
           event.preventDefault();
           var formData = {
               api_key: $('input[name=api_key]').val(),
               secret_key: $('input[name=secret_key]').val(),
               application_key: $('input[name=application_key]').val(),
               page_id: $('input[name=page_id]').val(),
               pixel_id: $('input[name=pixel_id]').val(),
               client_id: $('input[name=client_id]').val(),
               secret_key: $('input[name=secret_key]').val(),
               application_key: $('input[name=application_key]').val(),
               google_client_secret: $('input[name=google_client_secret]').val(),
               google_pixel: $('input[name=google_pixel]').val(),
               _token: $('input[name=_token]').val(),
               shop: $('input[name=shop]').val()
           }
        $.ajax({
               type: "POST",
               url: $(this).attr('action'),
               data: formData,
               cache: false,
               beforeSend: function() {
                   $('#loading-image').show();
               },
               complete: function() {
                   $('#loading-image').hide();
               },
               success: function(data) {
                   console.log(data);
               }
           })
       });
       $('.form_login').on('submit', function(event) {
           event.preventDefault();
           var formData = {
               uname: $('input[name=uname]').val(),
               psw: $('input[name=psw]').val(),
               shop: $('input[name=shop]').val(),
               _token: $('input[name=_token]').val(),
			   site_url: $('input[name=site_url]').val()
           }
           $.ajax({
               type: "POST",
               url: $(this).attr('action'),
               data: formData,
               cache: false,
               beforeSend: function() {
                   $('#loading-image').show();
               },
               complete: function() {
                   $('#loading-image').hide();
               },
               success: function(data) {
                   console.log(data);
               }
           })
       });
   });

