@extends('master')
@section('content')
<?php
    $sat = array();
    $sun = array();
    $tue = array();
    $wed = array();

    foreach ($courses as $course) {
        if($course->day1 == 'Sat'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($sat, $i);
            }      
        }else if($course->day2 == 'Sat'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($sat, $i);
            }      
        }
    }
    foreach ($courses as $course) {
        if($course->day1 == 'Sun'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($sun, $i);
            }      
        }else if($course->day2 == 'Sun'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($sun, $i);
            }      
        }
    }
    foreach ($courses as $course) {
        if($course->day1 == 'Tue'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($tue, $i);
            }      
        }else if($course->day2 == 'Tue'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($tue, $i);
            }      
        }
    }
    foreach ($courses as $course) {
        if($course->day1 == 'Wed'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($wed, $i);
            }      
        }else if($course->day2 == 'Wed'){
            $start_end = explode('-',$course->time1);
            $start_arr = explode(':', $start_end[0]);
            $start_time = \Carbon\Carbon::parse($start_arr[0].':'.$start_arr[1].' '.$start_arr[2])->format('H:i');
            $end_arr = explode(':', $start_end[1]);
            $end_time = \Carbon\Carbon::parse($end_arr[0].':'.$end_arr[1].' '.$end_arr[2])->format('H:i');
            for($i=$start_time; $i<=$end_time; $i= \Carbon\Carbon::parse($i)->addMinutes(5)->format('H:i')){
                array_push($wed, $i);
            }      
        }
    }
    //print_r($sat);
?>
<style>
    table, th {
        border: 1px solid black;
        border-collapse: collapse;
        white-space: nowrap; 
        
    }
    tr{
        border: 1px #000;
        
    }
    td {
        padding: 0 25px 2px 25px;
    }
    .occupied{
        height: 2px;
        background-color: red;
    }
    .free{
        height: 2px;
        background-color: #fff;
    }
    table.no-spacing {
        border-spacing:0; /* Removes the cell spacing via CSS */
        border-collapse: collapse;  /* Optional - if you don't want to have double border where cells touch */
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper boxed-wrapper">
        @include('admin.includes.topbar')
        <aside class="main-sidebar"> 
            @include('admin.includes.sidebar')
        </aside>
        <div class="content-wrapper"> 
            <!-- Content Header (Page header) -->
            <div class="content-header sty-one">
                <h1 class="text-black"><i class="fa fa-users"></i> Weekly Routine </h1>
                
            </div>
            <!-- Main content -->
            <div class="content"> 
                <!-- Small boxes (Stat box) -->
                <div class="info-box">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card">
                                <div class="table-responsive">
                                    <table cellspacing="0" class="">
                                        <tr style="border-bottom: 1px solid #000;">
                                            <td><b>Time</b></td>
                                        </tr>
                                        
                                        <?php
                                        
                                        $start = \Carbon\Carbon::parse('08:00 AM')->format('H:i');
                                        $end = \Carbon\Carbon::parse('08:00 AM')->addHours(1)->format('H:i');
                                        
                                        for($i=0; $i<9; $i++){
                                            ?>
                                            <tr>
                                                
                                                <td>{{ $start }}- {{ $end }}</td>
                                                
                                                
                                            </tr>
                                            
                                            <?php
                                            $start = \Carbon\Carbon::parse($start)->addHours(1)->format('H:i');
                                            $end = \Carbon\Carbon::parse($end)->addHours(1)->format('H:i');
                                        }
                                        ?>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="table-responsive">
                                    <table cellspacing="0" class="">
                                        <tr style="border-bottom: 1px solid #000;">
                                            
                                            <td><b>SAT</b></td>
                                            <td><b>SUN</b></td>
                                            <td><b>TUE</b></td>
                                            <td><b>WED</b></td>
                                            
                                        </tr>
                                        <?php
                                        $start = \Carbon\Carbon::parse('08:00 AM')->format('H:i');
                                        $end = \Carbon\Carbon::parse('08:00 AM')->addHours(1)->format('H:i');
                                        
                                        for($i=8; $i<17; $i++){
                                            for($j=0; $j<60; $j=$j+5){
                                                $time = \Carbon\Carbon::parse($i.':'.$j)->format('H:i');
                                                $timeplus1 = \Carbon\Carbon::parse($i.':'.$j)->addMinutes(1)->format('H:i');
                                            ?>
                                            <tr>
                                                @php
                                                    if((in_array($time, $sat)) || (in_array($timeplus1, $sat))){
                                                        echo '<td class="occupied"></td>';
                                                    }else{
                                                        echo '<td class="free"></td>';
                                                    }
                                                @endphp
                                                @php
                                                if((in_array($time, $sun)) || (in_array($timeplus1, $sun))){
                                                    echo '<td class="occupied"></td>';
                                                }else{
                                                    echo '<td class="free"></td>';
                                                }
                                            @endphp
                                            @php
                                            if((in_array($time, $tue)) || (in_array($timeplus1, $tue))){
                                                echo '<td class="occupied"></td>';
                                            }else{
                                                echo '<td class="free"></td>';
                                            }
                                        @endphp
                                        @php
                                        if((in_array($time, $wed)) || (in_array($timeplus1, $wed))){
                                            echo '<td class="occupied"></td>';
                                        }else{
                                            echo '<td class="free"></td>';
                                        }
                                    @endphp
                                              
                                                 {{-- @php
                                                 foreach ($courses as $course) {
                                                     if($course->day1 == 'Sat'){
                                                         $times = explode("-", $course->time1);
                                                         $start_time = explode(":", $times[0]);
                                                         $start_t = \Carbon\Carbon::parse($start_time[0].':'.$start_time[1].' '.$start_time[2]);
                                                         $end_time = explode(":", $times[1]);
                                                         $end_t = \Carbon\Carbon::parse($end_time[0].':'.$end_time[1].' '.$end_time[2]);
                                                         
                                                         if($time->between($start_t, $end_t)){
                                                             echo '<td class="occupied"></td>';
                                                         }else{
                                                             echo '<td class="free"></td>';
                                                         }
                                                     }else{
                                                        echo '<td class="free"></td>';
                                                     }
                                                 }
                                             @endphp --}}
                                               
                                            </tr>
                                            
                                            <?php
                                            }
                                            $start = \Carbon\Carbon::parse($start)->addHours(1)->format('H:i');
                                            $end = \Carbon\Carbon::parse($end)->addHours(1)->format('H:i');
                                        }
                                        ?>
                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content --> 
    </div>
</body>

@endsection