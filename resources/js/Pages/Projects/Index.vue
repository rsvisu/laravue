<script setup>
import Layout from "@/Layouts/Layout.vue";
import {computed, ref} from "vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
  projects: Array,
  fieldLabel: Object,
})

// Filtrado
const ascendente = ref(false);
const fieldOrder = ref(Object.keys(props.fieldLabel)[0]);

const projectsOrdered = computed(() => {
  return [...props.projects].sort((a, b) => {
    // Valores
    let aVal = a[fieldOrder.value];
    let bVal = b[fieldOrder.value];

    // Comparación
    if (aVal < bVal) return ascendente.value ? -1 : 1;
    if (aVal > bVal) return ascendente.value ? 1 : -1;

    return 0;
  });
});

const sort = (field) => {
  if (field === fieldOrder.value) {
    ascendente.value = !ascendente.value;
  } else {
    fieldOrder.value = field;
    ascendente.value = true;
  }
}

// Acciones
const destroy = (id) => {
  if (confirm('¿Estas seguro de borrar el proyecto?')) {
    router.delete(route("projects.destroy", id));
  }
}

const seedProjects = () => {
  if (confirm('¿Generar 10 proyectos de prueba?')) {
    router.post(route("projects.seed"));
  }
}

</script>

<template>
  <Layout>
    <!-- Header -->
    <template #header>
      <div class="flex items-center justify-between w-full">
        <span>Proyectos</span>
        <button
          class="btn btn-sm btn-success"
          @click="seedProjects"
        >
          Generar Proyectos
        </button>
      </div>
    </template>
    <!-- Body -->
    <div class="overflow-x-auto w-full">
      <table class="table table-pin-rows table-pin-cols">
        <thead>
        <tr>
          <th></th>
          <td v-for="(label, field) in fieldLabel" :key=field @click="sort(field)" class="cursor-pointer">
            {{ label }}
            <span v-if="field === fieldOrder" class="ml-1">
              {{ ascendente ? '↑' : '↓' }}
            </span>
          </td>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(project, index) in projectsOrdered" :key="project.id">
          <th>
            {{ index + 1 }}
          </th>
          <td v-for="(label, field) in fieldLabel">
            {{ project[field] }}
          </td>
          <td>
            <div class="flex gap-2">
              <button class="btn btn-sm btn-primary">Editar</button>
              <button class="btn btn-sm btn-error" @click="destroy(project.id)">Borrar</button>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </Layout>
</template>

<style scoped>

</style>