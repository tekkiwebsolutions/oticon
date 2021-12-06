<!DO CTYPE html>
<html>
<head>
    <title>Laravel 8 CRUD Application - ItSolutionStuff.com</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
   
<div class="container">
   <h1>Laravel 8 Pagination Example - Oticon</h1>
   <div class="col-md-10">
           <form action="">
               <h2>Search content in database using Laravel</h2>
               <div class="form-group">
                   <input type="text" name="q" placeholder="Find or Search Members...!" class="form-control"/>
                   <input type="submit" class="btn btn-primary" value="Search"/>
               </div>
           </form>
       </div>
   <table class="table table-bordered">
       <thead>
           <tr>
               <th>Name</th>
               <th width="300px;">Action</th>
           </tr>
       </thead>
       <tbody>
           @if(!empty($data) && $data->count())
               @foreach($data as $key => $value)
                   <tr>
                       <td>{{ $value->first_name }}</td>
                       <td>
                           <button class="btn btn-danger">Delete</button>
                       </td>
                   </tr>
               @endforeach
           @else
               <tr>
                   <td colspan="10">There are no data.</td>
               </tr>
           @endif
       </tbody>
   </table>
       
   {!! $data->links() !!}
</div>
   
</body>
</html>