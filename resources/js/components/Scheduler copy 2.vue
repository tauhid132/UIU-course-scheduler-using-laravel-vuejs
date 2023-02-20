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
                        <div class="card-body">
                            <table cellspacing="0" class="">
                                <tr style="border-bottom: 1px solid #000;">
                                    <td><b>Time</b></td>
                                    <td><b>SAT</b></td>
                                    <td><b>SUN</b></td>
                                    <td><b>TUE</b></td>
                                    <td><b>WED</b></td>
                                   
                                </tr>
                                
                                <tr>
                                    <td>09.00 - 10.00</td>
                                    <td class="free"  v-bind:key="1" v-if="!filter('1905')">gg</td>
                                    <td class="free" v-else></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr style="border-bottom: 1px solid #000;">
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>


                                <tr>
                                    <td>09.00 - 10.00</td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
                                    <td class="free"></td>
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
                            @dragstart="startDrag($event, section)"><span class="badge bg-info">{{ section.section_name }}</span>&nbsp;({{  section.day1 }} - {{section.time1  }})  ({{  section.day2 }} - {{section.time2  }})</li>
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

            sections: [],
            selectedCourse: '',
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
            this.selectedCourseInfo = res.data
            //alert(this.selectedFaculty)
        },
        async selectCourse(){
            const res = await axios.get(`/admin/getCourseSections/${this.selectedCourse}`)
            this.selectedCourseSections = res.data
            //alert(this.selectedCourse)
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

        
        filter(nationality){
    // We can't find 'Taiwan' in nationalityArr
   return this.testArr.filter(n=>n===nationality).length===0?false:true; // false
   }

        
    }
}
</script>
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
        height: 1px;
        background-color: green;
    }
    .free{
        height: 1px;
        background-color: rgb(255, 42, 0);
    }
    table.no-spacing {
        border-spacing:0; /* Removes the cell spacing via CSS */
        border-collapse: collapse;  /* Optional - if you don't want to have double border where cells touch */
    }
</style>