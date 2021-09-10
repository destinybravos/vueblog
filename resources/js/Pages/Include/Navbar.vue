<template>
    <div class="h-12 bg-blue-900  py-3">
        <div class="container max-w-6xl mx-auto">
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
            navclasses : 'text-md text-white px-3 hover:text-gray-300 font-semibold'
        }
    }
}
</script>

<style>

</style>