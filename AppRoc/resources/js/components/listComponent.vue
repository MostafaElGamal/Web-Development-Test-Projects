<template>
<v-container>
          <createlist v-if="loggedIn"></createlist>

	<v-layout row wrap>

        <v-flex v-for="list in lists" :key="list.id" xs4>
            <v-card dark color="primary">


                <div
                    id="e3"
                    style="max-width: 400px; margin: auto;"
                    >
                    <v-toolbar
                    color="#aa00ff"
                    >

                    <v-toolbar-title >{{ list.name }}</v-toolbar-title>
                        <v-spacer></v-spacer>

                                <v-btn  v-on:click="deleteList($id = list.id)"  flat> 
                                    <v-icon >close</v-icon>
                                </v-btn>

                            </v-toolbar>
                        <v-card>
                            <v-container
                            fluid
                            grid-list-lg
                            style="background-color:#ffff;"
                            >

                            <v-layout row wrap>

                            <v-flex xs12>

                                <cardcomp :list='list' :cards='cards'></cardcomp>


                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card>
                </div>
            </v-card>
        </v-flex>
 </v-layout>

  </v-container>

</template>

<script>
    import cardcomp from './cardComponent'
    import createlist from './createListComponent'


    export default {
        components:{createlist, cardcomp},
        

        data(){
            return {
            	lists:"",
            	cards:"",
            }
        },
        mounted(){
        	axios.get("http://127.0.0.1:8000/api/list")
        	.then(res =>{
        		this.lists = res.data.lists
        		this.cards = res.data.cards
        	})
        },

        methods:{
            deleteList(id){

                this.$store.dispatch('deleteList',{
                    listId: id
                    })
                    .then(res => {
                        alert('Deleted Succ')
                        this.$router.push('/issues')
                    })
                    .catch(error => {
                        console.log(error)
                     })

            }

        },
         computed:{
            loggedIn(){
              return this.$store.getters.loggedin
            }
      },
    }
</script>

