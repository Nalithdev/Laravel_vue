<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";
import Track from "@/Components/Track/Track.vue";


export default {
    components: {
        Track,
        Link,
        MusicLayout,

    },
    props: {
        playlist: Array,
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
            <h1 class="text-3xl">Playlist: {{ playlist.title }}</h1>
            <Link :href="route('playlists.index')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retour</Link>
            <div class="coucou">
                <Track v-for="tracks in playlist.tracks"  :key="tracks.uuid"  :tracks="tracks"  @play="play" >
                </Track>

            </div>
        </template>
    </MusicLayout>
</template>

<style scoped>

.coucou {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
</style>
