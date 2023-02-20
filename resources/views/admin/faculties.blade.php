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
                <h1 class="text-black"><i class="fa fa-users"></i> All Faculties</h1>
                <ol class="breadcrumb">
                    <a href="{{ route('import-faculty') }}">
                    <button class="btn btn-info btn-md"><i class="fa fa-plus"></i> Import Faculties</button>
                    </a>
                </ol>
            </div>
            <!-- Main content -->
            <div class="content"> 
                <!-- Small boxes (Stat box) -->
                <div class="info-box">
                    
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Teacher Code</th>
                                    <th>Office</th>
                                    <th>Designation</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faculties as $faculty )
                                    <tr>
                                        <td>{{ $faculty->id }}</td>
                                        <td>{{ $faculty->name }}</td>
                                        <td>{{ $faculty->teacher_code }}</td>
                                        <td>{{ $faculty->office }}</td>
                                        <td>{{ $faculty->designation}}</td>
                                        
                                        <td>
                                            <a href="{{ route('viewFacultyRoutine', $faculty->teacher_code) }}"><button class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View Courses</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content --> 
    </div>
</body>

@endsection