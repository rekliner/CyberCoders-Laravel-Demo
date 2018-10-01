<template>
    <div>
        <div id="searchForm">
            <input v-model.lazy="searchTerm" placeholder="Search GIT Users">
            <button v-on:click="onSearch">Search</button>
        </div>
        <gitresults :gitusers="gitusers"></gitresults>
    </div>
</template>
<script>
    import gitresults from './GitResults.vue'
    export default {
        data() {
            return {
                searchTerm: '',
                results: '',
                gitusers: [],
                pageCount: 1,
                endpoint: 'api/search'
            };

        },
        components: {
            gitresults
        },
        methods: {
            onSearch() {
                // `this` inside methods points to the Vue instance
                this.fetch(this.searchTerm,this.pageCount);
                // `event` is the native DOM event
            },
            fetch(query, page = 1) {
                console.log("query",this.endpoint,query,page);
                axios.get(this.endpoint,{
                    params: {
                        q: query,
                        page: page
                    }
                })
                .then(({data}) => {
                    console.log(data.items);
                    this.gitusers = data.items;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }

        
    }
</script>