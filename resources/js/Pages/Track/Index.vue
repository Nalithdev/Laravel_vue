<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    components: {
        MusicLayout,
        Link
    },
    props: {
        track: Array
    }
}

</script>

<template>
    <MusicLayout>
        <template #content>
            <div class="coucou">
                <li v-for="tracks in track" :key="tracks">
                    <p>
                        {{ tracks.artist }}
                    </p>
                    <p>
                        {{ tracks.title }}
                    </p>
                    <p>
                        {{ tracks.uuid }}
                    </p>

                </li>
            </div>
        </template>
        <template #action>
            <Link
                href="/track/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create
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
