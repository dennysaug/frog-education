@extends('layouts.sysadmin')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    @can('permission', 'sysadmin.quizz.new')
                        <div class="card-body text-right">
                            <a class="btn btn-primary" href="{{ route('sysadmin.quizz.new') }}">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                    @endcan
                    @if(isset($list) && $list->count() >0)
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th># ID</th>
                                <th>Start in</th>
                                <th>Questions</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->quantity_question }}</td>
                                    <td>
                                        @if(isset($data->quizzAlternative) && $data->quizzAlternative->count())
                                            @can('permission', 'sysadmin.quizz.result')
                                                <a class="btn btn-warning btn-sm"
                                                   href="{{ route('sysadmin.quizz.questions', $data) }}"
                                                   title="View Result">
                                                    <i class="fas fa-receipt"></i>
                                                </a>
                                            @endcan
                                        @else
                                            @can('permission', 'sysadmin.quizz.questions')
                                                <a class="btn btn-primary btn-sm"
                                                   href="{{ route('sysadmin.quizz.questions', $data) }}"
                                                   title="To Answer Questions">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endcan
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tfoot>
                        </table>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
@endsection

@include('sysadmin.includes.modal_delete')

@section('scripts')
    <!-- DataTables -->
    <script src="/plugins/datatables/jquery.dataTables.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });


    </script>
@endsection
