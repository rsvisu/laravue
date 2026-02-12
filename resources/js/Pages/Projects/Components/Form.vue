<script setup>
import {useForm, usePage} from "@inertiajs/vue3";

const props = defineProps({project: Object});

const form = useForm({
  name: props.project?.name ?? "",
  description: props.project?.description ?? "",
  hours: props.project?.hours ?? "",
  starting_date: props.project?.starting_date ?? ""
});

const submit = () => {
  if (props.project) {
    form.put(route("projects.update"), props.project.id);
  } else {
    form.post(route('projects.store'));
  }
}
</script>

<template>
  <div class="card bg-base-100 shadow-xl max-w-2xl mx-auto">
    <div class="card-body">
      <h2 class="card-title">Proyecto</h2>

      <form @submit.prevent="submit" class="space-y-4">
        <!-- Nombre -->
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Nombre</span>
          </label>
          <input
              type="text"
              v-model="form.name"
              placeholder="Nombre del proyecto"
              class="input input-bordered w-full"
              :class="{'input-error': form.errors.name}"
          />
          <label class="label" v-if="form.errors.name">
            <span class="label-text-alt text-error">{{ form.errors.name }}</span>
          </label>
        </div>

        <!-- Descripción -->
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Descripción</span>
          </label>
          <textarea
              v-model="form.description"
              placeholder="Descripción del proyecto"
              class="textarea textarea-bordered w-full"
              :class="{'textarea-error': form.errors.description}"
              rows="4"
          ></textarea>
          <label class="label" v-if="form.errors.description">
            <span class="label-text-alt text-error">{{ form.errors.description }}</span>
          </label>
        </div>

        <!-- Horas -->
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Horas</span>
          </label>
          <input
              type="number"
              v-model="form.hours"
              placeholder="Horas estimadas"
              class="input input-bordered w-full"
              :class="{'input-error': form.errors.hours}"
              min="0"
          />
          <label class="label" v-if="form.errors.hours">
            <span class="label-text-alt text-error">{{ form.errors.hours }}</span>
          </label>
        </div>

        <!-- Fecha de inicio -->
        <div class="form-control w-full">
          <label class="label">
            <span class="label-text">Fecha de inicio</span>
          </label>
          <input
              type="date"
              v-model="form.starting_date"
              class="input input-bordered w-full"
              :class="{'input-error': form.errors.starting_date}"
          />
          <label class="label" v-if="form.errors.starting_date">
            <span class="label-text-alt text-error">{{ form.errors.starting_date }}</span>
          </label>
        </div>

        <!-- Botones -->
        <div class="card-actions justify-end mt-6">
          <a :href="route('projects.index')" class="btn btn-ghost">
            Cancelar
          </a>
          <button
              type="submit"
              class="btn btn-primary"
              :disabled="form.processing"
          >
            <span v-if="form.processing" class="loading loading-spinner loading-sm"></span>
            Guardar
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>

</style>