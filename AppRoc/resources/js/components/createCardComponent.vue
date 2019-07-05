<template>
  <div class="text-xs-center">
    <v-dialog
      width="500"
    >
      <template v-slot:activator="{ on }">
        

           <v-btn fab dark color="#e254ff" v-on="on" absolute style=" right: 100px; top:35px">
             <v-icon dark>add</v-icon>
          </v-btn>
      </template>

      <v-card>
        <v-card-title
          class="headline"
          style="background-color:#e254ff; border-radius:3px; color:white"
          primary-title
          
        > 
          Create An Issue
        </v-card-title>

        <v-card-text>

          <span v-if="errors.title" class="error">{{ errors.title }}</span>

         <v-text-field label="Issue Name" v-model='title' id="title" required></v-text-field>
          
          <span v-if="errors.content" class="error">{{ errors.content }}</span>

          <v-textarea
                label="Description"
                name="content"
                v-model='content' id="content"
                hint="Write Something Awesome "
              ></v-textarea>
           <v-btn
            color="#e254ff"
            flat
            @click="create"
            v-on:submit.prevent="addnew()"
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
        title:"",
        content:"",
        errors:{}
      }
    },


    methods:{
            create(){
              let data = {
                title:this.title,
                content:this.content
              };
               axios.post('http://127.0.0.1:8000/api/card', data)
                    .then(res =>{
                      this.$router.push('/')
                    })
                    .catch(error => {
                      if (error.response.status == 422){
                        this.errors = error.response.data.errors
                      }
                    });
    },
    addnew(){
      alert(1);
    }
  }
}
</script>