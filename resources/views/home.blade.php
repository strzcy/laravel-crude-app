<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body style="background-color:#242424;color:#ffffff; margin:20px">
    @auth
        <h2>Congrats you are logged in!</h2>
        <form action="/logout" method="POST">
            @csrf
            <button>Logout</button>
        </form>
        <div class="container" style="border:3px solid;text-align:center; margin:20px 10px">
            <h2>Create a new blog post</h2>
            <form action="/create-post" method="POST" style="display:flex; flex-direction:column; align-items:center">
                @csrf
                <input type="text" name="title" placeholder="Title" style="border:3px solid; margin:10px 0">
                <textarea name="body" placeholder="Description....." style="border:3px solid; margin:10px 0;"></textarea>
                <button style="border:3px solid; margin:10px 0;cursor: pointer;">Create Post</button>
            </form>
        </div>
        <div class="container" style="border:3px solid;text-align:center; margin:20px 10px">
            <h2>All posts By <span style="color: rgba(54, 12, 245, 0.911)">{{ auth()->user()->name }}</span> </h2>
            @foreach ($posts as $post)
                <div style="border-bottom:3px solid;text-align:center; margin:20px 0;">
                    <h3
                        style="background-color:rgb(219, 86, 38);padding:20px; margin:5px 0; display:inline-block;color:#242424">
                        {{ $post['title'] }} By <span style="color: rgba(87, 243, 95, 0.911)">{{ $post->user->name }}</span>
                    </h3>
                    <br>
                    <p
                        style="background-color:rgb(192, 212, 116);padding:20px; margin:5px 0; display:inline-block;color:#242424">
                        {{ $post['body'] }}</p>
                    <p><a href="/edit-post/{{ $post->id }}" style="background-color: bisque;padding:10px">Edit Post</a>
                    </p>
                    <form action="/delete-post/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            style="border:3px solid; margin:10px 0;background-color: rgba(128, 24, 24, 0.637); color:rgb(211, 205, 181);cursor: pointer;">Delete
                            Post</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div class="container">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button>Register</button>
            </form>
        </div>
        <div class="container">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="loginname" placeholder="Name">
                <input type="password" name="loginpassword" placeholder="Password">
                <button>Login</button>
            </form>
        </div>
    @endauth

</body>

</html>
