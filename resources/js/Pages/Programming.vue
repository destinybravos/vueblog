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
        
        <!-- <div class="flex gap-2">
            <button class="p-2 bg-gray-100" v-on:click="a--">Sub</button>
            <div class="px-2 py-1">
                {{ a }}
            </div>
            <button class="p-2 bg-gray-100" @click="a++">Add</button>
        </div> -->

        <!-- <div class="px-6 py-2 mb-8 flex w-96">
            <input type="text" class="flex-grow" v-model="user_input"> 
            <button class="flex-intitial py-1 px-2 bg-gray-400" @click="addPerson()">Add Person</button>
        </div>

        <div class="w-96">
            <ul class="">
                <template  v-if="people.length > 0">
                    <li class="py-1 px-2 bg-gray-200 hover:bg-gray-300" v-for="(person, i) in people" :key="i" @click="fillInput(person)">{{ person }}</li>
                </template>
                <template v-else>
                    <li class="py-1 px-2 bg-gray-200 hover:bg-gray-300">No Person dey here</li> 
                </template>
            </ul>
        </div> -->





    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue'
export default {
    components: { WebLayout },
    data(){
        return {
            a:0,
            people:[],
            user_input:''
        }
    },
    methods:{
        addPerson() {
            this.people.push(this.user_input);
            this.user_input = '';
        },
        fillInput(thePerson){
            this.user_input = thePerson;
        }
    }
}
</script>

<style>

</style>