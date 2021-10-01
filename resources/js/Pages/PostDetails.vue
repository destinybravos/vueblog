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

        <div>
            <div v-html="post.content"></div>
        </div>

    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue'
export default {
    components: { WebLayout },
    props:{post:Object}

}
</script>

<style>

</style>