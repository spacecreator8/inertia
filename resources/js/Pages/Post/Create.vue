<script setup>
import {ref, defineProps} from 'vue';
import {router} from '@inertiajs/vue3';
import {Link} from "@inertiajs/vue3";

const props = defineProps({
    errors:{
        required:false,
    }
});

const form = ref({
    title:'',
    content:''
})

function store(){
    router.post(route('post.store'), form.value);
}

</script>

<template>
    <div class="w-96 mx-auto pt-8">
        <h1 class="text-lg mb-8">Create</h1>
        <Link :href="route('post.index')" class=" ease-in duration-300 hover:bg-sky-500 bg-sky-400 rounded-full text-center text-white p-2 block w-32">All</Link>
        <form @submit.prevent="store">
            <div class="mb-4 mt-4">
                <input type="text" v-model="form.title" placeholder="title" class="rounded-lg border-gray-300 w-full">
                <div v-if="errors">{{errors.title}}</div>
            </div>
            <div class="mb-4 mt-4">
                <textarea placeholder="content" v-model="form.content" class="rounded-lg border-gray-300 w-full"></textarea>
                <div v-if="errors">{{errors.content}}</div>
            </div>
            <div>
                <button type="submit" class="ml-auto ease-in duration-300 hover:bg-sky-500  bg-sky-400 rounded-lg text-center text-white p-2 block w-32">Send</button>
            </div>
        </form>
    </div>
</template>

<style scoped>

</style>
