<script setup>
import {Link, router} from '@inertiajs/vue3';
import {defineProps, ref} from 'vue';
import MainLayout from "@/Layouts/MainLayout.vue";

const { data: posts } = defineProps({
    data: {
        type: Object,
        required: true,
    }
});
function deletePost(id){
    router.delete(route('post.destroy', id));
}
</script>

<template>
    <MainLayout>
    <div class="w-96 mx-auto pt-8">
        <h1 class="text-lg mb-8">Index</h1>
        <Link :href="route('post.create')" class=" ease-in duration-300 hover:bg-sky-500 bg-sky-500 rounded-full text-center text-white p-2 block w-32">Add post</Link>

        <div v-if="posts" v-for="post in posts" class="w-full mt-6 mb-8 p-2 border border-1 border-grey-300 rounded-lg">

            <h3 class="">{{post.title}}</h3>
            <div>{{post.content}}</div>
            <div class="text-sm text-right">{{post.date}}</div>
            <div class="text-right">
                <Link :href="route('post.show', post.id)" class=" duration-300 hover:text-sky:800  text-sky-500 text-center  p-1 block w-28">show</Link>
            </div>
           <div class="text-right">
               <Link :href="route('post.edit', post.id)" class=" duration-300 hover:text-sky:800  text-sky-500 text-center  p-1 block w-28">edit</Link>
           </div>
            <div>
                <p @click.prevent="deletePost(post.id)" class="cursor-pointer duration-300 hover:text-red:800  text-red-500 text-center  p-1 block w-28">delete</p>
            </div>

        </div>
    </div>
    </MainLayout>
</template>

<style scoped>

</style>
