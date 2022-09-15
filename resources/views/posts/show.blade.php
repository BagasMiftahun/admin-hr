<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
  
<div class="card" style="margin:20px;">
  <div class="card-header">Detail Data Karyawan</div>
  <div class="card-body">
        <div class="card-body">
        <p class="card-text">Name : {{ $post->name }}</p>
        <p class="card-text">Email : {{ $post->email }}</p>
        <p class="card-text">No Telpon : {{ $post->phone }}</p>
        <p class="card-text">Slip Gaji : {{ $post->slip_gaji }}</p>
  </div>
    </hr>

    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Kembali </a>
  </div>
</div>
   
  
