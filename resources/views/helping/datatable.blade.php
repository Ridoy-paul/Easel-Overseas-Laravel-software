
@extends('layouts.app')
@section('body_content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<div class="content">
    <div class="block block-rounded">
        <div class="block-header">
            <h4 class="">Scanned Passports</h4>
        </div>
        <div class="block-content">
            <div class="table-responsive">
            <table class="table table-bordered data-table display nowrap">
                <thead>
                    <tr>
                        <th>Date & Time</th>
                        <th>Name</th>
                        <th>Passport Num.</th>
                        <th>Print By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.scanned.passports.data') }}",
        columns: [
            {data: 'date', name: 'date'},
            {data: 'name', name: 'name'},
            {data: 'passport_num', name: 'passport_num'},
            {data: 'print_by', name: 'print_by'},
            {data: 'action', name: 'action'},
        ],
        "scrollY": "300px",
        "pageLength": 100,
        "ordering": false,
    });
    
  });

</script>
@endsection



<!-- controller -->

<!-- use DataTables;

public function scanned_passport_data(Request $request)
    {
        if ($request->ajax()) {
            $data = ScannedPassport::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('date', function($row){
                    return date('d-m-Y', strtotime($row->created_at));
                })
                ->addColumn('print_by', function($row){
                    return optional($row->scanned_user_name)->name;
                })
                ->addColumn('action', function($row){
                    return '<a type="button" target="_blank" href="'.url('/print-deprature-card/'.$row->unique_id).'" class="btn btn-rounded btn-danger btn-sm">Print</a>';
                })
                
                ->rawColumns(['date', 'print_by', 'action'])
                ->make(true);
        }
    } -->
