<template>
    <div class="card-body" style="display: none;">
        <form @submit.prevent="bookAppointment()">
            <div class="row">
            
                <div class="col-md-6">
                <div class="form-group">
                    <label><strong>Department<span class="text-danger">*</span></strong></label>
                    <input type="hidden" v-model="form.department" name="customer_id_hidden"  :class="{ 'is-invalid':form.errors.has('department')}" />
                    <select @change="populateDoctor(form.department)" required name="customer_id" v-model="form.department" class="selectpicker form-control" data-live-search="true" id="customer_id" data-live-search-style="begins" title="Select Department..."> 
                        <template v-for="department in departments">
                            <option :value="department.uuid">{{department.title}}</option>

                        </template>
                    </select>
                    <has-error :form="form" field="department"></has-error>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label><strong>Doctor<span class="text-danger">*</span></strong></label>
                    <input type="hidden" name="customer_id_hidden" v-model="form.doctor"  :class="{ 'is-invalid':form.errors.has('doctor')}" />
                    <select required name="customer_id"  v-model="form.doctor" class="selectpicker form-control" data-live-search="true" id="customer_id" data-live-search-style="begins" title="Select customer...">
                        <option value=""></option>
                        <option value="">Madagascar</option>
                        <option value="">Europe</option>
                    </select>
                     <has-error :form="form" field="doctor"></has-error>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <div class="form-group">
                    <label for="start_time">Start Time <span class="text-danger">*</span></label>
                    <input type="text" id="start_time" name="start_time" class="form-control datetime" v-model="form.start_time"  :class="{ 'is-invalid':form.errors.has('start_time')}" required>
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
                        <input type="text" id="stop_time" name="stop_time" class="form-control datetime"  :class="{ 'is-invalid':form.errors.has('stop_time')}" v-model="form.stop_time" required>
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

                <div class="col-md-12 text-right mt-3">
                    <button class="btn btn-success col-md-12"> Book Appointment</button>
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
            doctors: [],
             editmode: false,
                form: new Form({
                    uuid: '',
                    stop_time : '',
                    start_time : '',
                    department : '',
                    doctor : '',
                })
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
            console.log(id)
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
            this.$Progress.start();
        }
       
    },
    created() {
        this.loadAll();
        Fire.$on('AfterCreate', () => {
            this.loadAll();  
        })
    }
}


</script>