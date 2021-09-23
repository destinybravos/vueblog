<template>
    <web-layout>
        <template #page_head>
            <header class="bg-white text-blue-900">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 py-3">
                    <div>
                        <h2 class="text-xl">
                            Home
                        </h2>
                    </div>

                    <div class="text-right hidden md:block">
                        <span class="text-sm">
                            Home / Post
                        </span>
                    </div>
                </div>
            </header>
        </template>
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3 pt-5">
            <div class="flex flex-col gap-1 sm:gap-2 md:gap-3 lg:gap-4">
                <div class=" font-bold capitalize md:text-xl mb-2 px-4">categories</div>
                <div class="flex px-3 gap-2 cursor-pointer hover:scale-90" v-for="(cat,i) in categories" :key="i">
                    <div class="px-3 py-2 shadow-lg rounded-lg border">
                        <font-awesome :icon="['fas', 'star-of-life']" class="text-blue-300"/>
                    </div>
                    <div class="flex-grow-1 text-gray-400 capitalize flex items-center overflow-ellipsis">
                        {{ cat.category }}
                    </div>
                </div>
            </div>
            <div class="sm:col-span-3 md:col-span-4 lg:col-span-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="rounded-lg shadow-lg pt-3 grid gap-2 border divide-y mb-5" v-for="(blog,i) in posts" :key="i">
                        <div class="flex gap-2 px-3">
                            <div class="h-12 w-12 rounded-full bg-gray-500"></div>
                            <div class="flex-grow">
                                <div class="relative flex w-full h-full items-center">
                                    <div class="">
                                        <div class="capitalize font-bold">{{ blog.author }}</div>
                                        <div class="text-gray-300">32 mins ago</div>
                                    </div>
                                    <div class="absolute right-3">
                                        <div @click="blog.show_xmenu=true" class=" px-3 py-2 cursor-pointer">
                                            <font-awesome :icon="['fas', 'ellipsis-h']" class="text-blue-300 " />
                                        </div>
                                        <div class="relative">
                                            <div class="absolute border shadow-lg bg-gray-50 -top-12 -right-3 w-48" v-if="blog.show_xmenu">
                                                <div class="p-2 hover:bg-gray-300 cursor-pointer" @click="blog.show_xmenu=false">other options</div>
                                                <div class="p-2 hover:bg-gray-300 cursor-pointer" @click="blog.show_xmenu=false">other options</div>
                                                <div class="p-2 hover:bg-gray-300 cursor-pointer" @click="blog.show_xmenu=false">other options</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <div class="px-3 bg-gray-50 max-w-full">
                                <p v-html="blog.content"></p>
                            </div>
                            <div class="flex divide-x">
                                <div class="flex-grow flex justify-center items-center py-3">
                                    React
                                </div>
                                <div class="flex-grow flex justify-center items-center py-3 cursor-pointer hover:bg-gray-100" @click="blog.show_comment=true" >
                                    <font-awesome :icon="['far', 'comments']" class="text-blue-300 mx-2"/>Comments
                                </div>
                                <div class="flex-grow flex justify-center items-center py-3 cursor-pointer hover:bg-gray-100">
                                    <font-awesome :icon="['fas', 'share-alt']" class="text-blue-300 mx-2"/>Share
                                </div>
                            </div>
                            <div class="max-w-full" v-if="!blog.show_comment" >
                                <!-- <div class="p-3 bg-gray-300 relative max-w-full">
                                    <div class="flex max-w-full">
                                        <font-awesome :icon="['fas', 'times']" class="text-gray-600 float-right"/>
                                    </div>
                                    
                                </div> -->
                                <div class="flex gap-0 p-3">
                                    <input type="text" class="flex-grow rounded-l-md focus:outline-none border-r-0">
                                    <span class="px-4 bg-blue-800 text-white py-2 uppercase rounded-r-md border-2 border-blue-700">Comment</span>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- <div class=" px-3">
                    <div class=" font-bold capitalize md:text-xl mb-2">related blogs</div>
                    <div class="flex flex-col gap-3">
                        <div class="px-3 py-2 shadow-lg rounded-lg border flex gap-2" v-for="(blog,i) in posts" :key="i">
                            <div class="h-16 w-16 rounded-lg bg-gray-500"></div>
                            <div class="flex-grow">
                                <div class="flex w-full h-full items-center">
                                    <div class="w-full">
                                        <div class=" font-bold text-lg">
                                            {{ blog.title }}
                                        </div>
                                        <div class=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> -->
            </div>
        </div>
    </web-layout>
</template>

<script>
import axios from 'axios'
import WebLayout from '../Layouts/WebLayout.vue'
export default {
  components: { WebLayout },
    data(){
        return{
            categories:[],
            posts:[],
        }
    },
    methods:{
        fetchCategory(){
            axios.post('api/category/fetch')
            .then(res => {
                this.categories = res.data
            })
        },
        fetchPost(){
            axios.post('api/post/fetch')
            .then(res => {
                this.posts = res.data
            })
        }
    },
    mounted(){
        this.fetchCategory();
        this.fetchPost();
    }
}
</script>

<style>

</style>