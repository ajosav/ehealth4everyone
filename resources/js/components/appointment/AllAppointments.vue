<template>
    <div class="card card-default collapsed-card">
        <div class="card-header">
          <h3 class="card-title">My Appointments</h3>

          <div class="card-tools">
            <button @click="reloadAppointments()" type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: none;">
          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="appointment_table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc">S/N</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Phone</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Start Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Stop Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Status</th>
                                <th class="not-exported" style="width: 140">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row" class="odd" v-for="(appointment, index) in appointments" :key="appointment.id">
                                <td>{{index + 1}}</td>
                                <td>{{appointment.name}}</td>
                                <td>{{appointment.phone}}</td>
                                <td>{{appointment.start_time}}</td>
                                <td>{{appointment.stop_time}}</td>
                                <td>{{appointment.status}}</td>
                                <td v-if="$gate.doctor()">
                                    <button class="btn btn-primary btn-xs" title="View User Info"><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-success btn-xs" title="Accept"><i class="fas fa-check"></i></button>
                                    <button class="btn btn-danger btn-xs" title="Reject"><i class="fas fa-times"></i></button>
                                </td>
                                <td v-if="$gate.patient()">
                                    <button class="btn btn-secondary btn-xs"><i class="fas fa-edit"></i> Reschedule</button>
                                    <button class="btn btn-danger btn-xs" ><i class="fas fa-trash"></i> Delete</button>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                appointments:[]
            }
        },
        methods: {
            loadAll() {
                axios.get('/dashboard/all_appointments').then((response) => {
                    var all_appointments = response.data;
                    this.appointments = all_appointments.data;
                })
            },

            reloadAppointments() {
                Fire.$emit('AfterCreate');
            }
        },
        mounted() {
            this.loadAll();
            Fire.$on('AfterCreate', () => {
                this.loadAll();  
            })
        }

    }

$(document).ready(function() {
    $('#appointment_table').DataTable( {
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