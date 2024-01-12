<script>
import MusicLayout from "@/Layouts/MusicLayout.vue";
import {Link} from "@inertiajs/vue3";

export default {
    components: {
        MusicLayout,
        Link
    },
    data() {
        return {

            form: this.$inertia.form({
                title: '',
                tracks: [],
            })
        }
    },
    props: {
        tracks: Array,
    },
    methods: {
        submit(){
            console.log('submited')
            this.form.post(route('playlists.store'))
        }
    }
}
</script>
<template>

    <MusicLayout>
        <template #title>
            Créer une musique
        </template>

        <template #action>
            <Link
                :href="route('playlists.index')">
                Retour
            </Link>
        </template>

        <template #content>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Titre
                    </label>
                    <input
                        id="title"
                        v-model="form.title"
                        class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        :class="{ 'border-red-500': form.errors.title }"
                        type="text"
                        placeholder="Title"
                    >

                    {{ form }}
                </div>
                <div v-for="track in tracks" key="track.uuid" >
                    <input type="checkbox" :value="track.uuid" v-model="form.tracks">
                    <label :for="track.uuid">
                        {{ track.title }}
                    </label>
                </div>
                <p> {{ form.errors.tracks }}</p>

                <input type="submit"
                       class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-100 leading-tight focus:outline-none focus:shadow-outline bg-blue-700"
                >
            </form>


        </template>
    </MusicLayout>
</template>

<style scoped>
ul {
    list-style: none;
    padding: 0;
}

li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ccc;
    padding: 10px;
}

li:hover {
    background: #8cc0eb;
    color: white;
    cursor: pointer;
}

h3 {
    margin: 0;
}

p {
    margin: 0;
}
</style>

