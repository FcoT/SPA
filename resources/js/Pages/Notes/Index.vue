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
                      <h3 class="text-lg text-gray-900">Listado de notas</h3>
                      <p class="text-sm text-gray-600">Selecciona el listado y ejecuta cualquier acción <em>(ver, editar o eliminar)</em></p>
                  </div>
              </div>
              <div class="md:col-span-2 mt-5 md:mt-0">
                  <div class="shadow bg-white md:rounded-md p-4">
                      <table>
                          <tr v-for="item in notes" :key="item.id">
                              <td class="border px-4 py-2">{{ item.excerpt }}</td>
                              <td class="px-4 py-2">
                                  <inertia-link :href="route('notes.show', item.id)">Ver</inertia-link>
                              </td>
                              <td class="px-4 py-2">
                                  <inertia-link :href="route('notes.edit', item.id)">Editar</inertia-link>
                              </td>
                          </tr>
                      </table>
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
      notes: Array,
  }
});
</script>
