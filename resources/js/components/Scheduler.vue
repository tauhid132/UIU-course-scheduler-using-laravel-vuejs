<template>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group"></div>
                            <label>Select Trimester</label>
                            <select class="form-control">
                                <option selected>Fall-2022</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"></div>
                            <label>Select Faculty</label>
                            <select class="form-control" v-model="selectedFaculty" @change="selectFaculty()">
                                <option v-for="faculty in allFaculties" v-bind:value="faculty.teacher_code">{{ faculty.teacher_code }}--{{ faculty.name }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"></div>
                            <label>Select Course</label>
                            <select class="form-control" v-model="selectedCourse" @change="selectCourse()">
                                <option v-for="course in courses" v-bind:value="course.formal_code">{{ course.formal_code }}--{{ course.title }}</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-2">
                            <button @click=getFilter() class="btn btn-success mt-5 btn-block"><i class="fa fa-filter"></i>&nbsp; Get Sections</button>
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body"  @drop="onDrop($event)"
                                            @dragover.prevent
                                            @dragenter.prevent>
                            <table class="table table-bordered">
                                <tr>
                                    <!-- <td><b>Time</b></td> -->
                                    <td><b>SAT</b></td>
                                    <td><b>SUN</b></td>
                                    <td><b>TUE</b></td>
                                    <td><b>WED</b></td>
                                   
                                </tr>
                                <tr>
                                    <td ><div v-for="course in this.selectedFacultyCourses" ><span class="badge bg-success mb-3" v-if="(course.day1 == 'Sat')||(course.day2 == 'Sat') ">{{ course.formal_code }}({{ course.section_name }})<br>{{ course.time1 }} &nbsp;&nbsp;&nbsp;<i @click="removeFaculty(course)" class="fa fa-times text-black"></i></span></div> </td>
                                    <td ><div v-for="course in this.selectedFacultyCourses" ><span class="badge bg-success mb-3" v-if="(course.day1 == 'Sun')||(course.day2 == 'Sun') ">{{ course.formal_code }}({{ course.section_name }})<br>{{ course.time1 }} &nbsp;&nbsp;&nbsp;<i @click="removeFaculty(course)" class="fa fa-times text-black"></i></span></div> </td>
                                    <td ><div v-for="course in this.selectedFacultyCourses" ><span class="badge bg-success mb-3" v-if="(course.day1 == 'Tue')||(course.day2 == 'Tue') ">{{ course.formal_code }}({{ course.section_name }})<br>{{ course.time1 }} &nbsp;&nbsp;&nbsp;<i @click="removeFaculty(course)" class="fa fa-times text-black"></i></span></div> </td>
                                    <td ><div v-for="course in this.selectedFacultyCourses" ><span class="badge bg-success mb-3" v-if="(course.day1 == 'Wed')||(course.day2 == 'Wed') ">{{ course.formal_code }}({{ course.section_name }})<br>{{ course.time1 }} &nbsp;&nbsp;&nbsp;<i @click="removeFaculty(course)" class="fa fa-times text-black"></i></span></div> </td>
                                </tr>

                                
                               
                            
                            
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Sections</h5>
                        <ul>
                            <li   v-for="section in selectedCourseSections" draggable
                            @dragstart="startDrag($event, section)"><span class="badge bg-info">{{ section.section_name }} <p v-if="section.if_dropped">(Dropped)</p> </span>&nbsp;({{  section.day1 }} - {{section.time1  }})  ({{  section.day2 }} - {{section.time2  }})</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
</template>
<script>
import axios from 'axios';
import moment from 'moment';
export default {
    data(){
        return{
            courses : [],
            allFaculties : [],
            selectedCourse: '',
            selectedFaculty: '',
            selectedFacultyInfo : [],
            selectedCourseSections : [],
            selectedFacultyCourses : [],
            

            sections: [],
 
            selectedCourseInfo : [],
            isTheory : false,
            courseFaculties:[],
            //eightSat:'hh'
            assignedFaculty : {
                section_id : '',
                teacher_code : ''
            },
            

            testArr :[1905,2],
            headsets : ['Hololens', 'Google Glass', 'Varjo']
        }
    },
    created(){
        this.getSections() 
        this.getFaculties()
     
        
    },
    methods : { 
        async getSections(){
            const res = await axios.get('/admin/getCourses')
            this.courses = res.data
        },
        async getFaculties(){
            const res = await axios.get('/admin/getFaculties')
            this.allFaculties = res.data
        },
        async selectFaculty(){
            const res = await axios.get(`/admin/getFacultyInfo/${this.selectedFaculty}`)
            this.selectedFacultyInfo = res.data.faculty
            this.selectedFacultyCourses = res.data.courses
            console.log(this.selectedFacultyCourses)
        },
        async selectCourse(){
            const res = await axios.get(`/admin/getCourseSections/${this.selectedCourse}`)
            this.selectedCourseSections = res.data
        },


        async getCourseInfo(){
            const res = await axios.get(`/admin/getCourseInfo/${this.selectedCourse}`)
            this.selectedCourseInfo = res.data.courses
            this.courseFaculties = res.data.faculties
            if(this.selectedCourseInfo[1].grade_sheet_template == 'CSE Theory'){
                this.isTheory = true
            }else{
                this.isTheory = false
            }
            // alert(moment('10:30:00 AM').format())
        },

        startDrag(evt, section) {
            evt.dataTransfer.dropEffect = 'move'
            evt.dataTransfer.effectAllowed = 'move'
            evt.dataTransfer.setData('section_id', section.id)
            //alert( evt.dataTransfer.getData('teacher_code'))
        },
        async onDrop(evt) {
             const section_id = evt.dataTransfer.getData('section_id')
             if(this.selectedFaculty == ""){
                alert('please select faculty First')
             }else{

             }
            // const sec = this.selectedCourseInfo.find((sec) => sec.id == section.id)
            // //sec.assigned_faculty = teacher_code
            this.assignedFaculty.section_id = section_id
            this.assignedFaculty.teacher_code = this.selectedFaculty
           // alert(this.assignedFaculty.section_id)
           // alert(this.assignedFaculty.teacher_code)
            
            const res = await axios.post('/admin/assignFaculty',this.assignedFaculty)
            if(res.data.msg == 'Added'){
                toastr["success"]("Added!")
            }else if(res.data.msg == 'Overlaping'){
                toastr["warning"]("Overlaping")
            }
            this.selectFaculty()
            
            //alert(res.data.msg)
            //alert(section_id)
        },
        async removeFaculty(course){
            const sec = this.courses.find((sec) => sec.id == course.id)
            const res = await axios.post('/admin/removeAssignedFaculty', course)
            this.selectFaculty()
        },
        // async assignFaculty(){
        //     const res = await axios.post('/admin/assignFaculty',this.assignedFaculty)
        //     alert(res.data.msg)
        //     console.log(res)
        // }

        
        filter(nationality){
    // We can't find 'Taiwan' in nationalityArr
   return this.testArr.filter(n=>n===nationality).length===0?false:true; // false
   }

        
    }
}
</script>
