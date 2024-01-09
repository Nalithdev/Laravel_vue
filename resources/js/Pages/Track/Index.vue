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
    },
    data() {
        return {
            search: '',
            audio: null,
            current_song: null
        }
    },
    computed: {
        filteredTracks() {
            return this.track.filter((track) => {
                return track.title.toLowerCase().includes(this.search.toLowerCase())
                ||  track.artist.toLowerCase().includes(this.search.toLowerCase())
            })

        }
    },
    methods: {
        play(track) {
            const url = '/storage/' + track.music;

            if(!this.current_song) {
                this.audio = new Audio(url);
                this.audio.play();
            } else if (this.current_song !== track.uuid) {

                this.audio.pause();
                this.audio.src = url;
                this.audio.play();
            } else if (!this.audio.paused) {
                this.audio.pause();
            } else {
                this.audio.play();
            }

            this.current_song = track.uuid;

        }
    }
}


</script>

<template>
    <MusicLayout>
        <template #content>
            <div>
                <input id="search" type="search" name="search" v-model="search">

            </div>

            <div class="coucou" >
                <li v-for="tracks in filteredTracks" :key="tracks" @click="play(tracks)">
                    <p class="mr-3">
                        {{ tracks.artist }}
                    </p>

                    <p>
                        {{ tracks.title }}
                    </p>
                    <br>
                    <p>
                        {{ tracks.uuid }}
                    </p>
                    <img :src="'/storage/' + tracks.image" alt="my image ">


                </li>
            </div>


        </template>
        <template #action>
            <Link
                :href="route('track.create')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
