<template>
    <div class="chatContainer mx-auto">
        <div class="chatHeader">
            <h3><img src="/images/Octocat.png"> Chat room for everyone</h3>
        </div>

        <div class="chatBody border-left border-right">
            <div v-for="post in posts" :key="post.id">
                <p>{{post.title}}</p>
            </div>
        </div>

        <form v-on:submit.prevent>
            <div class="chatInput">
                <input type="text" class="form-control" name="" id="" required>
                <button class="btn" type="submit">Send</button>  
            </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name:'ChatBox',

    created(){this.fetchMessages()},

    data(){
        return {
            posts:''
        }
    },

    methods: {
        fetchMessages(){
            
        }
    }
}
</script>


<style lang="scss" scoped>
.chatContainer{
    position: relative;
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
.chatInput{
    display: flex;

    & button{
        color: white;
        background: linear-gradient(#ff4b1f, #ff9068);
    }
}
</style>