<template>
    <div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="msg_history">

                <div v-for="detail in data">
                <div class="outgoing_msg" v-if="detail.user_id == userID">
                    <div class="sent_msg">
                        <p>{{detail.body}}</p>
                        <span class="time_date">{{detail.updated_at}}</span></div>
                </div>

                <div class="incoming_msg" v-else>
                    <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p>{{detail.body}}</p>
                            <span class="time_date">{{detail.updated_at}}</span></div>
                    </div>
                </div>
                </div>
            </div>


            <div class="type_msg">
                <div class="input_msg_write">
                    <input type="text" class="write_msg" placeholder="Type a message" v-model="newMessage"/>
                    <button class="msg_send_btn" type="button" v-on:click="addMessage">
                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                    </button>
                </div>
            </div>


            <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>

        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                userID: 1,
                data: [],
                newMessage: '',
            };
        },
        created() {
            axios.get('/messages').then(response => (this.data = response.data));
            window.Echo.channel('messages').listen('MessageCreated', ({detail}) => {
                this.data.push(detail);
            });
        },

        methods: {
            addMessage() {
                axios.post('/messages', {body: this.newMessage, user_id: this.userID});
                this.data.push({"user_id": this.userID, "body": this.newMessage,
                    "updated_at": this.getTime()});
                this.newMessage = '';
            },

            addZero(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            },

            getTime() {
                var d = new Date();
                var month = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
                var y = d.getFullYear();
                var M = month[d.getMonth()];
                var day = d.getDate();
                var h = this.addZero(d.getHours());
                var m = this.addZero(d.getMinutes());
                var s = this.addZero(d.getSeconds());
                return y + '-' + M + '-' + day + ' ' + h + ":" + m + ":" + s;
            }
        }
    };
</script>
