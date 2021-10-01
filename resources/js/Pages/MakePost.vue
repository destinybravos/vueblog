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
                            Home / Post Details
                        </span>
                    </div>
                </div>
            </header>
        </template>

   
        <div class="w-full">
            <div class="max-w-6xl mx-auto my-20 rounded">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mb-5">
                    <img v-for="(gala, i) in gallery" :key="i" :src="'/storage/images/gallery/' + gala.image" alt="" class="inline-block h-20">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2 ">
                        <div class="w-full bg-blue-900 h-10 rounded-lg">
                            <button class="px-3 py-1 h-full rounded-t-lg rounded-l-lg mr-1" :class="isPostMode == true ? 'bg-blue-100':'bg-white'" @click="isPostMode = false">Add Category</button> 
                            <button class="px-3 py-1 h-full rounded-t-lg"  :class="isPostMode == true ? 'bg-white':'bg-blue-100'" @click="isPostMode = true">Add Post</button>
                        </div>
                        <form name="frmCategory" v-if="isPostMode == false" @submit.prevent="addCategory()">
                            <div class="items-center gap-4 my-4 rounded-lg shadow-lg border px-5 py-3">
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Category</label>
                                    <input type="text" v-model="category" :class="inputClass" required>
                                </div>
                                <div>
                                    <button type="submit" :class="addBtn">
                                        Add 
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form name="frmPost" @submit.prevent="addPost()" v-else>
                            <div class="items-center gap-4 shadow-lg rounded-lg my-4 border px-5 py-3">
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Title</label>
                                    <input type="text" :class="inputClass" v-model="post.title">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Category</label>
                                    <select :class="inputClass" v-model="post.category_id">
                                        <option value="" selected disabled>Select Post Category</option>
                                        <option v-for="(cat, i) in categories" :key="i" :value="cat.id"> {{ cat.category }} </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Content</label>
                                    <ckeditor :editor="editor" v-model="post.content" :config="editorConfig" :class="'h-96'"></ckeditor>
                                    <!-- <textarea :class="inputClass" v-model="post.content"></textarea> -->
                                </div>
                                <div>
                                    <button :class="addBtn">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div>
                        <!-- Recent Category -->
                        <div v-if="isPostMode == false">
                            <div class="w-full bg-blue-900 rounded-lg shadow-lg border">
                                <div class="w-11/12 h-10 text-gray-50 font-bold text-lg flex items-center mx-auto capitalize">
                                    <p>recent category</p>
                                </div>
                            </div>
                            <div class="h-20 rounded-xl border flex items-center gap-4 my-4 px-3 shadow-lg" v-for="(cat, i) in categories" :key="i" :value="cat.id">
                                <div class="w-full text-gray-800 text-lg font-semibold flex justify-between">
                                    <div>
                                        <p>{{ cat.category }}</p>
                                    </div>
                                    <div class="self-end">
                                        <button  type="button"  @click="deleteCat(cat.id)" class="focus:outline-none focus:border-0 text-red-600">
                                            <font-awesome :icon="['far', 'trash-alt']"/>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent post -->
                        <div v-else>
                            <div class="w-full bg-blue-900 rounded-lg shadow-lg border">
                                <div class="w-11/12 h-10 text-gray-50 font-bold text-lg flex items-center mx-auto capitalize">
                                    <p>recent post</p>
                                </div>
                            </div>
                            <div class="h-auto rounded-xl border grid grid-cols-4 gap-4 my-4 p-2 shadow-lg" v-for="(post, i) in posts" :key="i" :value="post.id">
                                <div class="col-span-1 overflow-hidden bg-gray-500 rounded-lg">
                                    
                                </div>
                                <div class="col-span-3 text-gray-800 flex justify-between items-center w-full h-auto">
                                    <div>
                                        <p class="capitalize font-bold">{{ post.title }}</p>
                                        <div class="flex">
                                            <!-- <p v-html="post.content" class="overflow-ellipsis overflow-hidden w-full"> </p>  -->
                                            <Link :href="route('post', [post.id])" class="text-sm ml-2 font-bold text-opacity-20 cursor-pointer">Read more ...</Link>
                                        </div>
                                    </div>
                                    <div class="text-red-600 cursor-pointer" @click="deletePost(post.id)">
                                        <font-awesome :icon="['far', 'trash-alt']"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>




    </web-layout>
</template>

<script>
import axios from 'axios'
import WebLayout from '../Layouts/WebLayout.vue'
import ClassicEditor  from '@ckeditor/ckeditor5-build-classic'
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: { WebLayout, Link },
    props:{gallery:Array},
    data(){
        return {
            isPostMode:false,
            category:'',
            categories:[],
            inputClass:'border-blue-600 border-opacity-20 border-2 rounded outline-none focus:outline-none ring-1',
            addBtn: 'px-3 bg-gray-900 text-white rounded shadow-md hover:bg-blue-900',

            post: {
                title: '',
                category_id: '',
                content: '',
            }, 
            posts: [],
            editor: ClassicEditor,
            editorConfig:{
                
            }
        }
    },
    methods: {
        addCategory(){
            axios.post(route('api.store.category'), { cat: this.category})
            .then((res) => {
                if (res.data.status == 'success') {
                    alert(res.data.msg)
                    this.category = '';
                    this.fetchCategory();
                } else {
                    alert(res.data.msg)
                }
            })
            .catch((ex) => {
                console.log(ex);
            })
        },
        fetchCategory(){
            axios.post(route('api.fetch.category'))
            .then((res) => {
                this.categories = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        },
        deleteCat(cat){
            if (confirm('Are sure you want to delete ?')) {
                axios.post(route('api.delete.category'), {cat: cat})
                .then((res)=>{
                    if(res.data.code == 200){
                        alert(res.data.msg)
                        this.fetchCategory()
                    } 
                    if(res.data.code == 500) {
                        alert (res.data.msg)
                    }
                })
                .catch((ex) => {
                    console.log(ex);
                })
            }else{
                alert('Category was not delete')
            }
        },

        addPost(){
            axios.post(route('api.store.post'), {post: this.post})
            .then((response)=>{
                if (response.data.code == 200) {
                    alert(response.data.msg)
                    this.fetchPost()
                    this.$inertia.visit('');
                }
                if(res.data.code == 500) {
                    alert(response.data.msg)
                }
            })
            .catch((ex)=>{
                console.log(ex);
            })
        },

        fetchPost(){
            axios.post(route('api.fetch.post'))
            .then((res) => {
                this.posts = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        },

        deletePost(id){
            if (confirm('are you sure you want to delete ?')) {
                axios.post(route('api.delete.post'), {id: id})
                .then((res) =>{
                    if(res.data.code == 200){
                        alert(res.data.msg)
                    }
                    if(res.data.code == 500){
                        alert(res.data.msg)
                    }
                })
            }else{
                alert('Post is safe')
            }
        }

    },
    mounted(){
        this.fetchCategory();
        this.fetchPost();
    }
}
</script>

<style>
    .ck-editor__editable{
        min-height: 250px;
        max-height: 400px;
    }
</style>