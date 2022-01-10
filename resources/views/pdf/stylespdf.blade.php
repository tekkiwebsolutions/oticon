<!DOCTYPE html>
<html>

<head>
    <title>Oticon</title>
</head>

<body>
    
    <p><b>User :</b>{{ $datapdf->email }}</p>
    <p><b>Modal:</b> {{ $datapdf->model }}</p>
    <p><b>Preferred Model:</b> {{ $datapdf->name }}</p>
    <p><b>Color:</b> {{ $datapdf->color_title }}</p>
    <p><b>Product Name:</b> {{ $datapdf->title }}</p>
    <p><b>Client Folder:</b> {{ $datapdf->client_folder }}</p>
    <br>
    <p><b>End Date:-</b> {{ $datapdf->end_date }}</p>
    <br>
    <p><b>Created Date:-</b> {{ $datapdf->created_at }}</p>
</body>

</html>