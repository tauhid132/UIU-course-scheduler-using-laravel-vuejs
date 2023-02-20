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
                <h1 class="text-black"><i class="fa fa-plus"></i> Add Faculty</h1>
                <ol class="breadcrumb">
                    
                </ol>
            </div>
            <!-- Main content -->
            <div class="content"> 
                <!-- Small boxes (Stat box) -->
                <div class="info-box">
                    <form action="{{ route('add-faculty') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="form-control" name="department_id" >
                                        @foreach ($departments as $dept )
                                            <option value="{{ $dept->id }}">{{ $dept->dept_short_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <select class="form-control" name="designation" >
                                       <option value="Lecturer">Lecturer</option>
                                       <option value="Assistant Professor">Assistant Professor</option>
                                       <option value="Professor">Professor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Joining Date</label>
                                    <input type="date" class="form-control" name="joining_date" >
                                </div>
                            </div>
                        </div>
                        
                        <button class="btn btn-md btn-success"><i class="fa fa-plus-circle"></i> Add Faculty</button>
                        
                    </form>
                    
                    
                </div>
            </div>
        </div>
        <!-- /.content --> 
    </div>
</body>

@endsection