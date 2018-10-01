<template>
    <div v-if="gitfollowers.length > 0" class="git-follower">
        <!--<div class="followers-label">Followers:</div>-->
        <div v-for="gitfollower in gitfollowers" :key="gitfollower.id" class="git-follower">
            <div>
                <img width="50" height="50" :src="gitfollower.avatar_url" :title="gitfollower.login"/>
                <div v-text="gitfollower.login" class="follower-name"></div>
            </div>            
        </div>
        <div v-if="!hideMore" class="followers-load-more">
            <button v-on:click="addFollowersPage">More...</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                gitfollowers: [],
                pageCount: 1,
                hideMore: false,
                endpoint: 'api/followers'
            };
        },
        mounted() {
            this.addFollowersPage();
        },
        props: {
            followuser: String
        },
        methods: {
            addFollowersPage() {
                console.log("followers",this.endpoint,this.followuser,this.pageCount);
                axios.get(this.endpoint,{
                    params: {
                        user: this.followuser,
                        page: this.pageCount
                    }
                })
                .then(({data}) => {
                    console.log("freturn",data);
                    this.gitfollowers = this.gitfollowers.concat(data);
                    this.pageCount++;
                    if (data.length < 30) {
                        //it's the last page of followers, remove the more button
                        this.hideMore = true;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>