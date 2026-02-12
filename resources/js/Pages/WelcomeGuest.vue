<script setup>

import Layout from "@/Layouts/Layout.vue";
import {computed, ref} from "vue";
import {Link, usePage} from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";

</script>

<template>
  <Layout>
    <!-- Invitado -->
    <div class="hero bg-base-200 flex-1 flex justify-center items-center min-h-[70vh]">
      <!-- Hero -->
      <div class="hero-content text-center">
        <div class="max-w-md">
          <h1 class="text-5xl font-bold mb-7">Gestor de institutos</h1>
          <p class="mb-2">
            Gestiona tu instituto y obtén acceso a varias utilidades.
          </p>
          <p>
            Inicia sesión o registrate arriba.
          </p>
        </div>
      </div>
    </div>
  </Layout>
</template>

<style scoped>

</style>