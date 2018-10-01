<template>
    <div>
        <div v-if="gitusers.length > 0">
            <div class="search-results-title">Search Results:</div>
            <div v-for="gituser in gitusers" :key="gituser.id" class="search-result">
                <div class="search-result-user">
                    <div class="search-result-user-icon">
                    
                    <img width="75" height="75" :src="gituser.avatar_url" />
                    <div v-text="gituser.login"></div>
                    </div>
                </div>
                
                <div><gitfollowers :followuser="gituser.login"></gitfollowers></div>
            </div>
        </div>
        <div v-if="gitusers.length == 0">
            (No users found)
        </div>
    </div>
</template>

<script>
    import gitfollowers from './GitFollowers.vue'
    export default {
        data() {
            return {
                pageCount: 1,
            };

        },
        props: {
            gitusers: Array
        },
        components: {
            gitfollowers
        },
        methods: {
        }

    }
</script>