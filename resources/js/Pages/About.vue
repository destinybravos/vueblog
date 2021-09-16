<template>
    <web-layout>
        <template #page_head>
            <header class="bg-white text-blue-900">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 py-3">
                    <div>
                        <h2 class="text-xl">
                            About
                        </h2>
                    </div>

                    <div class="text-right hidden md:block">
                        <span class="text-sm">
                            Home / About
                        </span>
                    </div>
                </div>
            </header>
        </template>
        <div class="">
            <div class="bg-white  text-blue-900 flex justify-center ">
                <div class="text-center p-20">
                    <h1 class="text-4xl font-bold tracking-wider animate-pulse duration-500">ABOUT US</h1>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-2 mt-8 mb-8 mx-auto max-w-7xl">
                <div class=" min-h-50 w-72 bg-white-50 flex justify-center items-center pt-4 flex-col border rounded shadow-md hover:shadow-lg">
                    <img src="img/sir.png" alt="" class="h-28 w-28 rounded-full">

                    <div class=" border-b-0 font-bold ">
                       Mr Destiny 
                    </div>
                    <div class="text-gray-400 text-sm">
                        destinybravos@gmail.com
                    </div>
                    <div class="px-3 text-center text-sm mt-3">
                        <div class="font-bold text-lg">About</div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, 
                        earum consequuntur tempore voluptatibus obcaecati magnam assumenda beatae voluptates natus, 
                        vitae itaque deserunt dolorem iusto facilis fugit accusamus molestias saepe dolores.
                    </div>
                    <div class="px-4 w-full py-3">
                        <button class="bg-blue-900 w-full h-8 text-white">Contact</button>
                    </div>
                </div>
                
            </div>
        </div> 
        
    </web-layout>
</template>

<script>
import WebLayout from "../Layouts/WebLayout.vue";
export default {
    components: {WebLayout}
}
</script>