<template>
  <div class="text-xs-center">
    <v-dialog
      width="500"
    >
      <template v-slot:activator="{ on }">
        

           <v-btn fab dark color="#e254ff" v-on="on" >
             <v-icon dark>add</v-icon>
          </v-btn>

      </template>

      <v-card>
        <v-card-title
          class="headline"
          style="background-color:#e254ff; border-radius:3px; color:white"
          primary-title
          
        > 
          Create An Lsit
        </v-card-title>

        <v-card-text>

          <span v-if="errors.title" class="error">{{ errors.name }}</span>

         <v-text-field label="List Name" v-model='name' id="name" required></v-text-field>
          

           <v-btn
            color="#e254ff"
            flat
            @click="create"
          >
          Create
          </v-btn>

        </v-card-text>


        <v-card-actions style="background-color:#7200ca">
          <v-spacer ></v-spacer>
         

        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        name:"",
        errors:{},
        auth:this.$store.state.auth
      }
    },


    methods:{
            create(){
           
            this.$store.dispatch('createList', {
              name: this.name,
              user_id:this.auth.id
            })
              .then(res => {
                this.$router.push('/issues')
            })

        }
    },
  }

</script>