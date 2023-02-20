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
                <h1 class="text-black"><i class="fa fa-users"></i> All Users</h1>
                <ol class="breadcrumb">
                    <a href="{{ route('add-user') }}">
                    <button class="btn btn-info btn-md"><i class="fa fa-plus"></i> Add User</button>
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
                                    <th>Status</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            @if($user->status == 1)
                                                <span class="label label-success">Active</span>
                                            @else
                                                 <span class="label label-danger">Inactive</span>
                                            @endif

                                        </td>
                                        <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->role == 1)
                                                <span class="label label-success">Admin</span>
                                            @else
                                                 <span class="label label-info">Faculty</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="http://google.com"><button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button></a>
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