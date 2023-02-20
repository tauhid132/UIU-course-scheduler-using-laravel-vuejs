@extends('master')
@section('content')
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">
        @include('admin.includes.topbar')
        <aside class="main-sidebar"> 
            @include('admin.includes.sidebar')
        </aside>
        <div class="content-wrapper"> 
            <!-- Content Header (Page header) -->
            <div class="content-header sty-one">
                <h1 class="text-black"><i class="fa fa-users"></i> Scheduler</h1>
                
            </div>
            <!-- Main content -->
            <div class="content"> 
                <div id="app">
                    <drag></drag>
                </div>
            </div>
        </div>
        <!-- /.content --> 
    </div>
</body>

@endsection