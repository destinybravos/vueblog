<template>
    <div>
        <Head :title="title" />

        <button @click="logout()">
            Logout
        </button>

        <div class="min-h-screen bg-gray-100">
            <div>
                <!-- <p>{{ user.firstname }}</p> -->
                <form @submit.prevent="addCategory()"> 
                    <input type="text" v-model="category">
                    <button type="submit">
                        Submit Category
                    </button>
                </form>
            </div>
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
                user: this.$page.props.user,
                category:''
            }
        },

        methods: {
            logout() {
                axios.post(route('logout'))
                .then(() => {
                    this.$inertia.visit(route('home'), { method: 'get' });
                })
            },
            addCategory(){
                let data = {
                    cat : this.category
                }
                axios.post(route('api.store.category'), data)
                .then(res => {
                    console.log(res);
                })
            }
            // deleteToken(){
            //     let Headers = {
            //         headers : {
            //             'Authorization' : 'Bearer ' + localStorage.token,
            //         }
            //     }
            //     axios.post(route('delete_token'), {}, Headers)
            //     .then((res) => {
            //         if (res.data.status == 'success') {
            //             localStorage.removeItem('token');
            //             this.logout();
            //         }
            //     })
            // }
        },
        mounted(){
            console.log(this.$page);
        }
    })
</script>
