<script setup>
import {computed, ref} from "vue";
import {router} from "@inertiajs/vue3";

// Props
const props = defineProps({
  rows: Array,
  fields: Object,
  routes: Object,
  texts: Object
})

// Filtrado
const ascending = ref(false);
const fieldOrdered = ref(Object.keys(props.fields)[0]);

const rowsOrdered = computed(() => {
  return [...props.rows].sort((a, b) => {
    // Valores
    let aVal = a[fieldOrdered.value];
    let bVal = b[fieldOrdered.value];

    // Comparación
    if (aVal < bVal) return ascending.value ? -1 : 1;
    if (aVal > bVal) return ascending.value ? 1 : -1;

    return 0;
  });
});

const sort = (field) => {
  if (field === fieldOrdered.value) {
    ascending.value = !ascending.value;
  } else {
    fieldOrdered.value = field;
    ascending.value = true;
  }
}

// Acciones
const destroy = (id) => {
  if (confirm(props.texts.confirm_delete)) {
    router.delete(route(props.routes.destroy, id));
  }
}

const add = () => {
  router.get(route(props.routes.create));
}

const edit = (id) => {
  router.get(route(props.routes.edit, id));
}

</script>

<template>
  <div class="overflow-x-auto w-full">
    <div class="flex align-cente justify-end my-2">
      <button class="btn btn-sm btn-accent" @click="add">
        {{ props.texts.add }}
      </button>
    </div>
    <table class="table table-pin-rows table-pin-cols">
      <thead>
      <tr>
        <th></th>
        <td v-for="(label, field) in fields" :key="field" @click="sort(field)" class="cursor-pointer">
          {{ label }}
          <span v-if="field === fieldOrdered.value" class="ml-1">
              {{ ascending ? '↑' : '↓' }}
            </span>
        </td>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(row, index) in rowsOrdered" :key="row.id">
        <th>
          {{ index + 1 }}
        </th>
        <td v-for="(label, field) in fields" :key="field">
          {{ row[field] }}
        </td>
        <td>
          <div class="flex gap-2">
            <button class="btn btn-sm btn-primary" @click="edit(row.id)">{{ props.texts.edit }}</button>
            <button class="btn btn-sm btn-error" @click="destroy(row.id)">{{ props.texts.delete }}</button>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>

</style>