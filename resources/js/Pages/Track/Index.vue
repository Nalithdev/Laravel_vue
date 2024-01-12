<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";
import Track from "@/Components/Track/Track.vue";

export default {
    components: {
        MusicLayout,
        Link,
        Track
    },
    props: {
        track: Array,
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
            console.log('play')
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

                <div class="coucou">
                <Track
                    v-for="tracks in filteredTracks" :key="tracks.uuid"  :tracks="tracks" @play="play"/>
                </div>

            </div>

            <div class="coucou" >


            </div>


        </template>
        <template #action>
            <Link
                v-if="$page.props.isAdmin"
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
