<template>
    <div class="chat-composer">
        <input type='text' placeholder='text here' name='message' id='message' v-model='messageText' @keyup.enter='sendmessage'>
        <button class='btn btn-primary' @click='sendmessage'>Send</button>
    </div>
</template>

<script>
    export default {
        data(){
          return {
              messageText:'',
          }
        },
        methods:{
          sendmessage(){
            const sample = this.$emit('messagesent',{
                message:this.messageText,
                user: {
                  name: $('.navbar-right .dropdown-toggle').text()
                  //name :'mark pogi'
                }
            });
            this.messageText = '';
          },
        }
    }
</script>

<style>
  .chat-composer {
    display:flex;
  }
  .chat-composer input{
    flex: 1 auto;
  }
  .chat-composer button{
    border-radius: 0;
  }
</style>
