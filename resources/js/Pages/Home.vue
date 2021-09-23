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
                            Home 
                        </span>
                    </div>
                </div>
            </header>
        </template>
       <!-- <ul>
           <li v-for="(name, i) in mydata" :key="i"> {{ name }} </li>
       </ul> -->
       <div class="h-56 ">
           <div class="grid grid-cols-1   md:grid-cols-3">
               <div class="md:col-span-2 relative ">
                   <img :src="img" alt="" class="w-full max-h-96 ">
                   <span class="text-xlg font-semibold absolute tracking-wider uppercase  pl-4 bottom-20 text-white" :id="text">{{ text }}</span>
                </div>
               <div class=" ">
                   <div class=" ">
                        <img :src="img1" alt="" class=" w-full max-h-48">
                            
                        <img :src="img2" alt="" class="w-full max-h-48 ">
                    </div>
               </div>
           </div>
       </div>

    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
import { usePage } from "@inertiajs/inertia-vue3";

export default {
  components: { WebLayout },
  data(){
      return {
          mydata: usePage().props.value.mydata,
          img:'img/cover.jpg',
          img1:'img/elc.jpg',
          img2:'img/ban.png',
          text:'Latest Fuel Price in Imo State',
      }
  }

}
</script>
