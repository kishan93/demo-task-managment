<template>
  <AppLayout title="Tasks">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Task: {{ task.title }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="my-6 text-right">
          <InertiaLink :href="route('tasks.edit', task.id)" class="bg-blue-600 text-white py-2 px-4 rounded-lg">
            Edit
          </InertiaLink>
        </div>

        <div class="bg-white py-6 px-6 overflow-hidden shadow-xl sm:rounded-lg">

          <div class="flex mb-3">
            <div class="w-full content-between">
              <p class="rounded-full max-w-max px-3 w-auto font-mono border border-red-500 text-gray-900">
                {{ task.created_date }}
              </p>
            </div>
            <div class="mx-1 w-1/2">
              <p class="rounded-full px-2 text-center  border text-gray-900 border-green-500 capitalize">{{ taskStatus }}</p>
            </div>
          </div>

          <p>{{task.body}}</p>
        </div>

      </div>
    </div>

  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { InertiaLink } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import { computed } from 'vue'


const props = defineProps({
  task: Object,
})

const taskStatus = computed(() => {
  return !props.task.status ? 'pending' : props.task.status
})
</script>

<style scoped>

</style>
