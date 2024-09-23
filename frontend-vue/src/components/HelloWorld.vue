<script setup>
import { ref } from 'vue'

import UsersList from '../components/blocks/UsersList.vue'
import AddUserForm from '../components/blocks/AddUserForm.vue'

defineProps({
	msgTitle: String,
	msgForm: String,
})

const count = ref(0)
</script>

<template>
  <h1>{{ msgTitle }}</h1>
	<UsersList />
	<h2>{{ msgForm }}</h2>
	<AddUserForm />
</template>

<style scoped>
.read-the-docs {
  color: #888;
}
</style>
