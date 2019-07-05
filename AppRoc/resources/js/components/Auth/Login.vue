<template>
	<v-dialog
	  max-width="600px"
	  v-model="dialog"
	  >
	  <v-btn  slot="activator" color="white" flat>Login</v-btn>
	  <v-card>
	    <v-card-title>
	      
	    	<h2>Log In</h2>

	    </v-card-title>

	    <v-card-text>
	      <v-form class="px3" @submit.prevent="login" >

	     <span v-if="errors.message" class="red--text">{{ errors.message }}</span>

	      	<span v-if="errors.email" class="red--text">{{ errors.email }}</span>

	        <v-text-field name="email" label="Email"  prepend-icon="account_circle" type="email" v-model="email" required></v-text-field>

          	<span v-if="errors.password" class="red--text">{{ errors.password }}</span>

	      	<v-text-field name="password" label="Password" prepend-icon="https"  type="password" v-model="password" required></v-text-field>

	      	 <v-btn color="success" type="submit">Log In</v-btn>

	      </v-form>

	    </v-card-text>

	  </v-card>
	</v-dialog>

</template>


<script>
	 
	export default{
		name:'login',

		data(){
			return {
			email:'',
			password:'',
			errors:{},
			dialog: false
		}
	},

	methods:{
		login(){
			this.$store.dispatch('retrieveToken',{
			email:this.email,
			password:this.password
			})
			.then(res => {
				this.dialog = res
			})
			.catch(error => {
				
               this.errors = error
             })
		}
	}
}
</script>