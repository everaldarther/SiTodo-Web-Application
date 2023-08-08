<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
            margin: 0;
            padding: 0;
        }
    </style>

</head>
<body>
    <h3>From : {{ $emailData['name'] }}</h3>
    <h4>Email : {{ $emailData['from'] }}</h4>
    <hr>
    <p>Message : {{ $emailData['message'] }}</p>

    <p>Thank you</p>
</body>
</html>
