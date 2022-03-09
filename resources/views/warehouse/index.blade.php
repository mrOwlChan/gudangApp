@extends('templates.gudangNavbar')

@section('libsOnHeader')
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <style>
        .table.dataTable td,th {
            font-family: Verdana;
            font-size: 12px;
        }
    </style>
@endsection

@section('contentHeader')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Warehouse</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                {{-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol> --}}
            </div><!-- /.col -->
        </div>
    </div>
@endsection

@section('mainContent')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            {{-- Alert --}}
            @if (session()->has('success'))
                <div class="alert alert-info alert-dismissible fade show" role="alert" style="width: 70%">
                    <i class="fas fa-info-circle"></i> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Warehouse List Table-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-warehouse mr-1"></i>
                        Warehouse List
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a href="warehouse/create" class="btn btn-outline-success btn-sm"><span class="fas fa-plus"></span> Add</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-success btn-sm ml-2" href="#sales-chart"><span class="fas fa-file-upload"></span> Import</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="table-responsive">
                            <table id="warehouse_tbl" class="table table-bordered table-striped table-hover">
                                <thead class="thead-dark" style="width:100%">
                                    <tr class="text-center" style="width:100%">
                                        <th scope="col">No</th>
                                        <th scope="col" style="width:15%">Name</th>
                                        <th scope="col" style="">Code</th>
                                        <th scope="col" style="width:10%">Type</th>
                                        <th scope="col" style="width:10%">Status</th>
                                        <th scope="col" style="width:15%">Address</th>
                                        <th scope="col" style="">Description</th>
                                        <th scope="col" style="width:9%"><span class="fas fa-cog"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warehouses as $warehouse)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $warehouse->name }}</td>
                                            <td>{{ $warehouse->code }}</td>
                                            <td>{{ $warehouse->type }}</td>
                                            <td class="text-center">
                                                @if($warehouse->statusready == 1) Open @endif
                                                @if($warehouse->statusready == 0) Idle @endif
                                            </td>
                                            <td >{{ $warehouse->address }}</td>
                                            <td>{{ $warehouse->desc }}</td>
                                            <td class="text-center">
                                                <a href="/warehouse/{{ $warehouse->id }}/edit" class="btn btn-outline-warning btn-xs" id="btnEdit" >
                                                    <span class="fas fa-edit"></span>
                                                </a>
                                                <button class="btn btn-outline-danger btn-xs" id="delWarehouse_btn" data-toggle="modal" data-target="#delWarehouse" data-id="{{ $warehouse->id }}" data-name="{{ $warehouse->name }}" data-code="{{ $warehouse->code }}" data-type="{{ $warehouse->type }}" data-statusready="{{ $warehouse->statusready }}" data-address="{{ $warehouse->address }}" data-desc="{{ $warehouse->desc }}" data-no={{ $loop->iteration }}>
                                                    <span class="fas fa-edit"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Warehouse List Table-->

        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->

    <!-- Modal Delete Warning -->
    <div class="modal fade" id="delWarehouse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Warehouse</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delWarehouse_form" method="post">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        Are you sure to delete this warehouse data?
                        <div class="table-responsive mt-2" style="font-size: 13px">
                            <table class="table table-bordered table-striped table-hover" style="width:1200px">
                                <thead class="thead-dark" style="width:100%">
                                    <tr class="text-center" style="width:100%">
                                        <th scope="col">No</th>
                                        <th scope="col" style="width:15%">Name</th>
                                        <th scope="col" style="width:12%">Code</th>
                                        <th scope="col" style="width:7%">Type</th>
                                        <th scope="col" style="width:8%">Status</th>
                                        <th scope="col" style="width:25%">Address</th>
                                        <th scope="col" style="width:25%">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th id="no" class="text-center"></td>
                                        <td id="delname"></td>
                                        <td id="delcode"></td>
                                        <td id="deltype" class="text-center"></td>
                                        <td id="delstatusready" class="text-center"></td>
                                        <td id="deladdress"></td>
                                        <td id="deldesc"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // dataTable
        $(function () {
            $('#warehouse_tbl').DataTable({
                "paging": true,
                "lengthChange": true,
                "lengthMenu": [5, 10, 20, 50, 100, 200, 500],
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": false
                // "scrollY": 200,
                // "scrollX": true
            });
        });

        // Delete Warehouse
        $(document).on("click", "#delWarehouse_btn", function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var code = $(this).data('code');
            var desc = $(this).data('desc');
            var edittype = $(this).data('type');
            var address = $(this).data('address');
            var statusready = $(this).data('statusready');
            var no = $(this).data('no');

            $('#no').html(no);
            $('#delname').html(name);
            $('#delcode').html(code);
            $('#deltype').html(edittype);
            $('#deldesc').html(desc);
            $('#deladdress').html(address);
            
            if (statusready == 1) {
                $('#delstatusready').html("Open");
            }else{
                $('#delstatusready').html("Idle");
            }

            // Jquery to generate attribute action in tag html form
            $('#delWarehouse_form').attr('action', '/warehouse/' + id );
        });

    </script>

@endsection

@section('libsOnFooter')
    <!-- DataTables -->
    <script src="assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
@endsection