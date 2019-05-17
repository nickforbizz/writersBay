
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// for auto scrolling
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll);

// for notifications
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('chat-component', require('./components/chatComponent.vue'));
Vue.component('notification-component', require('./components/NotificationComponent.vue'));




const app = new Vue({
    el: '#appy',

    data: {
        message: '',
        typing: '',
        user: {username: 'Me'},
        numberOfUsers: 0,
        chat:{
            message:[],
            user: [],
            color: [],
            time: []
        }
    },
    methods: {
        send(){
            if( this.message.length != 0 ){

                this.chat.message.push(this.message);
                this.chat.user.push(this.user);
                this.chat.color.push('info');
                this.chat.time.push(this.getTime());
                axios.post('/web/ChatSend', {
                    message: this.message
                })
                    .then(response =>  {
                        this.message = '';

                        console.log(response);
                    })
                    .catch(error=> {
                        console.log(error);
                    });

            }
        },

        getTime(){
            let time = new Date();
            let hourz = time.getHours();
            let hours = (hourz+24-2)%24;
            let mid='am';
            if(hours==0){ //At 00 hours we need to show 12 am
                hours=12;
            }
            else if(hours>12)
            {
                hours=hours%12;
                mid='pm';
            }
            return time.getHours() + " : "+ time.getMinutes()+mid;
        }

    },

    watch:{
        message(){
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                });
        }
    },

    mounted(){
        Echo.private('chat')
            .listen('UserEvent', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.color.push('success');
                this.chat.time.push(this.getTime());

                // console.log(e.user);
            })
            .listenForWhisper('typing', (e) => {
                if(e.name != ''){

                this.typing = 'typing ... ';

                }else{

                this.typing = '';

                }
            });
        Echo.join('chat')
            .here((users) => {
                this.numberOfUsers = users.length;

            })
            .joining((user) => {
                this.numberOfUsers += 1;
                this.$toaster.success(' joined the Chat.');

                console.log(user);
            })
            .leaving((user) => {
                this.numberOfUsers -= 1;
                this.$toaster.success(' Leaved the Chat.');


                console.log(user.name);
            });
    }

});
