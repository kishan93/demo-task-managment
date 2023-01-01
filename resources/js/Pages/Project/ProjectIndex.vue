<template>
  <AppLayout title="Projects">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Projects
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="my-6 text-right">
          <InertiaLink :href="route('projects.create')" class="bg-green-600 text-white py-2 px-4 rounded-lg">Create
            Project
          </InertiaLink>
        </div>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <!-- Table -->
          <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                  <table class="min-w-full">
                    <thead class="border-b">
                      <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          #
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Name
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Created
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <template v-if="projects.length < 1">
                        <tr>
                          <td
                            class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900 bg-gray-200"
                            colspan="4">No Projects found
                          </td>
                        </tr>
                      </template>
                      <tr v-else v-for="(project, index) in projects" class="bg-white"
                          :class="{'border-t': index !==0}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ index + 1 }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ project.name }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ project.created_date }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap space-x-2">
                          <button
                            :disabled="project_id === project.id"
                            @click.prevent="onSelect(project.id)"
                            class="py-1 px-4 text-white rounded-full"
                            :class="[
                              project_id === project.id ? 'bg-green-300' : 'bg-green-600'
                            ]"
                          >
                            {{ project_id != project.id ? 'Select' : 'Selected' }}
                          </button>
                          <InertiaLink :href="route('projects.edit', project.id)"
                                       class="py-1 px-4 bg-blue-600 text-white rounded-full">Edit
                          </InertiaLink>
                          <button @click.prevent="onDelete(project.id)"
                                  class="py-1 px-4 bg-red-600 text-white rounded-full">Delete
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Table -->
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { InertiaLink } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

defineProps({
  projects: Array,
  project_id: {
    default: null,
  },
})

const onDelete = (id) => {
  Inertia.delete(route('projects.destroy', id))
}

const onSelect = (id) => {
  Inertia.post(route('projects.select', id))
}

</script>

<style scoped>

</style>
