<script setup>
import Layout from "@/Layouts/Layout.vue";

const props = defineProps({
  projects: Array,
  fieldLabel: Object,
})
</script>

<template>
  <Layout>
    <!-- Header -->
    <template #header>
      <span>Projects</span>
    </template>
    <!-- Body -->
    <div class="overflow-x-auto w-full">
      <table class="table table-pin-rows table-pin-cols">
        <thead>
        <tr>
          <th></th>
          <td v-for="(label, field) in fieldLabel" :key=field>
            {{ label }}
          </td>
          <th></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(project, index) in projects" :key="project.id">
          <th>
            {{ index + 1}}
          </th>
          <td v-for="(label, field) in fieldLabel">
            {{ project[field] }}
          </td>
          <th>
            {{ index + 1}}
          </th>
        </tr>
        </tbody>
        <tfoot>
        <tr>
          <th></th>
          <td v-for="(label, field) in fieldLabel" :key=field>
            {{ label }}
          </td>
          <th></th>
        </tr>
        </tfoot>
      </table>
    </div>
  </Layout>
</template>

<style scoped>

</style>