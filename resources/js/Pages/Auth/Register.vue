<template>
    <div class="min-h-screen w-full bg-gradient-to-br from-blue-900 to-blue-700 flex items-center justify-center">
        <div class="w-11/12 sm:w-9/12 md:w-2/5 lg:w-1/3 bg-gray-100 rounded p-4">
            <form @submit.prevent="registerUser()" class="pt-4">
                <div :class="form_group">
                    <label for="firstname" :class="labels">
                        <font-awesome :icon="['far', 'user']" /> Firstname
                    </label>
                    <input type="text" id="firstname" :class="inputs" v-model="firstname" required>
                </div>
                <div :class="form_group">
                    <label for="lastname" :class="labels">
                        <font-awesome :icon="['far', 'user']" /> Lastname
                    </label>
                    <input type="text" id="lastname" :class="inputs" v-model="lastname">
                    <div v-if="errors.lastname.length > 0" :class="form_group" class="text-red-700 text-sm">
                        {{ errors.lastname[0] }}
                    </div>
                </div>
                <div :class="form_group">
                    <label for="email" :class="labels">
                        <font-awesome :icon="['far', 'envelope']" /> Email
                    </label>
                    <input type="text" id="email" :class="inputs" v-model="email" required>
                </div>
                <div :class="form_group">
                    <label for="phone" :class="labels">
                        <font-awesome :icon="['fas', 'phone-alt']" /> Phone Number
                    </label>
                    <input type="text" id="phone" :class="inputs" v-model="phone" required>
                </div>
                <div :class="form_group">
                    <label for="password" :class="labels">
                        <font-awesome :icon="['fas', 'key']" /> Password
                    </label>
                    <input type="password" id="password" :class="inputs" v-model="password" required>
                </div>
                <div :class="form_group">
                    <label for="password" :class="labels">
                        <font-awesome :icon="['fas', 'lock']" /> Confirm Password
                    </label>
                    <input type="password" id="cpassword" :class="inputs" v-model="cpassword" required>
                </div>
                <div :class="form_group">
                    <button type="submit" :class="btns" class="bg-blue-800 text-white">
                        <font-awesome :icon="['fas', 'user-plus']" /> Sign Up
                    </button>
                </div>
                <div class="text-center text-sm cursor-pointer text-blue-600 animate-pulse">
                    <Link :href="route('login')">
                        Already have an account, Sign In.
                    </Link>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import axios from 'axios';

export default {
    components:{
        Link,
        JetAuthenticationCardLogo
    },
    data(){
        return {
            form_group:'mb-4',
            inputs:'w-full h-8 rounded px-3 block',
            labels:'mb-1 font-bold',
            btns: 'px-4 py-1 rounded',
            firstname :'',
            lastname : '',
            email : '',
            phone : '',
            password : '',
            cpassword : '',
            errors:{
                lastname:[]
            }
        }
    },
    methods: {
        registerUser(){
            let formData = {
                firstname: this.firstname,
                lastname: this.lastname,
                email: this.email,
                phone: this.phone,
                password: this.password,
                password_confirmation: this.cpassword,
            }

            axios.post(route('register'), formData)
            .then(res => {
                if(res.data.status == 'success'){
                    this.$inertia.visit(route('dashboard'));
                }else{
                    alert('An Error occured!')
                }
            })
            .catch(err => {
                if (err.response) {
                    this.errors = err.response.data.errors
                } else {
                    console.log('Network Error');
                }
            })
        }
    }
}
</script>

<style>

</style>