<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IDW</title>
</head>
<body>
    Bonjour {{Auth::user()->name}}
    <form method="POST" action="logout">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>