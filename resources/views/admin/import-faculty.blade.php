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
                <h1 class="text-black"><i class="fa fa-plus"></i> Import Faculty From Excel</h1>
                <ol class="breadcrumb">
                    
                </ol>
            </div>
            <!-- Main content -->
            <div class="content"> 
                <!-- Small boxes (Stat box) -->
                <div class="info-box">
                    <form action="{{ route('import-faculty') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Excel File</label>
                                    <input type="file" class="form-control" accept=".xls,.xlsx" name="file">
                                </div>
                            </div>
                          
                        </div>
                       
                        
                        <button class="btn btn-md btn-success"><i class="fa fa-plus-circle"></i> Import</button>
                        
                    </form>
                    
                    
                </div>
            </div>
        </div>
        <!-- /.content --> 
    </div>
</body>

@endsection