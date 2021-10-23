<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Módulo de Notas</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="md:grid md:grid-cols-3 md:gap-5">
              <div class="md:col-span-1">
                  <div class="px-4 sm:px-0">
                      <h3 class="text-lg text-gray-900">Editar nota</h3>
                      <p class="text-sm text-gray-600">Si editas, no podrás volver al estado anterior.</p>
                  </div>
              </div>
              <div class="md:col-span-2 mt-5 md:mt-0">
                  <div class="shadow bg-white md:rounded-md p-4">
                      <form @submit.prevent="submit">
                          <label class="block font-medium text-sm text-gray-700">Título</label>
                          <textarea class="form-input w-full rounded-md shadow-sm" rows="2" v-model="form.excerpt"></textarea>
                          <label class="block font-medium text-sm text-gray-700">Contenido</label>
                          <textarea class="form-input w-full rounded-md shadow-sm" rows="10" v-model="form.content"></textarea>
                          <hr class="my-5">
                          <div class="flex justify-between">
                            <inertia-link :href="route('notes.index')">Regresar</inertia-link>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md py-2 px-4">Guardar</button>
                          </div>   
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";

export default defineComponent({
  components: {
    AppLayout
  },
  props: {
      note: Object,
  },
  methods: {
      submit() {
          this.$inertia.put(this.route('notes.update', this.note.id), this.form)
      }
  },
  data () {
      return {
          form: {
              excerpt: this.note.excerpt,
              content: this.note.content
          }
      }
  }
});
</script>
