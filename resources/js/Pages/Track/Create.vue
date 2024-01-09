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
                artist: '',
                title: '',
                image: null,
                music: null,
                display: true
            })
        }
    },
    methods: {
        submit(){
            console.log('submited')
            this.form.post(route('track.store'))
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
                :href="route('track.index')">
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
                    <p class="text-red-500 text-xs italic">{{ form.errors.title }}</p>
                    <br>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Titre
                    </label>
                    <input type="text" id="artist" v-model="form.artist"
                           class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           :class="{ 'border-red-500': form.errors.artist }"
                           placeholder="Artist">


                    <p class="text-red-500 text-xs italic">{{ form.errors.artist }}</p>
                    <br>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Image
                    </label>
                    <input type="file" id="image" @input="form.image = $event.target.files[0]"
                           class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           :class="{ 'border-red-500': form.errors.image }"
                           placeholder="Image" name="Image">
                    <p class="text-red-500 text-xs italic">{{ form.errors.image }}</p>
                    <br>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Music
                    </label>
                    <input type="file" id="music" @input="form.music = $event.target.files[0]"
                           class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           :class="{ 'border-red-500': form.errors.music }"
                           placeholder="Music" name="Music">
                    <p class="text-red-500 text-xs italic">{{ form.errors.music }}</p>
                    <br>
                    <select name="display" id="display" v-model="form.display"
                            class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option :value="true">True</option>
                        <option :value="false">False</option>
                    </select>

                    {{ form }}
                </div>
                <input type="submit"
                       class="shadow appearance-none border rounded w-full py-2 px-3
                            text-gray-100 leading-tight focus:outline-none focus:shadow-outline bg-blue-700"
                       a
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

