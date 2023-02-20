@extends('master')
@section('content')
@php
// function convertToTimestamp($time){
//     $time_arr = explode(":", $time);
//     $new_time = $time_arr[0].':'.$time_arr[1].' '.$time_arr[2];
//     return date("H:i", strtotime($new_time));
// };
$section_time = "08:30:AM - 08:25:AM";
// $times = explode("-", $section_time);
// $start_time = $times[0];
// $finish_time = $times[1];

// echo convertToTimestamp($start_time);
// echo convertToTimestamp($finish_time);

// if(convertToTimestamp($start_time) < convertToTimestamp($finish_time)){
//     echo "true";
// }else{
//     echo "false";
// }

$time2 = timeConverter($section_time);

echo $time2[0];
echo $time2[1];


function timeConverter($time){
    $times = explode("-", $time);
    $start_time = $times[0];
    $finish_time = $times[1];
    
    function convertToTimestamp($time){
        $time_arr = explode(":", $time);
        $new_time = $time_arr[0].':'.$time_arr[1].' '.$time_arr[2];
        return date("H:i", strtotime($new_time));
    };

    $start = convertToTimestamp($start_time);
    $end = convertToTimestamp($finish_time);
    return [$start, $end];
}


@endphp
@endsection