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
                <h1 class="text-black"><i class="fa fa-users"></i> All Courses</h1>
                <ol class="breadcrumb">
                    <a href="{{ route('import-section') }}">
                    <button class="btn btn-info btn-md"><i class="fa fa-plus"></i> Import Courses</button>
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
                                    <th>Action</th>
                                    <th>Course Code</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Section</th>
                                    <th>Day1</th>
                                    <th>Day2</th>
                                    <th>Time1</th>
                                    <th>Time2</th>
                                    <th>Faculty</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section )
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>
                                            {{-- <a href="{{ url('faculties') }}/edit/{{ $section->id }}"><button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button></a> --}}
                                            <a href="{{ route('drop-section',$section->id) }}"><button class="btn btn-sm btn-danger"><i class="fa fa-edit"></i> Drop</button></a>
                                        </td>
                                        <td>{{ $section->formal_code }}</td>
                                        <td>{{ $section->title }}</td>
                                        <td>{{ $section->grade_sheet_template }}</td>
                                        <td>{{ $section->section_name }}
                                        @if($section->if_dropped)
                                        (Dropped)
                                        @endif
                                        </td>
                                        <td>{{ $section->time1}}</td>
                                        <td>{{ $section->time2}}</td>
                                        <td>{{ $section->day1}}</td>
                                        <td>{{ $section->day2}}</td>
                                        <td>{{ $section->assigned_faculty}}</td>
                                        
                                        
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