<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact</title>
</head>
<body>
  <h2 style="margin-bottom: 0;">Subject: {{ $details->subject }}</h2>
  <h4 style="margin: 0;">Name: {{ $details->name }}</h4>
  <h4 style="margin: 0 0 15px 0;">Email: {{ $details->email }}</h4>
  <h4 style="margin-bottom: 10px;">Messages:</h4>
  <pre>{{ $details->message }}</pre>
</body>
</html>
