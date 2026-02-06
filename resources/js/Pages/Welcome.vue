<script setup>

import Layout from "@/Layouts/Layout.vue";
import {computed} from "vue";
import {Link, usePage} from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";

const user = computed(() => usePage().props.auth.user);
</script>

<template>
  <Layout>
    <!-- Header -->
    <template #header>
      <span v-if="user">Dashboard</span>
    </template>
    <div v-if="user">
      <!-- Utilidades -->
      <div class="border-b mb-5 py-3">
        <h2 class="text-lg">Utilidades</h2>
      </div>
      <div class="grid col-3 gap-6">
        <Card>
          <template #title>
            Cronometero
          </template>
          Accede al cronometro
          <template #cta>
            <Link href="cronometro" class="btn btn-primary">Ver</Link>
          </template>
        </Card>
      </div>
    </div>
    <div v-else class="hero bg-base-200 flex-1 flex justify-center items-center min-h-[70vh]">
      <!-- Hero -->
      <div class="hero-content text-center">
        <div class="max-w-md">
          <h1 class="text-5xl font-bold mb-3">Gestor de institutos</h1>
          <p class="mb-3">
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