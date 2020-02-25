<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact</title>
</head>
<body>
  <h2>{{ $details->subject }}</h2>
  <h4>{{ $details->name }}</h4>
  <h6>{{ $details->email }}</h6>
  <p>{{ $details->message }}</p>
</body>
</html>