<template>
    <div>
        <button class="btn btn-primary ml-4" @click="FollowUser">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            

            FollowUser(){
                // make a post request to this endpoint
            axios.post('/follow/' + this.userId)
             .then(response=>{
                 console.log(response.data);
             });
            }
        }
    }
</script>
