<template>
    <div>
        <!-- Header -->
        <slot name="page_head"></slot>
        <!-- Navbar -->
        <navbar></navbar>

        <div class="min-h-screen">
          <slot></slot>
        </div>
        
        <!-- Footer -->
        <footer-component></footer-component>
    </div>
</template>

<script>
import FooterComponent from '../Pages/Include/Footer.vue'
import Navbar from '../Pages/Include/Navbar.vue'
export default {
  components: { Navbar, FooterComponent },
  props:{
    // canPost:Boolean
  }
}
</script>