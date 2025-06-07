<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit-post</title>
</head>

<body style="background-color:#242424;color:#ffffff; margin:20px">
    <h2>Edit Post</h2>
    <form action="/edit-post/{{ $post->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}" style="border:3px solid; margin:10px 0">
        <textarea name="body" style="border:3px solid; margin:10px 0">{{ $post->body }}</textarea>
        <button style="border:3px solid; margin:10px 0;cursor: pointer;">Save Changes</button>

    </form>
</body>

</html>
