
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
Vue.config.devtools = true;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/chatmessage.vue'));
Vue.component('chat-log', require('./components/chatlog.vue'));
Vue.component('chat-composer', require('./components/chatcomposer.vue'));

const app = new Vue({
    el: '#app1',
    data:{
      message:[],
      total_users:[],
    },
    mounted: function(){

    },

    methods:{
      addmessage(message){
        this.message.push(message);
        axios.post('/messages', {message: message['message']});
      }
    },
    created(){

        axios.get('/messages').then(response =>{
            this.message = response.data;
        });

        Echo.join('chatroom')
            .here((users)=> {
              this.total_users = users
            })
            .joining((users)=> {
              this.total_users.push(users)
            })
            .leaving((users)=> {
              this.total_users = this.total_users.filter( u => u != users)
            })
            .listen('messageposted',(e) => {
                this.message.push({
                  message: e.message.message,
                  user: e.user,
                });
            });
    }
});
