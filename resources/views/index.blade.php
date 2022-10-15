 
<!DOCTYPE html>
<html lang="en">

        <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>task 2!</title>
  </head>
  
<body>

<div class="container">
<div class="row">
<div class="col-md-12">
<form action="adddata" method="POST"  enctype="multipart/form-data"  class="card-body" tabindex="500">
									@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <input type="DATE" class="form-control"  name="date" placeholder="Enter DATE" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Time</label>
    <input type="Time" class="form-control"  name="time" placeholder="Enter TIME" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Date Picker</label>
    <select name="datepicker">
        <option>AM</option>
        <option>PM</option>

   </select>
  </div>
 
  <button type="submit" class="btn btn-primary">Submitted</button>
</form>

</div>
</div>
</div>

 <div class="container">
<div class="row">
<div class="col-md-12">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
     <th scope="col">Date Picker</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($tasktwo as $item)
    <tr>
      <th scope="row">{{ $item['id'] }}</th>
      <td>{{ $item['date'] }}</td>
      <td>{{ $item['time'] }}</td>
      <td>{{ $item['datepicker'] }}</td>
    
    </tr>
       @endforeach
  </tbody>
</table>

</div>
</div>
</div>






</body>



</html>