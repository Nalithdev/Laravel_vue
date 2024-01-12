<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link, router} from "@inertiajs/vue3";


export default {
    methods: {
        router() {
            return router
        }
    },
    components: {
        Link,
        MusicLayout,

    },
    props: {
        apikeys: Array  ,
    },


}


</script>

<template>
    <MusicLayout>
        <template #content>
            <h1 class="text-3xl">Playlist</h1>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>key</th>
                    <th>Action</th>
                </tr>
                <tr v-for="apikey in apikeys" :key="apikey.uuid">
                    <td>{{ apikey.name }}</td>
                    <td>{{ apikey.key }}</td>
                    <td class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    <Link :href="route('apiKeys.destroy',{apiKey: apikey})" method="delete" as="button">
                        delete
                    </Link>
                    </td>

                </tr>
                </thead>
            </table>



        </template>
        <template #action>
            <Link
                v-if="$page.props.isAdmin"
                :href="route('apiKeys.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Api Key
            </Link>
        </template>



    </MusicLayout>



</template>


<style scoped>

li {
    list-style: none;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    display: flex;
    flex-wrap: wrap;
    width: 300px;
    text-align: center;

}

p {
    text-align: center;
}

.coucou {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}

</style>
