<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/crawling/create" method="POST">
    {{csrf_field()}}
        <h3>CRAWLING DATA</h3>
        <label for="">Country Code</label>
        <input type="text" name="code">
        <button type="submit">Submit</button>
    </form>
    {{dd($data)}}
</body>
</html>