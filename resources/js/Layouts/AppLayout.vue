<template>
    <div>
        <Head :title="title" />

        <button @click="logout()">
            Logout
        </button>

        <div class="min-h-screen bg-gray-100">
            <!-- Page Content -->
            <main>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
import axios from 'axios';

    export default defineComponent({
        props: {
            title: String,
        },

        components: {
            Head,
            Link,
        },

        data() {
            return {
                
            }
        },

        methods: {
            logout() {
                axios.post(route('logout'))
                .then(() => {
                    this.$inertia.visit(route('home'), { method: 'get' });
                })
            },
        }
    })
</script>
