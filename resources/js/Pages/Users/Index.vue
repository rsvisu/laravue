<script setup>
import Layout from "@/Layouts/Layout.vue";
import Table from "@/Components/Table.vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
  rows: Array,
  tableConfig: Object
});

const seedUsers = () => {
  if (confirm('¿Generar usuarios de prueba?')) {
    router.post(route("users.seed"), {count: 5});
  }
}

// Alerta
const params = new URLSearchParams(window.location.search);
const error = params.get("error");

if (error) {
  alert(error);
}

</script>

<template>
  <Layout>
    <!-- Header -->
    <template #header>
        <span>Usuarios</span>
    </template>
    <!-- Body -->
    <Table :rows="rows" :fields="tableConfig.fields" :routes="tableConfig.routes" :texts="tableConfig.texts">
      <template #extraActions>
        <button class="btn btn-sm btn-soft btn-primary" @click="seedUsers">
          Generar usuarios
        </button>
      </template>
    </Table>
  </Layout>
</template>

<style scoped>

</style>