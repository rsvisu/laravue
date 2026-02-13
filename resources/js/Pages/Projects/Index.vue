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
      <div class="flex items-center justify-between w-full">
        <span>Proyectos</span>
        <div class="flex gap-2">
          <button class="btn btn-sm btn-success" @click="seedProjects">
            Generar Proyectos
          </button>
        </div>
      </div>
    </template>
    <!-- Body -->
    <Table :rows="projects" :fields="tableConfig.fields" :routes="tableConfig.routes" :texts="tableConfig.texts"/>
  </Layout>
</template>

<style scoped>

</style>