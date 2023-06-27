<!doctype html>
<html lang="en">

<head>
    <title>Admin | @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- VENDOR CSS -->
    
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/css/bootstrap-colorpicker.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/select2/css/select2.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/vendor/animate/animate.min.css') }}">
    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/summernote/summernote.css') }}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendor/datatables/css-main/jquery.dataTables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-assets/vendor/datatables/css-bootstrap/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin-assets/vendor/datatables-tabletools/css/dataTables.tableTools.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/new-main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/customstyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="32x32" href="{{ asset('images/favicon-32x32.ico') }}">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="{{ asset('images/favicon-32x32.ico') }}">
    <script src="{{ asset('admin-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .mt-5,
        .my-5 {
            margin-top: 3rem !important
        }

        .sidebar .nav li>a[data-toggle] .icon-submenu {
            top: 2px;
            left: 80px;
        }
        .form-wrap.form-builder .cb-wrap {
            position: initial !important;
        }
        .dashboard-col{
            /* border-radius: 30px 0px 0px 30px; */
            padding: 25px 25px 25px 45px;
            background-color: #fff;
        }
        
    input[type=search]::-webkit-search-cancel-button {
    -webkit-appearance: searchfield-cancel-button;
}

    </style>
    @yield('style')
</head>

<body style="background-color:rgba(93,203,198,.2)">

    <div id="page-overlay">
        <div class="page-overlay-loader"></div>
    </div>
    <!-- WRAPPER -->
    <div id="wrapper">
        @include('admin.sections.header')
        @include('admin.sections.sidebar')
        <!-- MAIN -->
        <div class="main">
            <div class="heading hidden-lg visible-xs mbl-head-des">
                <h1 class="page-title">@yield('title')</h1>
                <p class="page-subtitle">@yield('sub-title')</p>
            </div>
            @yield('content')
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; {{ date('Y') }} By <a href="#" target="_blank">CareMd</a>. All
                    Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->

    <script src="{{ asset('admin-assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables/js-main/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables/js-bootstrap/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/datatables-tabletools/js/dataTables.tableTools.js') }}"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>

    <script src="{{ asset('admin-assets/scripts/klorofilpro-common.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('admin-assets/js/custom.js') }}"></script>
    <script src="{{ asset('admin-assets/js/formcustom.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'  defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        //Generic Delete Function
        $(document).on('click', '.delete_function', function(e) {
            e.preventDefault();
            var url = ($(this).attr('href'));
            swal({
                    title: "Are you sure you want to Delete?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = url;
                    }
                });
        })
        var scrollTopDifference = 70;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (!$('.alert').hasClass('persist-alert')) {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);

        }

        function readURL(input, id, types, error_type_id, media_type) {
            if (input.files && input.files[0]) {
                var mimeType = input.files[0]['type'];
                var extention = mimeType.split('/');
                var file_type = extention[0];
                extention = extention[1];
                console.log(extention, 'here is extension')
                if (jQuery.inArray(extention, types) == -1) {
                    $('input[name="' + id + '"]').val('');
                    var error_message = types.join(", ");
                    error_message = 'The ' + media_type + ' must be a file of type: ' + media_type + '/' + error_message;
                    $('#' + error_type_id).css('display', 'block');
                    $('#' + error_type_id).html(error_message);
                } else {
                    var size = input.files[0]['size'];
                    size = size / 1024;
                    var max_size = (file_type == "image") ? config('constants.file_size') : config(
                        'constants.video_file_size');

                    if (size > max_size) {
                        max_size = max_size / 1024;
                        $('input[name="' + id + '"]').val('');
                        $('#' + error_type_id).css('display', 'block');
                        $('#' + error_type_id).html('The ' + file_type + ' size must be ' + max_size + 'MB or less.');
                    } else {
                        $('#' + error_type_id).css('display', 'none');
                        if (file_type == 'image') {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('#' + id).attr('src', e.target.result);
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                }
            }
        }

        function showOverlayLoader() {
            document.getElementById("page-overlay").style.display = "block";
        }

        function hideOverlayLoader() {
            document.getElementById("page-overlay").style.display = "none";
        }
        $(function() {
            $("body").on("change",".status",function(){
                    $(this).closest('form').submit();
            });
        });
    </script>
    <script>
        @if (Session::has('flash_success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('flash_success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <!-- <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
          cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
          encrypted: true,
      });
  </script>
  <script>
      var channel = pusher.subscribe('notification');
      channel.bind('notification-sent', function(data) {
          console.log(JSON.stringify(data));
          if (data["notificationObj"] != undefined && data["notificationObj"]["type"] == 1) {
              $.ajax({
                  type: 'POST',
                  url: '/admin/ajax-received-notification',
                  data: {
                      id: data["notificationObj"]["id"]
                  },
                  success: function(data) {
                      $(".notifications").prepend(data.html);
                      var badge = $('.badge.bg-danger').html();
                      badge = (typeof badge === "undefined") ? 0 : badge;
                      if (badge == 0) {
                          $('.dropdown-toggle.icon-menu').append(
                              '<span class="badge bg-danger"></span>');
                      }
                      badge = parseInt(badge) + 1;
                      $('.badge.bg-danger').html(badge);
                      $('.noti-head-sett').html('You have ' + badge + ' new notifications');
                  }
              });
          }
      });
  </script> -->

    @yield('js')

</body>

</html>
