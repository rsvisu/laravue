<script setup>

import Layout from "@/Layouts/Layout.vue";
import {computed, ref} from "vue";
import {Link, usePage} from "@inertiajs/vue3";
import Card from "@/Components/Card.vue";
import Modal from "@/Components/Modal.vue";
import LoginModal from "@/Pages/Auth/LoginModal.vue";

</script>

<template>
  <Layout>
    <!-- Header -->
    <template #header>
      <span>Dashboard</span>
    </template>
      <!-- Utilidades -->
      <div class="border-b mb-5 py-3">
        <h2 class="text-lg">Utilidades</h2>
      </div>
      <div class="grid grid-cols-3 gap-6">
        <Card>
          <template #title>
            Cronometero
          </template>
          Accede al cronometro
          <template #cta>
            <Link :href="route('cronometro')" class="btn btn-primary">Ver</Link>
          </template>
        </Card>
        <Card>
          <template #title>
            Proyectos
          </template>
          Accede a los proyectos
          <template #cta>
            <Link :href="route('projects.index')" class="btn btn-primary">Ver</Link>
          </template>
        </Card>
      </div>
  </Layout>
</template>

<style scoped>

</style>