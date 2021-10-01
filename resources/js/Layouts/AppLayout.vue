<template>
    <div>
        <Head :title="title" />

        <div>
            <ul class="bg-blue-900 text-white">
                <li class="inline">
                    <Link :href="route('gallery')" class="inline-block py-1 px-3">Gallery </Link>
                </li>
                <li class="inline">
                    <Link href="" class="inline-block py-1 px-3" @click.prevent="logout()"> Logout </Link>
                </li>
                <!-- <li>
                    <Link href="" @click.prevent="enable2Factor()"> Enable 2 Factor </Link>
                </li> -->
            </ul>
        </div>

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
            // enable2Factor(){
            //     axios.get('/user/two-factor-qr-code')
            //     .then(res => {
            //         console.log(res.data);
            //     })
            //     .catch(error => {
            //         console.log('Error:: ', error.response);
            //         if (error.response.status == 423) {
            //             this.$inertia.visit(route('confirm.password', ['/user/two-factor-qr-code']))
            //         }
            //     })
            // }
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
