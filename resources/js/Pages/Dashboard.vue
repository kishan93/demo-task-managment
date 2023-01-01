<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <KanBanBoard :tasks="tasks"/>
    </div>


  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import KanBanBoard from '../Components/Task/KanBanBoard.vue'

defineProps({
  tasks: Array,
})

</script>
