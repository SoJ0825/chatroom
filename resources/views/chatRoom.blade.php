<html>

<head>
    <link href="/css/chatroom.css" rel="stylesheet" id="bootstrap-css">
    {{--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
          rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app">
    <chat-room></chat-room>
</div>
<script src="/js/app.js"></script>
</body>
</html>