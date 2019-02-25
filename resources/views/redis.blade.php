<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
</head>
<body>
<h1>New Users</h1>


<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.16/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<div>
    <ul>
        <li v-repeat="user in users">@{{ user }}</li>
    </ul>
</div>
<script>

    new Vue({
        el: 'body',

        data() {
            return {
                users: [],
            };
        },
        created() {
            let socket = io('http://192.168.55.226:3000');
            console.log('created');

            socket.on('messages:testEvent', function (data) {
                console.log('get socket');
                this.users.push(data.username);
            }.bind(this));
        }
    });

</script>
</body>
</html>
