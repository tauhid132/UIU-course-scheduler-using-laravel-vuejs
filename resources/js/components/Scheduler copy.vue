<template>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group"></div>
                            <label>Select Trimester</label>
                            <select class="form-control">
                                <option selected>Fall-2022</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"></div>
                            <label>Select Program</label>
                            <select class="form-control">
                                <option selected>BSCSE</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"></div>
                            <label>Select Course</label>
                            <select class="form-control" v-model="selectedCourse">
                                <option v-for="course in courses" v-bind:value="course.formal_code">{{ course.formal_code }}--{{ course.title }}</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button @click=getFilter() class="btn btn-success mt-5 btn-block"><i class="fa fa-filter"></i>&nbsp; Get Sections</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5>Course Routine</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <td><b>Section</b></td>
                                    <td><b>SAT</b></td>
                                    <td><b>SUN</b></td>
                                    <td><b>TUE</b></td>
                                    <td><b>WED</b></td>
                                    <td><b>Room</b></td>
                                    <td><b>Faculty</b></td>
                                </tr>
                                
                                <tr v-for="section in selectedCourseInfo" >
                                    <td>{{ section.section_name }}</td>
                                    <td v-if="(section.day1 == 'Sat' || section.day2 == 'Sat')">{{ section.time1 }}</td>
                                    <td v-else></td>
                                    
                                    <td v-if="(section.day1 == 'Sun' || section.day2 == 'Sun')">{{ section.time1 }}</td>
                                    <td v-else></td>
                                    
                                    <td v-if="(section.day1 == 'Tue' || section.day2 == 'Tue')">{{ section.time1 }}</td>
                                    <td v-else></td>
                                    
                                    <td v-if="(section.day1 == 'Wed' || section.day2 == 'Wed')">{{ section.time1 }}</td>
                                    <td v-else></td>
                                    
                                    <td>{{ section.room1 }}</td>
                                    <td>
                                        <div
                                            @drop="onDrop($event, section)"
                                            @dragover.prevent
                                            @dragenter.prevent
                                            >
                                            <span v-if="section.assigned_faculty" class="badge bg-success p-2">{{ section.assigned_faculty }} &nbsp;&nbsp;&nbsp;<i @click="removeFaculty(section)" class="fa fa-times text-black"></i></span>
                                            <span v-else class="badge bg-danger p-2">Select One</span>
                                        </div>
                                    </td>
                                 </tr>
                            
                            
                            
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5>Course Faculty</h5>
                        <ul>
                            <li   v-for="faculty in courseFaculties" draggable
                            @dragstart="startDrag($event, faculty)"><span class="badge bg-info">{{ faculty.teacher_code }}</span>&nbsp;{{ faculty.name }}</li>
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
            sections: [],
            courses : [],
            selectedCourse: '',
            selectedCourseInfo : [],
            isTheory : false,
            courseFaculties:[],
            //eightSat:'hh'
            assignedFaculty : {
                section_id : '',
                teacher_code : ''
            }
        }
    },
    created(){
        this.getSections() 
        
        
    },
    methods : { 
        async getSections(){
            const res = await axios.get('/admin/getCourses')
            this.courses = res.data
        },
        getFilter(){
            //alert(this.selectedCourse)
            this.getCourseInfo()
            //this.eightSat = this.eightSat+"changed"
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

        startDrag(evt, faculty) {
            evt.dataTransfer.dropEffect = 'move'
            evt.dataTransfer.effectAllowed = 'move'
            evt.dataTransfer.setData('teacher_code', faculty.teacher_code)
            //alert( evt.dataTransfer.getData('teacher_code'))
        },
        async onDrop(evt, section) {
            const teacher_code = evt.dataTransfer.getData('teacher_code')
            const sec = this.selectedCourseInfo.find((sec) => sec.id == section.id)
            //sec.assigned_faculty = teacher_code
            this.assignedFaculty.section_id = sec.id
            this.assignedFaculty.teacher_code = teacher_code
            const res = await axios.post('/admin/assignFaculty',this.assignedFaculty)
            if(res.data.msg == 'Added'){
                sec.assigned_faculty = teacher_code
            }
            alert(res.data.msg)
        },
        async removeFaculty(section){
            const sec = this.selectedCourseInfo.find((sec) => sec.id == section.id)
            sec.assigned_faculty = null
            const res = await axios.post('/admin/removeAssignedFaculty', section)
            
        },
        // async assignFaculty(){
        //     const res = await axios.post('/admin/assignFaculty',this.assignedFaculty)
        //     alert(res.data.msg)
        //     console.log(res)
        // }

        
    }
}
</script>