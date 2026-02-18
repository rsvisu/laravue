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

    <!-- Cuerpo -->
      <div class="grid grid-cols-3 gap-6 mb-20">

        <!-- Utilidades -->
        <div class="border-b mb-5 py-3 col-span-full">
          <h2 class="text-lg">Utilidades</h2>
        </div>

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

        <!-- Usuarios -->
        <div class="border-b mb-5 py-3 col-span-full">
          <h2 class="text-lg">Usuarios</h2>
        </div>

        <Card>
          <template #title>
            Todos
          </template>
          Visualiza a todos los usuarios
          <template #cta>
            <Link :href="route('users.index')" class="btn btn-primary">Ver</Link>
          </template>
        </Card>
        <Card>
          <template #title>
            Profesores
          </template>
          Visualiza a todos los profesores
          <template #cta>
            <Link :href="route('users.indexByRole', 'teacher')" class="btn btn-primary">Ver</Link>
          </template>
        </Card>
        <Card>
          <template #title>
            Estudiantes
          </template>
          Visualiza a todos los estudiantes
          <template #cta>
            <Link :href="route('users.indexByRole', 'student')" class="btn btn-primary">Ver</Link>
          </template>
        </Card>
      </div>
  </Layout>
</template>

<style scoped>

</style>