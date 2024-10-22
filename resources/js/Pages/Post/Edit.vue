<script setup>
import {ref, defineProps, onMounted} from 'vue';
import {router} from '@inertiajs/vue3';
import {Link} from "@inertiajs/vue3";

const {post: data} = defineProps({
    post: Object
})

const form = ref({
    id: data.id,
    title:  data.title,
    content: data.content
})

function update(){
    router.patch(route('post.update', form.value.id), form.value);
}

onMounted(()=>{
    // form.value.title = data.title; // Обратите внимание на использование .post
    // form.value.content = data.content;
})

</script>

<template>
    <div class="w-96 mx-auto pt-8">
        <h1 class="text-lg mb-8">Editing</h1>
        <Link :href="route('post.index')" class=" ease-in duration-300 hover:bg-sky-500 bg-sky-400 rounded-full text-center text-white p-2 block w-32">All</Link>
        <form v-if="post" @submit.prevent="update">
            <div class="mb-4 mt-4">
                <input type="text" v-model="form.title" placeholder="title" class="rounded-lg border-gray-300 w-full">
            </div>
            <div class="mb-4 mt-4">
                <textarea placeholder="content" v-model="form.content" class="rounded-lg border-gray-300 w-full" rows="7"></textarea>
            </div>
            <div>
                <button type="submit" class="ml-auto ease-in duration-300 hover:bg-sky-500  bg-sky-400 rounded-lg text-center text-white p-2 block w-32">Update</button>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
