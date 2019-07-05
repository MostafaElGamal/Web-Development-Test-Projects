<template>

<v-container grid-list-md text-xs-center>
    <v-layout row wrap>
      <v-flex md6 offset-xs3>
        <v-card >
          <v-card-title primary-title>
            
            <h2>Rigster</h2>

          </v-card-title>
        <v-card-text>
             <v-container>
                
                <v-form @submit.prevent="signup">
                    
                    <v-text-field  label="Name" type='text' prepend-icon="person" v-model="form.name" required></v-text-field>
                    <span class="red--text" v-if="errors.name">{{ errors.name }}</span>
                    
                    <v-text-field   label="E-mail" type='email' prepend-icon="email" v-model="form.email"  required></v-text-field>
                    <span class="red--text" v-if="errors.email">{{ errors.email }}</span>

                    
                    <v-text-field  label="Password" type='password'prepend-icon="lock" 
                    v-model="form.password"  required></v-text-field>
                    <span class="red--text" v-if="errors.password">{{ errors.password }}</span>

                    <v-text-field  label="Password Confirm" type='password' prepend-icon="lock" 
                    v-model="form.password_confirmation " required></v-text-field>

                    <v-btn color="success" type="submit">Sign Up</v-btn>


                </v-form>
              </v-container>
        </v-card-text>

        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
  export default {
    name:'register',
    
    data() {
    	return {
        errors:{},
    		form:{
    			name:null,
    			email:null,
    			password:null,
    			password_confirmation :null
    		}

    	}
    },

    methods:{
      signup(){

        this.$store.dispatch('signup',{
          name: this.form.name,
          email: this.form.email,
          password: this.form.password,
          password_confirmation: this.form.password_confirmation
          })

          .then(res => {
            this.$router.push('/')
            alert('Successfuly Rigster')
          })
          .catch(error => {
              this.errors = error
          })
          }
    },
}
</script>

