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


       <ul>
           <li v-for="(name, i) in mydata" :key="i"> {{ name }} </li>
       </ul>

    </web-layout>
</template>

<script>
import WebLayout from '../Layouts/WebLayout.vue';
import { usePage } from "@inertiajs/inertia-vue3";

export default {
  components: { WebLayout },
  data(){
      return {
          mydata: usePage().props.value.mydata
      }
  }

}
</script>
