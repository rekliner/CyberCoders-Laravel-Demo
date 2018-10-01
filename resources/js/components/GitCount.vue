<template>
    <div>
        <div class="followers-label" v-text="followers"></div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                followers: 0,
                endpoint: 'api/detail'
            };
        },
        mounted() {
            this.getCount();
        },
        props: {
            user: String
        },
        methods: {
            getCount() {
                console.log("detail",this.endpoint,this.followuser,this.pageCount);
                axios.get(this.endpoint,{
                    params: {
                        user: this.user
                    }
                })
                .then(({data}) => {
                    console.log("ureturn",data);
                    let followSuffix = " Followers:";
                    if (data.followers == 1) followSuffix = " Follower:";
                    this.followers = data.followers + followSuffix;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }

        
    }
</script>