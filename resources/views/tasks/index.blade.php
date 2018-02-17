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


<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
    </tr>
    @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td><a href="/tasks/{{ $task->id }}">{{$task->title}}</a></td>
            <td>{{$task->body}}</td>
        </tr>
    @endforeach
</table>

</body>
</html>