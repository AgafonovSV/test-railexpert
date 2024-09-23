

<template>
	<div class="form-wrap">
		<form class="user-form" @submit.prevent="onSubmit">
			<p v-if="errors.length">
				<b>Please correct the following error(s):</b>
				<ul class="errors">
					<li v-for="error in errors">{{ error }}</li>
				</ul>
			</p>
			<p>
				<label for="name">Name: </label>
				<input id="name" v-model="name" placeholder="name" type="number">
			</p>
			<p>
				<label for="email">Email: </label>
				<input id="email" v-model="email" placeholder="email">
			</p>
			<p>
				<label for="description">Description: </label>
				<select id="description" v-model="description">
					<option>php</option>
					<option>js</option>
					<option>golang</option>
					<option>java</option>
				</select>
			</p>
			<p>
				<input type="submit" value="Add">
			</p>
		</form>
	</div>
</template>

<script>
export default {
	data() {
		return {
			name: null,
			email: null,
			description: null,
			errors: []
		}
	},
	methods: {
		onSubmit() {
			if(this.name && this.email && this.description) {
				let user = {
					name: this.name,
					email: this.email,
					description: this.description
				}
				this.addUser(user)
				//this.$emit('user-add', user)
				this.name = null
				this.email = null
				this.description = null
			} else {
				this.errors = []
				if(!this.name) this.errors.push("Name required.")
				if(!this.email) this.errors.push("Email required.")
				if(!this.description) this.errors.push("Description required.")
			}
		},
		addUser(userData) {
			fetch(this.$url +
					'api/users/create?name='+ userData.name +
					'&email=' + userData.name +
					'&description=' + userData.description, {
				method: "GET",
			})
					.then((response) => {
						response.json().then((e) => {
							console.log(e.data);
						});
					})
					.catch((err) => {
						console.error(err);
					});
		}
	}
};
</script>

<style>
.form-wrap {
	text-align: left;
}
.errors {
	color: indianred;
}
</style>