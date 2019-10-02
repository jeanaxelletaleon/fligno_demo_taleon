<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">    
      <br />
      <h3 align="center">Personal Information Records</h3>
      <br />
      <div align="right">
        <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
      </div>
      <br />
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="user_table">
          <thead>
            <tr>
              <th width="35%">First Name</th>
              <th width="35%">Middle Name</th>
              <th width="35%">Last Name</th>
              <th width="30%">Action</th>
            </tr>
          </thead>
        </table>
      </div>
      <br />
      <br />
    </div>
    <div id="confirmModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2>Confirmation</h2>
          </div>
          <div class="modal-body">
            <h4 align="center" style="margin:0;">Are you sure you want to remove this record?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger show-toast">OK</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <div id="toast" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2>Success</h2>
          </div>
          <div class="modal-body">
            <h4 align="center" style="margin:0;">Record has been successfully deleted.</h4>
          </div>
        </div>
      </div>
    </div>    
  </body>
</html>

<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label class="control-label col-md-4" >First Name : </label>
              <div class="col-md-8">
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="John"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Middle Name : </label>
              <div class="col-md-8">
                <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Man"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Last Name : </label>
              <div class="col-md-8">
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Doe"/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4">Gender: </label>
              <div class="col-md-8">
                <select class="form-control" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
              </div>
            </div>

            <div class="form-group">
            <label class="control-label col-md-4">Birthdate : </label>
            <div class="col-md-8">
                    <input type="text" name="birthdate" id="birthdate" class="form-control" placeholder="yyyy-mm-dd"/>
            </div>
            </div>
            <div class="form-group">
            <label class="control-label col-md-4">Phone: </label>
            <div class="col-md-8">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="09123456789"/>
            </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-4">Address: </label>
                    <div class="col-md-8">
                            <textarea class="form-control" rows="5" name="address" id="address" placeholder="401 4F CKY Bldg, RN Abejuela St, Brgy 5, Cagayan de Oro"></textarea>
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-md-4">About me: </label>
                    <div class="col-md-8">
                            <textarea class="form-control" rows="5" name="about" id="about"></textarea>
                    </div>
            </div>
                        
            <div class="form-group">
              <label class="control-label col-md-4">Marital Status : </label>
              <div class="col-md-8">
                <label class="radio-inline">
                        <input type="radio" name="marital" value="single" checked>Single
                      </label>
                <label class="radio-inline">
                        <input type="radio" name="marital" value="married">Married
                      </label>
                <label class="radio-inline">
                        <input type="radio" name="marital" value="widowed">Widowed
                </label>
                <label class="radio-inline">
                        <input type="radio" name="marital"value="divorcede" >Divorced
                </label>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Benefits Acquired : </label>
                <div class="col-md-8">
                        @foreach( $benefits as $benefit)
                            <label class="checkbox-inline">
                            <input type="checkbox" name="benefits[{{$benefit->id}}]" value="{{$benefit->id}}">
                            {{$benefit->type_of_benefit}}
                            </label>
                        @endforeach
                </div>
            </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>




<script>
$(document).ready(function(){

 $('#user_table').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('index.index') }}",
  },
  columns:[
   {
    data: 'firstname',
    name: 'firstname'
   },
   {
    data: 'middlename',
    name: 'middlename'
   },
   {
    data: 'lastname',
    name: 'lastname'
   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
    $('.modal-title').text("New Personal Information Record");
    $('#action_button').val("Add");
    $('#action').val("Add");
    $('#sample_form')[0].reset();
    $('#formModal').modal('show');
    $('#form_result').html('');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault(); //stop to submit form data to server
  if($('#action').val() == 'Add')
  {
    console.log($('#sample_form').serialize())
    $.ajax({
    url:"{{ route('index.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
        // console.log(data)
        var html = '';
        if(data.errors)
        {
            html = '<div class="alert alert-danger">';
            for(var count = 0; count < data.errors.length; count++)
            {
            html += '<p>' + data.errors[count] + '</p>';
            }
            html += '</div>';
        }
        if(data.success)
        {
            html = '<div class="alert alert-success">' + data.success + '</div>';
            $('#sample_form')[0].reset();
            $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('index.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
        console.log(data)
        var html = '';
        if(data.errors)
        {
        html = '<div class="alert alert-danger">';
        for(var count = 0; count < data.errors.length; count++)
        {
        html += '<p>' + data.errors[count] + '</p>';
        }
        html += '</div>';
        }
        if(data.success)
        {
        html = '<div class="alert alert-success">' + data.success + '</div>';
        // $('#sample_form')[0].reset();
        $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
    }
   });
  }
 });

 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  console.log(id)
  $('#form_result').html('');
  $.ajax({
   url:"/index/"+id+"/edit",
   dataType:"json",
   success:function(html){
       console.log(html)
        $('#firstname').val(html.data.firstname);
        $('#middlename').val(html.data.middlename);
        $('#lastname').val(html.data.lastname);
        $('#gender').val(html.data.gender);        
        $('#birthdate').val(html.data.birthdate);
        $('#phone').val(html.data.phone);
        $('#about').val(html.data.about);
        $('#address').val(html.data.address);
        $("input[name=marital][value='"+html.data.marital+"']").prop("checked",true);
        // console.log(html.data.benefits)
        for(var i = 0 ; i<html.data.benefits.length; i++){
            // console.log(i)
            $("input[name='benefits["+html.data.benefits[i].id+"]'][value='"+html.data.benefits[i].id+"']").prop("checked",true);
        }
        $('#hidden_id').val(html.data.id);
        $('.modal-title').text("Edit Personal Information Record");
        $('#action_button').val("Save");
        $('#action').val("Edit");
        $('#formModal').modal('show');
   }
  })
 });

 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  console.log(user_id)
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"index/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
      $('#confirmModal').modal('hide');
      $('#toast').modal('show');
      $('#user_table').DataTable().ajax.reload();
    }, 2000);

    setTimeout(function(){
      $('#toast').modal('hide');
    }, 5000);
   }
  })
 });

});
</script>