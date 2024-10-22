<script setup>
import {Link} from '@inertiajs/vue3';
import {defineProps} from 'vue';

const {post: post} = defineProps({
    post:{
        type: Object,
    }
})
</script>

<template>
    <div class="w-96 mx-auto pt-8">
        <h1 class="text-lg mb-8">Index</h1>
        <Link :href="route('post.create')" class=" ease-in duration-300 hover:bg-sky-500 bg-sky-500 rounded-full text-center text-white p-2 block w-32">Add post</Link>
        <Link :href="route('post.index')" class=" ease-in duration-300 hover:bg-sky-500 bg-sky-500 rounded-full text-center text-white p-2 block w-32">All</Link>

        <div class="w-full mt-6 mb-8 p-2 border border-1 border-grey-300 rounded-lg">
            <h3 class="">{{post.title}}</h3>
            <div>{{post.content}}</div>
            <div class="text-sm text-right">{{post.date}}</div>
        </div>
    </div>
</template>

<style scoped>

</style>
