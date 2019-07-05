<template>
  <div class="text-xs-center">
    <v-dialog
      width="500"
    >
      <template v-slot:activator="{ on }">
      
          
            <v-icon v-on="on">edit</v-icon>
      </template>

      <v-card>
        <v-card-title
          class="headline"
          style="background-color:#e254ff; border-radius:3px; color:white"
          primary-title
        >
        {{ this.card.title }}         
          
      </v-card-title>

        <v-card-text > 
              <span v-if="errors.title" class="error">{{ errors.title }}</span>


            <v-text-field v-model="card.title" label="Issue Name" name='title' id="title" value="this.card.title" required></v-text-field>
              
              <span v-if="errors.content" class="error">{{ errors.content }}</span>

            <v-textarea
              v-model="card.content"  name='content' id="content"

              label="Description"
            ></v-textarea>


            
           <v-btn
            color="success"
            flat
            @click="update"
          >
          Update  
        </v-btn>  

          <v-btn color="error" @click="remove" >Delete</v-btn>

        </form>  
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
  export default {
  props:["card"],

    data () {
      return {
        errors:{}
      }
    },
    
    methods:{
      update(){
        let request = {
          title: this.card.title,
          content: this.card.content,

        }

      axios.put('http://127.0.0.1:8000/api/card/'+this.card.id,request )
      .then(res =>{
            window.location.href ="/";
      })
      .catch(error => {
          if (error.response.status == 422){
                        this.errors = error.response.data.errors
      }
      });
      },

      remove(){
         axios.delete('http://127.0.0.1:8000/api/card/'+this.card.id)
            .then(res =>{
              window.location.href ="/";

                })
      .catch(error => {
          console.log(error.response)
      });
      }
    },  
  }
</script>