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
                   <img :src="img" alt="" class="w-full max-h-96">
                  <span class="absolute flex gap-3 bottom-0 pb-12 pt-4 pl-4 w-full bg-gradient-to-t from-black via-black  via-black to-transparent">
                      <img :src="pimg" alt="" class="w-8  h-8 bg-gray-50 rounded-full" >
                      <div class="flex-grow">
                        <div class="text-sm font-bold left-12  text-white" :class="pname">{{ pname }}</div>
                       <div class="text-xlg font-semibold  tracking-wider uppercase  left-12  text-white" :id="text">{{ text }}</div>
                      </div>
                  </span>
                </div>
               <div class=" ">
                   <div class="relative">
                        <img :src="img1" alt="" class=" w-full max-h-48 md:block hidden">
                        <span class="absolute flex  bottom-0 pb-10 pt-4 pl-4 w-full bg-gradient-to-t from-black via-black  via-black to-transparent">
                            <img :src="pimg" alt="" class="w-8  h-8 bg-gray-50 rounded-full" >
                            <div class="flex-grow">
                                <div class="text-sm font-bold left-12 pl-3  text-white" :class="pname1">{{ pname1 }}</div>
                                <div class="text-xlg font-semibold pl-3  tracking-wider uppercase  left-12  text-white" :id="text1">{{ text1 }}</div>
                            </div>
                        </span>
                   </div>
                    <div class="relative">
                         <img :src="img2" alt="" class="w-full max-h-48 md:block hidden">
                        <span class="absolute flex  bottom-0 pb-10 pt-4 pl-4 w-full bg-gradient-to-t from-black via-black  via-black to-transparent">
                            <img :src="pimg" alt="" class="w-8  h-8 bg-gray-50 rounded-full" >
                            <div class="flex-grow">
                                <div class="text-sm font-bold left-12 pl-3  text-white" :class="pname2">{{ pname2 }}</div>
                                <div class="text-xlg font-semibold pl-3  tracking-wider uppercase  left-12  text-white" :id="text2">{{ text2 }}</div>
                            </div>
                        </span>
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
          pimg:'img/pro.jpg ',
          pname:'Ebube',
          pname1:'Peter',
          pname2:'Innocent',
          text:'Latest Fuel Price in Imo State',
          text1:'BBNaija Housemate Love life',
          text2:'Increament in poly nekede school fees',
      }
  }
}
</script>
