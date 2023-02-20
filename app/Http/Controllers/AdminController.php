<?php

namespace App\Http\Controllers;

use App\Exports\SectionExport;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Section;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Imports\FacultyImport;
use App\Imports\SectionImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function viewFaculties(){
        return view('admin.faculties',[
            'faculties' => Faculty::all()
        ]);
    }
    public function viewUsers(){
        return view('admin.users',[
            'users' => User::all()
        ]);
    }
    public function viewAddUser(){
        return view('admin.add-user');
    }
    public function viewAddFaculty(){
        return view('admin.add-faculty',[
            'departments' => Department::all(),
        ]);
    }
    public function viewEditFaculty($id){
        return view('admin.edit-faculty',[
            'departments' => Department::all(),
            'user' => User::find($id)
        ]);
    }

    public function addNewUser(Request $request){
        $default_password = "1234";
    
        $user = User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($default_password),
            'role' => $request->role
        ]);
        
    }
    public function addNewFaculty(Request $request){
        $default_password = "1234";
    
        $user = User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($default_password),
            'role' => 2,
        ]);

        Faculty::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
            'designation' => $request->designation,
            'joining_date' => $request->joining_date
        ]);
        
        return redirect('/faculties')->with('success' , "Faculty Added Successfully");
    }
    public function updateFaculty(Request $request, $id){

    
        $user = User::find($id);
        $user->update([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);
        
        
        $user->faculty()->update([
            'department_id' => $request->department_id,
            'designation' => $request->designation,
            'joining_date' => $request->joining_date
        ]);
       
        
        return redirect('/faculties')->with('success' , "Faculty Added Successfully");
    }

    public function importFaculties(Request $request){
        Excel::import(new FacultyImport, $request->file('file')->store('public'));
        return redirect('/faculties');
    }

    public function viewImportFaculty(){
        return view('admin.import-faculty');
    }

    public function importSections(Request $request){
        Excel::import(new SectionImport, $request->file('file')->store('public'));
        return redirect('/admin/courses');
    }

    public function viewImportSection(){
        return view('admin.import-section');
    }


    public function viewSections(){
        return view('admin.sections',[
            'sections' => Section::all(),
        ]);
    }
    public function viewScheduler(){
        return view('admin.scheduler');
    }

    public function getSections(){
        return Section::all();
    }
    public function getCourses(){
        return Section::select('title','formal_code')->distinct('title')->get();
    }

    public function getCourseInfo($id){
       
        return response()->json([
            'courses' => Section::where('formal_code',$id)->orderBy('section_name','asc')->get(),
            'faculties' => Faculty::all()
        ]);
    }

    public function viewDrag(){
        return view('admin.drag');
    }

    

    public function assignFaculty(Request $request){
       
        $overlaping = false;
        $selected_sec = Section::find($request->section_id);
        $section_time = $this->timeConverters($selected_sec->time1);
        $start_time = $section_time[0];
        $finish_time = $section_time[1];
        
        $other_section_of_selected_faculty = Section::where('assigned_faculty', $request->teacher_code)->get();

        if(count($other_section_of_selected_faculty) > 0){
            foreach($other_section_of_selected_faculty as $sec){
                
                if($sec->day1 == $selected_sec->day1){
                    $section2_time = $this->timeConverters($sec->time1);
                    if($start_time > $section2_time[1] || $finish_time < $section2_time[0]){
                        $overlaping = false;
                    }else{
                        $overlaping = true;
                        break;
                    }
                }else if($sec->day1 == $selected_sec->day2){
                    $section2_time = $this->timeConverters($sec->time1);
                    if($start_time > $section2_time[1] || $finish_time < $section2_time[0]){
                        $overlaping = false;
                    }else{
                        $overlaping = true;
                        break;
                    }
                }else if($sec->day2 == $selected_sec->day1){
                    $section2_time = $this->timeConverters($sec->time1);
                    if($start_time > $section2_time[1] || $finish_time < $section2_time[0]){
                        $overlaping = false;
                    }else{
                        $overlaping = true;
                        break;
                    }
                }else if($sec->day2 == $selected_sec->day2){
                    $section2_time = $this->timeConverters($sec->time1);
                    if($start_time > $section2_time[1] || $finish_time < $section2_time[0]){
                        $overlaping = false;
                    }else{
                        $overlaping = true;
                        break;
                    }
                }
                
            }

        }else{
            $overlaping  = false;
        }


        if(!$overlaping){
            Section::where('id', $request->section_id)->update([
                'assigned_faculty' => $request->teacher_code
            ]);
            return response()->json([
                'msg' => 'Added',
                
            ]);
        }else{
            return response()->json([
                'msg' => 'Overlaping'
            ]);
        }
    }
    public function convertToTimestamp($time2){
        $time_arr = explode(":", $time2);
        $new_time = $time_arr[0].':'.$time_arr[1].' '.$time_arr[2];
        return date("H:i", strtotime($new_time));
    }
    public function timeConverters($time){
        $times = explode("-", $time);
        $start_time = $times[0];
        $finish_time = $times[1];
        

        $start = $this->convertToTimestamp($start_time);
        $end = $this->convertToTimestamp($finish_time);
        return [$start, $end];
    }

    public function removeAssignedFaculty(Request $request){
        return Section::where('id', $request->id)->update([
            'assigned_faculty' => null
        ]);
    }

    public function viewValidate(){
        return view('admin.validate');
    }

    public function getFaculties(){
        return Faculty::all();
    }
    public function getFacultyInfo($code){
       
        
        return response()->json([
            'faculty' => Faculty::where('teacher_code', $code)->first(),
            'courses' => Section::where('assigned_faculty', $code)->get()
        ]);
    }
    public function getCourseSections($formal_code){
        return Section::where('formal_code',$formal_code)->orderBy('section_name','asc')->get();
    }

    public function dropSection($id){
        $section = Section::find($id);
        $section->update([
            'if_dropped' => '1'
        ]);
        return back();
    }

    public function downloadSections(){
        return Excel::download(new SectionExport, 'sections.xlsx');
    }

    public function viewFacultyRoutine($teacher_code){
      
        return view('admin.faculty-routine',[
            'courses' => Section::where('assigned_faculty', $teacher_code)->get()
        ]);

    }

   
}
