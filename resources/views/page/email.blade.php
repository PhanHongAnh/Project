<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Send Mail</h1>
    <form action="send" method="post">
        {{csrf_field()}}
        to: <input type="text" name ='to'>
        massage: <textarea name="massage" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="send">
    </form>
</body>
</html>