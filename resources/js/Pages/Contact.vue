<template>
    <web-layout>
        <template #page_head>
            <header class="bg-white text-blue-900">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 py-3">
                    <div>
                        <h2 class="text-xl">
                            Contact
                        </h2>
                    </div>

                    <div class="text-right hidden md:block">
                        <span class="text-sm">
                            Home / Contact
                        </span>
                    </div>
                </div>
            </header>
        </template>

        <!-- main contact container -->
        <div class="my-8">
            <div class=" mx-auto max-w-7xl px-6">
                <h1 class="text-xl text-gray-600 mb-4">Contact <span class="text-blue-900 font-bold">-------------</span> </h1>
                <h1 class="text-3xl font-bold text-gray-800 con-head tracking-widest uppercase">Contact Us</h1>
            </div>
            <div class=" mx-auto max-w-7xl mt-10  grid md:grid-cols-2 gap-2">
                <!-- first colum -->
                <div class=" col-span-1 con-body1 p-6">
                    <h1 class="text-3xl text-gray-800 tracking-widest capitalize mb-10">Where you can find us ...</h1>
                    <div class="grid md:grid-cols-3 con-main">
                        <div class=" col-span-1 text-xl text-gray-800 font-bold">
                            <span class=" bg-gray-300 text-blue-900 text-center py-2 px-3 rounded-full con-submain">
                                <font-awesome :icon="['fas', 'map-signs']" class="con-fa" /> 
                            </span> &nbsp;
                            Location:
                        </div>
                        <div class=" col-span-2 text-lg text-gray-600">
                            Programmer's City Nekede, Owerri Imo State 
                        </div>
                    </div>
                    <div class="grid md:grid-cols-3 con-main">
                        <div class=" col-span-1 text-xl text-gray-800 font-bold">
                            <span class=" bg-gray-300 text-blue-900 text-center py-2 px-3 rounded-full con-submain">
                                <font-awesome :icon="['far', 'envelope']" class="con-fa" /> 
                            </span> &nbsp;
                            Email:
                        </div>
                        <div class=" col-span-2 text-lg text-gray-600">
                            <a href="" class=" block hover:text-blue-900">programmercity@yahoo.com</a>
                            <a href="" class=" block hover:text-blue-900">programmercity@gmail.com</a>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-3 con-main1">
                        <div class=" col-span-1 text-xl text-gray-800 font-bold">
                            <span class=" bg-gray-300 text-blue-900 text-center py-2 px-3 rounded-full con-submain">
                                <font-awesome :icon="['fas', 'phone']" class="con-fa" /> 
                            </span> &nbsp;
                            Call:
                        </div>
                        <div class=" col-span-2 text-lg text-gray-600">
                            <a href="" class=" block hover:text-blue-900">+23481947563</a>
                        </div>
                    </div>
                </div>
                <!-- second colum -->
                <div class=" col-span-1 p-6">
                    <form name="frmContact" @submit.prevent="addContact()" >
                        
                        <div class="grid grid-cols-2 gap-1">
                            <div class="mb-4 col-span-1">
                                <label for="Fullname" class="mb-2 text-xl"><font-awesome :icon="['far', 'user']" class="" /> Fullname</label>
                                <input type="text" :class="inputClass" id="inputShadow" v-model="contact.fullname" placeholder="Your Name" required>
                            </div>
                            <div class="mb-4">
                                <label for="Email" class="mb-2 text-xl"><font-awesome :icon="['far', 'envelope']" class="" /> Email</label>
                                <input type="email" :class="inputClass" id="inputShadow" v-model="contact.email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="mb-4">
                                <label for="Subject" class="mb-2 text-xl"><font-awesome :icon="['fas', 'pen']" class="" /> Subject</label>
                                <input type="text" :class="inputClass" id="inputShadow" v-model="contact.subject" placeholder="Your Subject" required>
                        </div>
                        <div class="mb-4">
                            <label for="Message" class="mb-2 text-xl"><font-awesome :icon="['far', 'edit']" class="" /> Message</label>
                            <textarea :class="inputClass" id="inputShadow" class="h-36 resize-none" v-model="contact.content" placeholder="Your Message..." required></textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="py-1 px-3 h-12 rounded text-blue-900" id="addbtn">
                                Send Message
                                <font-awesome :icon="['far', 'envelope']" class="" /> 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </web-layout>
</template>

<script>
import axios from 'axios';
import WebLayout from "../Layouts/WebLayout.vue";
export default {
    components: {WebLayout},
    data(){
        return{
                inputClass: 'block h-10 rounded w-full px-3 border border-gray-50',

                contact: {
                    fullname:'',
                    email:'',
                    subject:'',
                    content:'',
                },
                contacts:[]
            }
    },
    methods: {
        addContact(){
            axios.post(route('api.store.contact'), { cont: this.contact})
            .then((res) => {
                if (res.data.status == 'success') {
                    alert (res.data.msg)
                    this.contact = '';
                    this.fetchContact();
                } else {
                    alert (res.data.msg)
                }
            })
            .catch((ex) => {
                console.log(ex);
            })
        },
        fetchContact(){
            axios.post(route('api.fetch.contact'))
            .then((res) => {
                this.contacts = res.data
            })
            .catch((ex) => {
                console.log(ex);
            })
        }
    },
    mounted(){
        this.fetchContact()
    }
}
</script>

<style scoped>

#inputShadow{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 0% 0% / 0.38);
}

.con-head{
    text-shadow: 0 3px 0px #999;
}
.con-body1{
    box-shadow: 0px 6px 6px hsl(0deg 0% 0% / 0.3);
}

#addbtn{
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 0% 0% / 0.38);
}

#addbtn:hover{
    background: #0000CD;
    color: #fff;
}

.con-main{
    margin-bottom: 50px;
}

.con-main1{
    margin-bottom: 5px;
}

.con-main:hover .con-fa{
    color:#fff;
}

.con-main1:hover .con-fa{
    color:#fff;
}

.con-main:hover .con-submain{
    background:#0000CD;
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 0% 0% / 0.38);
}

.con-main1:hover .con-submain{
    background:#0000CD;
    box-shadow: 2.0px 4.0px 4.0px hsl(0deg 0% 0% / 0.38);
}
</style>