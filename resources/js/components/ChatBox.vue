<template>
    <div class="chatContainer mx-auto">
        <div class="chatHeader">
            <h3><img src="/images/Octocat.png"> Chat room for everyone</h3>
        </div>

        <div class="chatBody border-left border-right py-2" ref="chatBody">
            <div v-for="message in messages" :key="message.id">

                <div :class="[(authuser.id != message.user_id) ? 'sender' :'reciever']" class="pt-3">
                    <p :class="[(authuser.id != message.user_id) ? 'senderText' :'recieverText']">
                        <small class="messageOwner">{{message.user.name}}</small>
                        {{message.message}} 
                    </p>
                </div>

            </div>

        </div>

        <form v-on:submit.prevent="sendMessage()">
            <div class="chatInput">
                <input type="text" class="form-control" v-model="inputMessage" placeholder="Message here. . ." required>
                <button class="btn" type="submit">Send</button>  
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name:'ChatBox',
    props: ['authuser'],

    data(){
        return {
            channelId: 1,
            messages:[],
            inputMessage:''
        }
    },

    created(){
        this.fetchMessages()
    },

    methods: {
        fetchMessages(){
            let self = this
            axios.get('/getchannelmessages/'+this.channelId)
            .then( response => {
                this.messages = response.data
            })
            .finally( e => {
                this.$refs.chatBody.scrollTop = this.$refs.chatBody.scrollHeight
            })

            window.Echo.channel('public')
            .listen('NewMessage', (e) => {
                self.messages.push(e.message)

                // Scroll down chat body when recieving new message
                setTimeout(e => {this.$refs.chatBody.scrollTop = this.$refs.chatBody.scrollHeight}, 1)
            });
        },
        sendMessage(){
            const holder = {
                user: this.authuser,
                user_id: this.authuser.id,
                message_channel_id: this.channelId,
                message: this.inputMessage
            }
            this.messages.push(holder)
            this.inputMessage = ''

            // Scroll down chat body when sending new message
            setTimeout(e => {this.$refs.chatBody.scrollTop = this.$refs.chatBody.scrollHeight}, 1)

            axios.post('/sendmessage', holder)           
        }
        
    }
}
</script>


<style lang="scss" scoped>
.chatContainer{
    // position: relative;
    width: 500px;
    height: 80vh;
    border-radius: 3px;
}
.chatHeader{
    padding: 15px;
    background: linear-gradient(#ff4b1f, #ff9068);
    color: white;

    & img{
        width: 40px;
        height: 40px;
    }
    & h3{
        margin: 0;
        padding: 0;
    }
}
.chatBody{
    overflow-y: auto;
    width: 100%;
    height: 80%;
}
.sender{
    display: flex;
    padding: 0 8px;

    &Text{
        background: #EAE8E8;
        border: 1px solid rgb(228, 228, 228);
        margin: 0 !important;
        margin-top: 8px;
        border-radius: 9px;
        padding: 7px 10px;
        max-width: 400px;

    }
}
.reciever{
    display: flex;
    padding: 0 8px;
    flex-direction: row-reverse;

    &Text{
        color: white;
        background: #EE6544;
        border: 1px solid rgb(228, 228, 228);
        margin: 0 !important;
        margin-top: 8px;
        border-radius: 9px;
        padding: 7px 10px;
        max-width: 400px;

    }
}
.messageOwner{
    // position:absolute;
    display:block;
}
.chatInput{
    display: flex;

    & button{
        color: white;
        background: linear-gradient(#ff4b1f, #ff9068);
    }
}
</style>