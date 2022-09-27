
@extends('cms.app')
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
        <div class="row p-3">
            <div class="col-md-6">
            <h4 class="">Owners Transactions</h4>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
            <table class="table table-bordered data-table display nowrap">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Which</th>
                        <th>Owner Info</th>
                        <th>Amount</th>
                        <th>Note</th>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Owner Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-info" style="text-align:center;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 60px;"></i>
                </div>
                <div><h2 class="text-center font-bold">Are You Sure?</h2></div>
                <div><p class="text-center">You will not be able to recover this content!</p></div>
                <form action="{{route('delete.owners.transactions')}}" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="ot_id" id="ot_id" value="">
                        <div class="col-md-6 text-center"><button type="submit" name="sellConfirm" class="btn btn-primary">Confirm</button></div>
                        <div class="col-md-6 text-center"><button class="btn btn-danger" data-dismiss="modal">Cancel</button></div>
                    </div>
                </form>
                
            </div>
        </div>
      </div>
      <div class="modal-footer"></div>
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
        ajax: "{{ route('owners.transactions.index.data') }}",
        columns: [
            {data: 'date', name: 'date'},
            {data: 'add_or_withdraw', name: 'add_or_withdraw'},
            {data: 'owners_info', name: 'owners_info'},
            {data: 'amount', name: 'amount'},
            {data: 'note', name: 'note'},
            
        ],
        "scrollY": "300px",
        "pageLength": 50,
        "ordering": false,
    });
    
  });

  function delete_ot(id) {
    $('#ot_id').val(id);
  }

</script>
@endsection
