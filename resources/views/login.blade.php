<html>

<head>
    <link href="/css/login.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="container">
    <div class="login-container">
        <div id="output"></div>
        <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
        {{--<div class="avatar"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>--}}
        <div class="form-box">
            <form action="/chatroom" method="get">
                <input name="user" type="text" required="required" placeholder="username">
                <button class="btn btn-info btn-block login" type="submit">Login</button>
            </form>
        </div>
    </div>

</div>
</body>
</html>
