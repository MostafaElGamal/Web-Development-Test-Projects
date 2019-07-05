<template>
    <nav >
      <v-toolbar flat app style="background-image: linear-gradient(-225deg, #7200ca 0%, #e254ff 48%, #aa00ff 100%); color: white;"> 

        <v-toolbar-title class='text-uppercase silver--text'>


             <span class="font-weight-light">Scrum</span>
             <span>Master</span>

           
         </v-toolbar-title>

         <v-spacer></v-spacer>
         
          <login v-if="!loggedIn" ></login>

          <router-link  v-if="!loggedIn" to="/signup">
            <v-btn flat color="white">Register</v-btn>
          </router-link>

           <router-link  v-if="loggedIn" to="/logout">
            <v-btn flat color="white">Logout</v-btn>
          </router-link>


      </v-toolbar>

    </nav>

</template>

<script>

  import login from './Auth/Login'

  export default{
      components:{ login},

      
  	
    data(){
      return {

    }
  },
    computed:{
        loggedIn(){
          return this.$store.getters.loggedin
        }
      },
  
}
</script>
  