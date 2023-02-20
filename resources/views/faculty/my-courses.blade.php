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
                                    <th>Initial</th>
                                    <th>Image</th>
                                    <th>Full Name</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faculties as $faculty )
                                    <tr>
                                        <td>{{ $faculty->id }}</td>
                                        <td>{{ $faculty->name_initial }}</td>
                                        <td>{{ $faculty->name_initial }}</td>
                                        <td>{{ $faculty->user->first_name.' '.$faculty->user->last_name }}</td>
                                        <td>{{ $faculty->department->dept_short_name}}</td>
                                        
                                        <td>
                                            <a href="{{ url('faculties') }}/edit/{{ $faculty->user->id }}"><button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button></a>
                                            <a href="{{ url('faculties') }}/edit/{{ $faculty->user->id }}"><button class="btn btn-sm btn-danger"><i class="fa fa-edit"></i> Delete</button></a>
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