<template>
  <AppLayout title="Manage Project">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Project
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <div class="p-4">
            <form @submit.prevent="onSubmit">

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="project-name">
                    Project Name
                  </label>
                  <input v-model="form.name"
                         class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                         id="project-name" type="text" required>
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="project-color">
                    Project Color Hex
                  </label>
                  <input v-model="form.color"
                         class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                         id="project-color" type="text" required>
                </div>
              </div>

              <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                  <button
                    class="shadow  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit" :disabled="form.processing" :class="[
                      form.processing ? 'bg-green-300 hover:bg-green-400 cursor-not-allowed' : 'bg-green-600 hover:bg-green-800'
                    ]">
                    {{ form.processing ? 'Saving' : 'Save' }}
                  </button>
                  <span class="mx-2" v-if="form.recentlySuccessful">Saved</span>
                </div>
                <div class="md:w-2/3"></div>
              </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
  project: {
    type: Object,
    default: () => ({
      name: '',
      color: '777',
    }),
  },
})

const form = useForm(props.project)

const onSubmit = () => {
  if (props.project.id) {
    form.put(route('projects.update', props.project.id))
    return
  }

  form.post(route('projects.store'))
}

</script>

<style scoped>

</style>
