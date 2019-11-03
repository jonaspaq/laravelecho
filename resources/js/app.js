import Vue from 'vue'
import './bootstrap'

import ExampleComponent from './components/ExampleComponent'
import ChatBox from './components/ChatBox'

const app = new Vue({
    el: '#app',
    components: {
        ExampleComponent,
        ChatBox,
    }
});
