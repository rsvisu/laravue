<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import Nav from "@/Layouts/Parts/Nav.vue";
import Header from "@/Layouts/Parts/Header.vue";
import Footer from "@/Layouts/Parts/Footer.vue";
import {computed} from "vue";

const user = computed(() => usePage().props.auth.user);

// Modal

const emit = defineEmits(['openLogin']);
</script>

<template>
  <div class="min-h-screen bg-base-200 flex flex-col">
    <!-- Nav -->
    <Nav @openLogin="emit('openLogin')" />

    <!-- Header -->
    <Header>
      <slot name="header" />
    </Header>

    <!-- Main -->
    <main class="flex-1">
      <div class="px-5 my-3 max-w-7xl mx-auto">
        <slot/>
      </div>
    </main>

    <!-- Footer -->
    <Footer/>
  </div>
</template>

<style scoped>

</style>