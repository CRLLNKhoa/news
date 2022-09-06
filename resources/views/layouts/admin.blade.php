<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Adminstrator
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('backend/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('backend/assets/demo/demo.css')}}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    @include('backend.includes.sidebar')
    <div class="main-panel">
      @include('backend.includes.nav')
      <div class="content">
        @yield('content')
      </div>
      @include('backend.includes.footer')
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('backend/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('backend/assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('backend/assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('backend/assets/demo/demo.js')}}"></script>
  <link rel="stylesheet" href="{{asset('backend/assets/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <script src="{{asset('backend/assets/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  @include('backend.includes.profile')
  @if (session('status'))
  <script>
    color = 'success';

      $.notify({
        icon: "nc-icon nc-check-2",
        message: "{{session('status')}}"

      }, {
        type: color,
        timer: 3000,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
  </script>
  @endif 
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <script>
      color = 'danger';

        $.notify({
          icon: "nc-icon nc-simple-remove",
          message: "{{ $error }}"

        }, {
          type: color,
          timer: 5000,
          placement: {
            from: 'top',
            align: 'right'
          }
        });
    </script>
    @endforeach
@endif
  <script>

    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
    $('#showpass').click(function(){
        var x = document.getElementById("password");
        // var y = document.getElementById("confirm");
        if (x.type === "password") {
          x.type = "text";
          // y.type = "text";
        } else {
          x.type = "password";
          // y.type = "password";
        }
    });
    // function showpass() {
        
    //   }
  </script>

  @yield('js')

</body>

</html>
