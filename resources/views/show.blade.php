<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Demo</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Personal Information Record</h3>
     <br />
     <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" name="firstname" placeholder="John" value="{{$personal->firstname}}" disabled>
          </div>
          <div class="form-group">
              <label for="middlename">Middle Name</label>
              <input type="text" class="form-control" name="middlename" placeholder="Man" value="{{$personal->middlename}}" disabled>
          </div>
          <div class="form-group">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" name="lastname" value="{{$personal->lastname}}" disabled>
          </div>
          <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" name="gender" value="{{$personal->gender}}" disabled>
    
          </div>
           <div class="form-group">
                  <label for="birthdate">Birth Date</label>
                  <input type="text" class="form-control" name="birthdate" placeholder="yyyy-mm-dd" value="{{$personal->birthdate}}" disabled>
          </div>
          <div class="form-group">
                  <label for="phone">Phone Number</label>
                  <input type="text" class="form-control" name="phone" placeholder="Ex: 09123456789" value="{{$personal->phone}}" disabled>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" rows="3" disabled>{{$personal->address}}</textarea>
          </div>
          <div class="form-group">
                <label for="about">About me</label>
                <textarea class="form-control" name="about" rows="3" disabled>{{$personal->about}}</textarea>
            </div>
          <div class="form-group">
            <label for="address">Marital Status:</label>
            <br>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="marital" id="inlineRadio1" value="{{$personal->marital}}" checked disabled>
            <label class="form-check-label" for="inlineRadio1">{{$personal->marital}}</label>
            </div>
        </div>
        <div class="form-group">
        <label for="address">Benefits Acquired:</label>
        <br>
        @foreach( $personal->benefits as $benefit)
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="benefits[{{$benefit->id}}]" value="{{$benefit->id}}" checked disabled>
            <label class="form-check-label" for="benefits[{{$benefit->id}}]">{{$benefit->type_of_benefit}}</label>
            </div>
        @endforeach
        
   <br />
   <a href="/index" class="btn btn-info" role="button">Back</a>
   <br />
  </div>
 </body>
</html>


