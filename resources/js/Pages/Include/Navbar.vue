<template>
    <div class="h-12 bg-blue-900 py-3 relative">
        <div  @click="showSide = !showSide" v-if="showSide" class="fixed z-30 h-screen w-screen bg-black bg-opacity-70 top-0"></div>
        <span @click="showSide = !showSide" class="absolute top-1 right-4 bg-gray-300 cursor-pointer px-4 py-2 rounded-lg lg:hidden">
            |||
        </span>
        <div :class="showSide?'-left-0 lg:left-0':'-left-72 lg:left-0'" class="container transition-all duration-700 bg-blue-900 z-50 fixed lg:relative top-0 w-72 h-screen lg:h-auto lg:w-auto max-w-7xl mx-auto">
            <div class="grid grid-cols-1 gap-y-4 lg:grid-cols-3">
                <div class="col-span-2 pt-8 lg:pt-0 gap-y-4 flex flex-col lg:flex-row ">
                    <Link :href="route('home')" :class="navclasses">
                        <font-awesome :icon="['fas', 'home']" /> Home
                    </Link>
                    <Link :href="route('posts')" :class="navclasses">
                        <font-awesome :icon="['far', 'comments']" /> Blog Post
                    </Link>
                    <Link :href="route('categories')" :class="navclasses">
                        <font-awesome :icon="['fas', 'layer-group']" /> Category
                    </Link>
                    <Link :href="route('addposts')" :class="navclasses">
                        <font-awesome :icon="['far', 'edit']" /> Make Post
                    </Link>
                    <Link :href="route('about')" :class="navclasses">
                        <font-awesome :icon="['fas', 'info-circle']" /> About Us
                    </Link>
                    <Link :href="route('contact')" :class="navclasses">
                        <font-awesome :icon="['fas', 'info-circle']" /> Contact Us
                    </Link>
                </div>
                <div class="lg:justify-end gap-y-4 flex flex-col lg:flex-row">
                    <Link :href="route('login')" :class="navclasses">
                        <font-awesome :icon="['fas', 'info-circle']" /> Login
                    </Link>
                    <Link :href="route('register')" :class="navclasses">
                        <font-awesome :icon="['fas', 'info-circle']" /> Register
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavLink from '../../Jetstream/NavLink.vue'
import {Link} from "@inertiajs/inertia-vue3";
export default {
    components: { NavLink, Link },
    props:{
        canMakePost : Boolean
    },
    data(){
        return {
            showSide:false,
            navclasses : 'text-md text-white px-3 hover:text-gray-300 font-semibold'
        }
    }
}
</script>

<style>

</style>