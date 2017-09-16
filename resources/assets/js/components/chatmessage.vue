<template>
<div class="panel-body">
    <p>{{message.message}}</p>
    <p>{{message.user.name}}</p>
</div>
</template>

<script>
    export default {
        props:['message']
    }
</script>
