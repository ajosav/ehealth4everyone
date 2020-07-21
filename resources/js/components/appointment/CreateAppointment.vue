<template>
    <div class="card-body" style="display: none;">
        <form @submit.prevent="bookAppointment()">
            <div class="row">
            
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Department<span class="text-danger">*</span></strong></label>
                        <input type="hidden" v-model="form.department" name="department_id_hidden"  :class="{ 'is-invalid':form.errors.has('department')}" />
                        <select @change="populateDoctor(form.department)" required name="department_id" v-model="form.department" class="selectpicker form-control" data-live-search="true" id="department_id" data-live-search-style="begins" title="Select Department..."> 
                            <template v-for="department in departments">
                                <option :value="department.uuid" :key="department.id">{{department.title}}</option>
                            </template>
                        </select>
                        <has-error :form="form" field="department"></has-error>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>Doctor<span class="text-danger">*</span></strong></label>
                        <input type="hidden" name="doctor_id_hidden" v-model="form.doctor"  :class="{ 'is-invalid':form.errors.has('doctor')}" />
                        <select @change="doctorInfo(form.doctor)" required name="doctor_id"  v-model="form.doctor" class="selectpicker form-control" data-live-search="true" id="doctor_id" data-live-search-style="begins" title="Select Doctor...">
                        </select>
                        <has-error :form="form" field="doctor"></has-error>
                    </div>
                </div>

                <div class="card-body" v-show="show_doctor">
                    <h3>Doctor's Information</h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" :placeholder="doc_info.title" :disabled="doc_info.title" :value="doc_info.title">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="" :disabled="doc_info.name" :value="doc_info.name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Visitation Charge</label>
                                <input type="text" class="form-control" :placeholder="doc_info.charge" disabled="" :value="doc_info.charge">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" :placeholder="doc_info.position" disabled="" :value="doc_info.position">
                            </div>
                        </div>
    
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>specialiazation</label>
                                <input type="text" class="form-control" :placeholder="doc_info.specialiazation" disabled="" :value="doc_info.specialiazation">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Certificates</label>
                                <input type="text" class="form-control" :placeholder="doc_info.certificate" disabled="" :value="doc_info.certificate">
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>
                    <!-- /.card-body -->

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                        <label for="start_time">Start Time <span class="text-danger">*</span></label>
                        <input type="text" id="start_time" name="start_time" class="form-control datetime" :class="{ 'is-invalid':form.errors.has('start_time')}" required>
                        <has-error :form="form" field="start_time"></has-error>
                            <em class="invalid-feedback">
                                
                            </em>
                            <p class="helper-block">
                                Appointment Time Picker
                            </p>
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                        <label for="stop_time">Stop Time <span class="text-danger">*</span></label>
                        <input type="text" id="stop_time" name="stop_time" class="form-control datetime"  :class="{ 'is-invalid':form.errors.has('stop_time')}" required>
                        <has-error :form="form" field="stop_time"></has-error>
                            <em class="invalid-feedback">
                                
                            </em>
                            <p class="helper-block">
                                Appointment Time Picker
                            </p>
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label><strong>Reason for Appointment</strong></label>
                        <textarea name="appointment_reason" class="form-control" rows="3" v-text="form.appointment_reason"></textarea>
                    </div>
                </div>

                <div class="col-md-12 text-right mt-3">
                    <button class="btn btn-success col-md-12" id="submit"> Book Appointment</button>
                </div>
            </div>
        </form>
          <!-- /.row -->
    </div>

</template>

<script>

export default {
 data() {
        return {
            departments: [],
            show_doctor: false,
            doctors: [],
            appointments: [],
            editmode: false,
            form: new Form({
                uuid: '',
                stop_time : '',
                start_time : '',
                department : '',
                doctor : '',
                appointment_reason : ''
            }),
            doc_info: {
                name: '',
                title: '',
                position: '',
                specialiazation: '',
                charge: '',
                certificate: ''
            }
        }
    },
    methods: {
        loadAll() {
            axios.get('/dashboard/all_departments').then((response) => {
                var department = response.data;
                this.departments = department.data;
            });
        },
        editModal(department) {
            this.editmode = true;
            this.form.errors.clear();
            this.form.reset();
            $('#addNew').modal('show');
            this.form.fill(department);
        },
        populateDoctor(id) {
            axios.get('/dashboard/find_doctor_by_dept/'+id)
            .then((response) => {
                const all_doctors = response.data;
                this.doctors = all_doctors.data;
                $('select[name="doctor_id"]').html('')
                this.show_doctor = false;
                $('#doctor_id').selectpicker('refresh')
                if(this.doctors.length < 1) {
                    return swal.fire(
                        'We are sorry',
                        'No doctor in this department',
                        'error'
                    );
                }
                $.each(this.doctors, (el, val) => {
                    $('select[name="doctor_id"]').append('<option value="'+ val.uuid +'">'+ val.name +'</option>');
                })
                $('#doctor_id').selectpicker('refresh')

            })
            .catch((error) => {
                console.log(error)
            })
        },
        doctorInfo(id) {
            if(this.doctors.length > 0) {
                $.each(this.doctors, (index, data) => {
                    if(data.uuid == id) {
                        this.doc_info.name = data.name;
                        this.doc_info.title = data.title;
                        this.doc_info.position = data.position;
                        this.doc_info.specialiazation = data.specialiazation;
                        this.doc_info.charge = data.charge;
                        this.doc_info.certificate = data.certificates;
                        this.show_doctor = true;
                    }
                })
            }
            
        },
        updateDepartment() {
            this.$Progress.start();
            this.form.put('/dashboard/update_department/' + this.form.uuid)
            .then(() => {
                $('#addNew').modal('hide')
                swal.fire(
                    'Success',
                    'Department Information Updated.',
                    'success'
                )
                Fire.$emit('AfterCreate');
                this.$Progress.finish();
            })
            .catch (()=>{
                this.$Progress.fail();
            })
        },
        bookAppointment() {
            this.form.start_time = $('#start_time').datetimepicker('getValue')
            this.form.stop_time = $('#stop_time').datetimepicker('getValue')
            $.each(this.form, (el, data) => {
                console.log(data)
                if(data = '') {
                    swal.fire(
                        'Error',
                        'All fields are required',
                        'error'
                    );
                }
            });
            // $('#submit').attr('disabled', true);
            this.form.post('/dashboard/create_appointment')
            .then(() => {
                this.departments = []
                this.form.reset();
                this.show_doctor = false;
                $('select[name="doctor_id"]').html('')
                swal.fire(
                    'Success',
                    'Appointment Successfully Created, Doctor has been notified',
                    'success'
                );
                Fire.$emit('AfterCreate');
            })
        }
       
    },
    created() {
        this.loadAll();
        Fire.$on('AfterCreate', () => {
            this.loadAll();  
        })
    }
}
tinymce.init({
    selector: 'textarea',
    height: 130,
    plugins: [
    'advlist autolink lists link image charmap print preview anchor textcolor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code wordcount'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
    branding:false
});
</script>