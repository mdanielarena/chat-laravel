<template>
    <div class="chat-log">
      <chat-message v-for="message in message" :key="message.id" :message="message"></chat-message>
      <div class='empty' v-show='message.length === 0'>
         <strong>Nothing here yet!!!</strong>
      </div>
    </div>
</template>

<script>
    export default {
       props:['message'],
    }
</script>

<style>
  .chat-log .chat-message:nth-child(even){
    background-color:#ccc;
  }
  .empty {
    padding: 1rem;
    text-align: center;
  }
</style>
