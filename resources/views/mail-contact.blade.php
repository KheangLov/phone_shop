<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact</title>
</head>
<body>
  <h2 style="margin-bottom: 15px;">Subject: {{ $details->subject }}</h2>
  <h4 style="margin-bottom: 15px;">Name: {{ $details->name }}</h4>
  <h6 style="margin-bottom: 30px;">Email: {{ $details->email }}</h6>
  <h6 style="margin-bottom: 10px;">Messages:</h6>
  <p>{{ $details->message }}</p>
</body>
</html>
