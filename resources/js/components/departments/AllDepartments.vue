<template>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="tools">
                            <button class="btn btn-success  mb-3" @click="newModal"><i class="fas fa-plus-circle"></i> Add New Department</button>
                        </div>
                        <table id="department-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc">S/N</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Descirption</th>
                                    <th class="not-exported" style="width: 200px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr :data-id="department.uuid" role="row" class="odd" v-for="(department, index) in departments" :key="department.id">
                                    <td>{{index + 1}}</td>
                                    <td class="sorting_1">{{department.title}}</td>
                                    <td>{{department.description}}</td>
                                    <td>
                                        <button class="btn btn-secondary btn-xs" @click="editModal(department)"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-xs" @click="deleteDepartment(department.uuid)"><i class="fas fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">New Department</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form @submit.prevent="editmode ? updateDepartment() : createDepartment()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" v-model='form.title' name="title" placeholder="Title" class="form-control" :class="{ 'is-invalid':form.errors.has('title')}">
                                <has-error :form="form" field="title"></has-error>
                            </div>
                            <div class="form-group">
                                <textarea name="description" id="" placeholder="description" class="form-control" cols="30" rows="10" :class="{ 'is-invalid':form.errors.has('description')}" v-model="form.description"></textarea>
                                <has-error :form="form" field="description"></has-error>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>

export default {
    data() {
        return {
            departments: [],
             editmode: false,
                form: new Form({
                    uuid: '',
                    title : '',
                    description : '',
                })
        }
    },
    methods: {
        loadAllDepartments() {
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
        newModal() {
            this.editmode = false,
            this.form.reset();
            $('#addNew').modal('show')
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
        deleteDepartment(id) {
            swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                this.$Progress.start();
                // send request to the server
                if(result.value) {
                    this.form.delete('/dashboard/delete_department/'+id).then(()=>{
                        swal.fire(
                            'Deleted',
                            'Departmemnt Data has been deleted.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate')
                    }).catch(()=>{
                        swal.fire("failed", "There was something wrong.", "warning");
                        this.$Progress.fail();
                    })
                }
            })
        },
        createDepartment() {
            this.$Progress.start();
            this.form.post('/dashboard/create_department')
            .then((response)=> {
                
                Fire.$emit('AfterCreate')
                $('#addNew').modal('hide')
                toast.fire({
                    icon: 'success',
                    title: 'Department successfully created'
                });
                this.$Progress.finish();
            })
            .catch(()=>{
                this.$Progress.fail();
            })
        }
    },
    created() {
        this.loadAllDepartments();
        Fire.$on('AfterCreate', () => {
            this.loadAllDepartments();  
        })
    }
}

$(document).ready(function() {
    $('#department-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ records per page',
             "info":      'Showing _START_ - _END_ (_TOTAL_)',
            "search":  'Search',
            'paginate': {
                    'previous': 'Previous',
                    'next': 'Next'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': [0, 3]
            },
            // {
            //     'checkboxes': {
            //        'selectRow': true
            //     },
            //     'targets': 0
            // },
        ],
        'select': { style: 'multi',  selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'print',
                text: 'print',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'colvis',
                text: 'Column Visibility',
                columns: ':gt(0)'
            },
        ],
    } );


});

</script>