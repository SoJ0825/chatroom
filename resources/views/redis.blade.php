<!doctype html>
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
            let socket = io('http://ac78b079.ngrok.io');
// console.log('created');
            socket.on('TaskCreated', function (data) {
                // this.users.push(data.username);
                console.log(data);
            }.bind(this));
        }
    });

</script>
