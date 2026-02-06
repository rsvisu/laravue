<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import Nav from "@/Layouts/Parts/Nav.vue";
import Header from "@/Layouts/Parts/Header.vue";
import Footer from "@/Layouts/Parts/Footer.vue";
import {computed, ref} from "vue";
import Modal from "@/Components/Modal.vue";
import LoginModal from "@/Pages/Auth/LoginModal.vue";
import Register from "@/Pages/Auth/Register.vue";
import RegisterModal from "@/Pages/Auth/RegisterModal.vue";

const user = computed(() => usePage().props.auth.user);

// Modales
const showLogin = ref(false);
const showRegister = ref(false);
</script>

<template>

  <div class="min-h-screen bg-base-200 flex flex-col">
    <!-- Nav -->
    <Nav @openLogin="showLogin=true"
         @openRegister="showRegister=true"
    />

    <!-- Header -->
    <Header>
      <slot name="header"/>
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

  <!-- Modales -->

  <!-- Login -->
  <Modal :show="showLogin" @close="showLogin=false">
    <LoginModal @close="showLogin=false"/>
  </Modal>

  <!-- Registro -->
  <Modal :show="showRegister" @close="showRegister=false">
    <RegisterModal @close="showRegister=false"/>
  </Modal>
</template>

<style scoped>

</style>