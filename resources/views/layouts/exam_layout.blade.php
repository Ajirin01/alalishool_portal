
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Al-Ali International School CBT</title>

  <script src="{{ asset('typemath/js/codemirror.min.js') }}"></script>
  <script src="{{ asset('typemath/js/xml.min.js') }}"></script>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset( 'adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset( 'adminlte/dist/css/adminlte.min.css') }}">
  <style>
    @media (max-width: 767.98px){
        .main-sidebar, .main-sidebar::before {
            box-shadow: none!important;
            margin-left: 0px !important;
        }
    }
    ul li{
        display: inline;
        list-style: none;
    }

    /* ul a li{
        color: orangered
    } */

    .questions-container{
        width: 90%;
        margin: 0 auto;
        background-color: rgb(238, 236, 236);
        padding: 20px;
        border-radius: 10px;
        box-shadow: rgba(75, 74, 74, 0.479) -5px 4px 10px;
        /* color: rgba(4, 4, 190, 0.603) */
    }

    .paint-container{
        background-color: white;
        width: 300px;
        height: 170px;
        background-color: rgb(206, 205, 205);
        padding: 20px;
        border-radius: 10px;
        box-shadow: rgb(75, 74, 74) -5px 4px 15px;
        
    }

    .plot-area{
        margin: 50px;
        display: none;
    }

    .unanswered-box{
        background-color: rgba(4, 4, 190, 0.603);
        margin: 10px;
        padding: 10px;
        border: 4px solid white;
    }

    .correct-box{
        background-color: green;
        margin: 10px;
        padding: 10px;
        border: 4px solid white
    }

    .wrong-box{
        background-color: red;
        margin: 10px;
        padding: 10px;
        border: 4px solid white
    }

    .intercept-box{
        background-color: rgb(255, 0, 191);
        margin: 10px;
        padding: 10px;
        border: 4px solid white
    }

    .active{
        background-color: rgb(9, 5, 46);
        color: white;
        /* background-color: rgb(173, 171, 171); */
        padding: 10px;
        border-radius: 3px;
        margin: 4px;
        box-shadow: rgb(74, 74, 75) -3px 2px 10px;
        width: 40px;
        text-align: center;
        text-decoration: none;
        font-size: 1.3rem;
        font-weight: 800;
    }

    .answered{
        background-color: rgb(4, 116, 41);
        /* background-color: rgb(173, 171, 171); */
        padding: 10px;
        border-radius: 3px;
        margin: 4px;
        box-shadow: rgb(74, 74, 75) -3px 2px 10px;
        width: 40px;
        text-align: center;
        color: rgb(15, 13, 13);
        text-decoration: none;
        font-size: 1.3rem;
        font-weight: 800;
        border-left: 2px rgba(173, 171, 171, 0.781) solid;
        border-bottom: 2px rgb(173, 171, 171) solid
    }

    .question-link{
        background-color:rgb(22, 22, 22);
        padding: 10px;
        border-radius: 3px;
        margin: 4px;
        box-shadow: rgba(74, 74, 75, 0.712) -3px 2px 10px;
        width: 40px;
        text-align: center;
        color:rgb(173, 171, 171);
        text-decoration: none;
        font-size: 1.3rem;
        font-weight: 800;
        border-left: 2px rgba(173, 171, 171, 0.781) solid;
        border-bottom: 2px rgb(173, 171, 171) solid
    }

    #next-previous{
        margin-right: 0 auto;
        text-align: center
    }

    #next-previous a{
        color: rgb(22, 22, 22);
        text-decoration: none;
        font-size: 1.3rem;
        font-weight: 800;
    }

    .pager-container{
        margin: 50px auto;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 80%;
        
    }

    @media (max-width: 750px) {
        .pager-container{
            flex-direction: column;
            justify-content: space-between;
        }
    }
    

    #pager{
        width: 280px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        margin-left: -10px
    }

    .submit-btn-container{
        width: 100%;
        text-align: center;
    }

    .submit-btn{
        width: 100px;
        border: none;
        color: white;
        background-color: rgb(9, 5, 46);
        padding: 10px 5px;
        border-radius: 5px;
        /* display: none; */
        text-align: center
    }

    .answer-content{
       /* margin-top: -3px;  */
       padding-left: 20px
    }

    .answer-item{
        display: flex; 
        flex-direction: row; 
        justify-content: flex-start"
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-home"></i> <span class="student-class text-primary"></span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" id="fullscreen" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li> --}}
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="width: 300px">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ asset( 'images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Al-Ali International School</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                {{-- <img src="{{ asset( 'adminlte/images/logo.png') }}" class="img-circle elevation-2" alt="User Image"> --}}
                <i class="fa fa-user" style="color: white; transform: scale(1.5); padding: 5px 5px; border-radius: 50px; background-color: gray; margin-top: 6px"></i>
                </div>
                <div class="info">
                <a href="#" class="d-block pl-3">{{ Auth::user()->name }}</a>
                </div>
            </div>

            @if ($exam_paper !== null)
                <div class="mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block pl-3"><b>Exam year:</b> <span id="exam-year">{{$exam_paper->exam->year->year}}</span></a>
                    </div>

                    <div class="info">
                        <a href="#" class="d-block pl-3"><b>Subject:</b> <span id="exam-subject">{{$exam_paper->subject->name}}</span></a>
                    </div>
                </div>

                <div class="mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px gray solid">
                    <div class="info">
                        <a href="#" class="d-block pl-3"><b>Term:</b> <span id="exam-term">{{$exam_paper->exam->term->name}}</span></a>
                    </div>

                    <div class="info">
                        <a href="#" class="d-block pl-3"><b>Exam duration:</b> <span id="exam-duration">{{$exam_paper->duration}}</span></a>
                    </div>
                </div>
            @endif

            
        
            <ul id="pager"></ul>
        
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 300px">
        @yield('header-content')
        @yield('main-content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer" style="margin-left: 300px">
        <strong>Copyright &copy; 2022 <a href="https://digirealm.com.ng">Digi-Reaml City Solution</a>.</strong>
            All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('typemath/js/prism.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset( 'adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset( 'adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
    const user = {{ Js::from(Auth::user())}}
    // console.log(user)

    // get student's class
    fetch("{{URL::to('')}}"+"/api/query_classes_table", {
        method: "POST",
        headers: {
            'Content-type': 'application/json'
        },
        body: JSON.stringify({
            id: user.student.classes_id
        })
    }).
    then(response => response.json()).
    then(res => {
        // console.log(res[0])
        $(".student-class").append(res[0].name)
    })

</script>
</body>
</html>
