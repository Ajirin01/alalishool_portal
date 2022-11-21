<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Al-Ali CBT Admin Portal</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/dist/css/adminlte.min.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/toastr/toastr.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Poppers App -->
    <script src="{{ asset( 'adminlte/dist/js/poppers.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/jquery/jquery.min.js') }}"></script>
    
    {{-- <script src="{{ asset( 'adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

    <script src="{{ asset( 'adminlte/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <style>
      i{
        cursor: pointer;
        transition: .3s ease-in-out
      }

      i:hover{
        color:brown;
        transform: scale(1.2)
      }
    </style>
</head>
<body>
    
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="{{ asset('images/logo.png') }}" alt="AdminLTELogo" height="130" width="150">
        </div>
      
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                Profile <span class="caret"></span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">
                  <span data-toggle="modal" data-target="#modal-xl-profile-view"><i class="fa fa-eye" ></i> View</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span data-toggle="modal" data-target="#modal-xl-profile-edit"><i class="fa fa-edit" ></i> Edit</span>
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="#" class="brand-link">
            <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Al-Ali Internal School</span>
          </a>
      
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                  <a href="{{ route('dashboard') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                </li>

                @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                  <li class="nav-item">
                    <a href="{{ route('manage-questions-options') }}" class="nav-link">
                      <i class="nav-icon fa fa-question-circle"></i>
                      <p>
                        Questions
                      </p>
                    </a>
                  </li>
                @endif
                
                @if (Auth::user()->role == "admin")
                  <li class="nav-item">
                    <a href="{{ route('manage-years') }}" class="nav-link">
                      <i class="nav-icon far fa-calendar-alt"></i>
                      <p>
                        Years
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('manage-terms') }}" class="nav-link">
                      <i class="nav-icon fa fa-calendar"></i>
                      <p>
                        Terms
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('manage-classes') }}" class="nav-link">
                      <i class="nav-icon fa fa-home"></i>
                      <p>
                        Classes
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('manage-subjects') }}" class="nav-link">
                      <i class="nav-icon fa fa-book"></i>
                      <p>
                        Subjects
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('manage-exams-options') }}" class="nav-link">
                      <i class="nav-icon fa fa-hourglass-half"></i>
                      <p>
                        Exams
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('manage-exam-papers-options') }}" class="nav-link">
                      <i class="nav-icon fa fa-newspaper"></i>
                      <p>
                        Exam Papers
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('manage-teachers') }}" class="nav-link">
                      <i class="nav-icon fa fa-users"></i>
                      <p>
                        Teachers
                      </p>
                    </a>
                  </li>
                @endif
              
                @if (Auth::user()->role == "admin" || Auth::user()->role == "teacher")
                  <li class="nav-item">
                    <a href="{{ route('manage-results-options') }}" class="nav-link">
                      <i class="nav-icon fa fa-book"></i>
                      <p>
                        Results
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('manage-students-options') }}" class="nav-link">
                      <i class="nav-icon fa fa-users"></i>
                      <p>
                        Students
                      </p>
                    </a>
                  </li>
                @endif

                <li class="nav-item" style="color: red">
                  <a href="{{ route('admin-logout') }}" class="nav-link">
                    <i class="nav-icon fa fa-logout"></i>
                    <p style="color: red">
                      Logout
                    </p>
                  </a>
                </li>

              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- /.content-header -->
            <section class="content">
              <div class="container-fluid">
                {{-- profile component --}}
                <x-general.profile-view-edit />

                <!-- Main content -->
                @yield('admin-content')
                <!-- /.content -->
              </div>
              <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <footer class="main-footer">
          <strong>Copyright &copy; 2022 <a href="https://digirealm.com.ng">Digi-Reaml City Solution</a>.</strong>
          All rights reserved.
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
          </div>
        </footer>
      
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->


    <!-- jQuery -->
    {{-- <script src="{{ asset( 'adminlte/plugins/jquery/jquery.min.js') }}"></script> --}}
    <!-- Bootstrap 4 -->
    {{-- <script src="{{ asset( 'adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <!-- Select2 -->
    <script src="{{ asset( 'adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset( 'adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset( 'adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset( 'adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset( 'adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset( 'adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset( 'adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- BS-Stepper -->
    {{-- <script src="{{ asset( 'adminlte/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script> --}}
    <!-- dropzonejs -->
    <script src="{{ asset( 'adminlte/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset( 'adminlte/dist/js/adminlte.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset( 'adminlte/dist/js/demo.js') }}"></script> --}}
    <!-- Summernote -->
    <script src="{{ asset( 'adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset( 'adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset( 'adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset( 'adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toastr -->
  	<script src="{{ asset( 'adminlte/plugins/toastr/toastr.min.js') }}"></script>

    <script src="{{ asset( 'adminlte/query-object.js') }}"></script>

    <script>
        $(document).ready(function(){
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        })
    </script>
    
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
            format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        // document.addEventListener('DOMContentLoaded', function () {
        //     window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        // })
    </script>
    <script>
        $(document).ready(function(){
          // $('#summernote').summernote()
          $('#summernote1addquestion').summernote()
          $('#summernote2addquestion').summernote()
          $('#summernote3addquestion').summernote()
          $('#summernote4addquestion').summernote()
          $('#summernote5addquestion').summernote()
        })

        function initTextArea(id){
            $("#"+id).summernote()
        }
        

    </script>

    {{-- custom scripts for ajax and alert --}}
    <script>
        var Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        function infoAlert(message) {
          $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Please wait',
            body: message
          })
        }

        function successAlert(message){
          Toast.fire({
              icon: 'success',
              title: message
          })
        }

        function errorAlert(message){
          Toast.fire({
              icon: 'error',
              title: message
          })
        }

        function updateData(data, updateID, noun){
          $('.modal').css('opacity', 0)
          document.getElementById('ajax-loader').style.display = 'block'

          fetch("/api/"+noun+"s/" + updateID, {
            method: "PUT",
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(data)
          }).
          then(response => response.json()).
          then(res => {
            let field = noun.split("_")

            if(field.length > 1){
                field = field[1]
            }else{
                field = field[0]
            }

            if(field == "classe" || field == "term" || field == "subject"){
              field = "name"
            }

            if(field == "result"){
              field = "score"
            }
            
            // console.log((noun + updateID + "output"))

            if(noun == "question_answer"){
                changeAnswerOutputStyle(noun, updateID, res)
            }

            document.getElementById(noun + updateID + "output").innerHTML =   res.data[field]
            console.log(res.data[field])

            document.getElementById("closeupdate" + updateID + noun).click() 
            // console.log(res.message)
            successAlert("<h5>"+ res.message +"</h5>")
            document.getElementById('ajax-loader').style.display = 'none'
            $('.modal').css('opacity', 1)
          })
        }

        function deleteRecord(id, noun, area){
          // console.log("delete", id, noun)
          $('.modal').css('opacity', 0)
          document.getElementById('ajax-loader').style.display = 'block'

          fetch("/api/"+noun+"s/" + id, {
              method: "DELETE",
              headers: {
                  'Content-type': 'application/json'
              },
          }).
          then(response => response.json()).
          then(res => {
              document.getElementById("closedelete" + id + noun).click() 
              document.getElementById(noun + id + area).style.display = "none"
              // console.log(res.message)
              successAlert("<h5>"+ res.message +"</h5>")
              document.getElementById('ajax-loader').style.display = 'none'
              $('.modal').css('opacity', 1)
          })

        }

        function addRecords(noun, componentUrl, data, key){
            console.clear()
            console.log(data)

            if(data.length > 0){
                $('#custom-tabs-five-normal2').css('opacity', 0)
                document.getElementById('ajax-loader2').style.display = 'block'

                fetch("/api/"+noun+"s/", {
                    method: "POST",
                    headers: {
                        'Content-type': 'application/json'
                    },
                    body: JSON.stringify(data)
                }).
                then(response => response.json()).
                then(res => {
                    let params = ""

                    res.data.forEach((nounObject, index) => {
                        params = "?id=" + nounObject.id + "& noun= " + noun + "& key= " + key


                        fetch(componentUrl + params, {
                            method: "GET",
                            headers: {
                                'Content-type': 'application/json'
                            }
                        }).then(comRes => comRes.text()).then(component => {
                            document.getElementById(noun+"-table-body").innerHTML += component
                            // console.log(component)

                            successAlert("<h5>"+ res.message +"</h5>")
                            
                            $("#text"+ (index + 1) +"add"+noun).val('')
                            $("#summernote"+ (index + 1) +"add"+noun).summernote('code', '')

                            $('#custom-tabs-five-normal2').css('opacity', 1)
                            document.getElementById('ajax-loader2').style.display = 'none'
                        })
                    })
                    
                    data = []
                })
            }else{
                errorAlert("<h5>Can not submit!</h5> <p>Please Fill one or more years</p>")
            }
        }

        function loopTextFieldsToData(noun, key){
            for (let i = 1; i <= 5; i++) {
              let field = $("#text"+ i +"add"+ noun).val()

              if (field.trim().length !== 0) {
                  let temp_obj = {}
                  temp_obj[key] = field
                  data.push(temp_obj)
              }
          }
        }
    </script>

    <script>
      var name = ""
      var phone = ""
      var email = ""
      var password = ""
      var data = {}

      function handleNameChange(){
          name = event.target.value
      }

      function handlePhoneChange(){
          phone = event.target.value
      }

      function handleEmailChange(){
          email = event.target.value
      }

      function handlePasswordChange(){
          password = event.target.value
      }

      function updateProfile(id, noun){
          name = $("#name-edit-profile").val()
          phone = $("#phone-edit-profile").val()
          email = $("#email-edit-profile").val()
          password = $("#password-edit-profile").val()

          var data = {
              name,
              email,
              phone
          }

          if(password !== "" ){
            data['password'] = password
          }

          $('.modal').css('opacity', 0)
          document.getElementById('ajax-loader').style.display = 'block'

          if(noun == 'admin'){
            fetch("/api/user/update/" + {{Auth::user()->id}}, {
              method: "PUT",
              headers: {
                  'Content-type': 'application/json'
              },
              body: JSON.stringify(data)
            }).
            then(response => response.json()).
            then(res => {
              document.getElementById("closeupdate-profile").click() 
              // console.log(res.message)
              successAlert("<h5>"+ res.message +"</h5>")
              document.getElementById('ajax-loader').style.display = 'none'
              $('.modal').css('opacity', 1)
            })
          }else{
            fetch("/api/user/update/" + {{Auth::user()->id}}, {
              method: "PUT",
              headers: {
                  'Content-type': 'application/json'
              },
              body: JSON.stringify(data)
            }).
            then(response => response.json()).
            then(res => {
              fetch("/api/"+ noun +"s/" + res.data.id, {
                method: "PUT",
                headers: {
                  'Content-type': 'application/json'
                },
                body: JSON.stringify(data)
              }).
              then(role_response => role_response.json()).
              then(role_res => {
                document.getElementById("closeupdate-profile").click() 
                // console.log(res.message)
                successAlert("<h5>"+ res.message +"</h5>")
                document.getElementById('ajax-loader').style.display = 'none'
                $('.modal').css('opacity', 1)
              })
            })
          } 
      }
    </script>
</body>
</html>