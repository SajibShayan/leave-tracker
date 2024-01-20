<script setup>
import { reactive } from "vue";
import AdminLayout from "../../../Layouts/AdminLayout.vue";

const state = reactive({
  imageModal: false,
  images: [],
});

const getImageUploadResponse = (response) => {
  state.imageModal = false;
  state.images = response;
};
</script>
<template>
  <AdminLayout>
    <template #main>
      <button class="btn-primary" @click="state.imageModal = true">Upload modal</button>
    </template>
  </AdminLayout>

</template>
