<template>
	<div class="wrapper">
		<div v-if="users">
			<table class="table-users">
				<tr v-for="user in users">
					<td class="user-id">{{ user.id }}</td>
					<td class="user-block">
						<div class="name">{{ user.name }} ({{ user.email }})</div>
						<div class="description">{{ user.description }}</div>
					</td>
				</tr>
			</table>
		</div>
		<div v-else>No users</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			users: "",
		};
	},
	methods: {
		loadUsers() {
			fetch(this.$url + 'api/users', {
				method: "GET",
			})
				.then((response) => {
					response.json().then((e) => {
						this.users = e.data
						console.log(e.data);
					});
				})
				.catch((err) => {
					console.error(err);
				});
		}
	},
	created() {
		this.loadUsers()
	},
};
</script>

<style>
.user-block {
	text-align: left;
	padding-left: 10px;
}
.user-id {
	color: #6ea8fe;
}
.name {
	color: #bde19b;
}
</style>