<template>
  <div class="text-xs-center">
    <v-dialog
      width="500"
    >
      <template v-slot:activator="{ on }">
              <v-icon v-on="on" @click="comment">view_carousel</v-icon>
      </template>

      <v-card>
        <v-card-title
          class="headline"
          style="background-color:#e254ff; border-radius:3px; color:white"
          primary-title
          
        > 
          {{ card.title }}
          
        </v-card-title>

        <v-card-text>
              <span> <h4>Description Issue:</h4></span>
              {{ card.content }} 
              
                <v-divider></v-divider>

              <h4>Comments</h4>

              <v-card class="my-2" style="border-radius:12px;" v-for="comment in comments" key="comment.id" v-model="card"> 
                
                <v-card-title>
                  <v-list-tile-avatar color="grey darken-3">
                <v-img
                  class="elevation-6"
                  src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                 ></v-img>

                </v-list-tile-avatar>
                                  

                  <h5><strong v-if="user.id == comment.user_id"> User Name: </strong></h5>
                  <v-card-title name="content"> <strong>{{ comment.content }}</strong> </v-card-title>
                                                    {{ comment.created_at | FilterDate}}

                </v-card-title>

              </v-card>

            <v-card-title>
                <v-text-field v-model="content" label="Add Comment" name='content' id="content"  @keyup.enter.native="addcomment" required></v-text-field>
            </v-card-title>

        </v-card-text>

          
        <v-card-actions >
          

        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
    var moment = require("moment");

  export default {
    props:["list_name", "card", "user"],
    

    data () {
      return {
        comments:"",
        content:'',
      }
    },
      filters:{
        FilterDate:
                function (value){
                    return moment(value).fromNow()
                }
            },

    methods:{
      comment(){
      axios.get("http://127.0.0.1:8000/api/card/"+this.card.id+/comment/)
      .then(res => { 
        this.comments = res.data
      })
    },
    
    addcomment(){
      let request = {
        content : this.content,
       auth :this.auth

      }
      axios.post("http://127.0.0.1:8000/api/card/"+this.card.id+/comment/, request)
      .then(res => { 
             window.location.href ="/";

      })
    }, 
  } 
}
</script>