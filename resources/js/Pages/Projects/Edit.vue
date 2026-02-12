<script setup>
import Layout from "@/Layouts/Layout.vue";
import Form from "@/Pages/Projects/Components/Form.vue";

const props = defineProps({project: Object});

</script>

<template>
    <Layout>
        <template #header>
            <span>Editar Proyecto</span>
        </template>

    <Form :project="props.project"></Form>
    </Layout>
</template>

<style scoped>

</style>