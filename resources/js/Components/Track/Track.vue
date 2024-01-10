<script>
import {Link} from "@inertiajs/vue3";
    export default {
        name: 'Track',
        emits: ['play'],
        props: {
            tracks: Object,
            active: {type: Boolean,
                default: false
            },

        },
        components:{
            Link
        },
        methods:{
            Handleclick(){
                console.log('bonjour')
                this.$emit('play', this.tracks)
            }
        }
    }

</script>

<template>

    <li>
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

        <button @click="Handleclick()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Play
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <Link :href="route('track.edit', {track: tracks.uuid})">
                Edit
            </Link>
        </button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            <Link :href="route('track.destroy', {track: tracks})" method='delete'as='button'>
                delete
            </Link>
        </button>



    </li>
</template>

<style scoped>



</style>
