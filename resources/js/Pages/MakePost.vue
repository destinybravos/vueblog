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
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2">
                        <div class="w-full bg-gray-100">
                            <button class="px-3 py-1 rounded-t-lg" :class="isPostMode == true ? 'bg-blue-100':'bg-blue-400'" @click="isPostMode = false">Add Category</button> 
                            <button class="bg-blue-100 px-3 py-1 rounded-t-lg"  :class="isPostMode == true ? 'bg-blue-400':'bg-blue-100'" @click="isPostMode = true">Add Post</button>
                        </div>
                        <form name="frmCategory" v-if="isPostMode == false" @submit.prevent="addCategory()">
                            <div class="items-center gap-4 bg-gray-400 px-5 py-3">
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Category</label>
                                    <input type="text" v-model="category" required>
                                </div>
                                <div>
                                    <button type="submit" class="px-3 bg-gray-900 text-white rounded">
                                        Add 
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form name="frmPost" v-else>
                            <div class="items-center gap-4 bg-gray-400 px-5 py-3">
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Title</label>
                                    <input type="text">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Category</label>
                                    <select>
                                        <option value="" selected disabled>Select Post Category</option>
                                        <option v-for="(cat, i) in categories" :key="i" :value="cat.id"> {{ cat.category }} </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="capitalize block">Post Content</label>
                                    <textarea></textarea>
                                </div>
                                <div>
                                    <button class="px-3 bg-gray-900 text-white rounded">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        sdsdsds
                    </div>
                </div>
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
        return {
            isPostMode:false,
            category:'',
            categories:[]
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
        }
    },
    mounted(){
        this.fetchCategory()
    }
}
</script>

<style>

</style>