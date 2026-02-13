<script setup>
import Layout from "@/Layouts/Layout.vue";
import Table from "@/Components/Table.vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
  projects: Array,
  tableConfig: Object
});

const seedProjects = () => {
  if (confirm('¿Generar 10 proyectos de prueba?')) {
    router.post(route("projects.seed"), {count: 10});
  }
}

</script>

<template>
  <Layout>
    <!-- Header -->
    <template #header>
        <span>Proyectos</span>
    </template>
    <!-- Body -->
    <Table :rows="projects" :fields="tableConfig.fields" :routes="tableConfig.routes" :texts="tableConfig.texts">
      <template #extraActions>
        <button class="btn btn-sm btn-soft btn-primary" @click="seedProjects">
          Generar proyectos
        </button>
      </template>
    </Table>
  </Layout>
</template>

<style scoped>

</style>