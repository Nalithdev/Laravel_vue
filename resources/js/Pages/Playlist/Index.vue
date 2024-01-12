<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";


export default {
    components: {
        Link,
        MusicLayout,

    },
    props: {
        playlists: Array,
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
                    <th>#</th>
                    <th>Title</th>
                    <th>Tracks</th>
                    <th>Created at</th>
                </tr>
                <tr v-for="(playlist, i) in playlists" key="playlists.uuid">
                    <td>{{ i+1 }}</td>
                    <td>{{ playlist.title }}</td>
                    <td>{{ playlist.tracks_count}}</td>
                    <td>{{ $moment(playlist.created_at).format('DD/MM/YYYY hh.mm.ss') }}</td>
                    <td>
                        <Link :href="route('playlists.show', playlist.id)"
                              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">>

                            Show
                        </Link>
                    </td>

                </tr>
                </thead>
            </table>



        </template>
        <template #action>
            <Link
                v-if="$page.props.isAdmin"
                :href="route('playlists.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Playlist
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
