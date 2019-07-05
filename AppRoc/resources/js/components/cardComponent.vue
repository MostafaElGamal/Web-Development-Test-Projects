<template>
 
             <dragable :options="{group:'newCards', animation:200}" style="min-height: 15px;" 
                 @add="add" 
             >
                    
                <li v-for="card in cards" v-if="card.lists_id === list.id" :key="card.id"  :cardId='card.id'>
                             <v-card
                                color="#aa00ff"
                                class="mx-auto my-2"
                                dark

                            >
                            <v-card-title>
                                Posted {{ card.created_at | changeDataFilter }} 
                            </v-card-title>
                            
                            <v-card-text class="headline font-weight-bold">
                           
                                    {{ card.title }}
                            </v-card-text>

                            <v-card-actions>
                            <v-list-tile class="grow">
                                <v-list-tile-avatar color="grey darken-3">
                                <v-img
                                    class="elevation-6"
                                    src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                                ></v-img>
                                </v-list-tile-avatar>

                                <v-list-tile-content>
                                <v-list-tile-title name="user_name">User Name </v-list-tile-title>
                                </v-list-tile-content>

                                <v-layout
                                align-center
                                justify-end
                                >
                                <v-icon class="mr-1">mdi-heart</v-icon>
                                <span class="subheading mr-2"></span>
                                <span class="mr-1">
                                    
                                    <edit :card="card"></edit>
                                    
                                </span>

                                <v-icon class="xs-1">mdi-share-variant</v-icon>
                                <span class="subheading">
                                    
                                    <showcard :card="card" :list_name="list.name" ></showcard>

                                </span>
                                </v-layout>
                            </v-list-tile>
                            </v-card-actions>
                        </v-card>



                     </li>
            </dragable>
        </v-list>


</template>

<script>
    import edit from './editComponent'
    import showcard from './showcard'
    import dragable from 'vuedraggable'
    var moment = require("moment");

    export default {
        components:{edit, dragable, showcard},
        props:["list", "cards" ],
        
        data(){

            return {
           }    
        },
        filters:{
                changeDataFilter:
                function (value){
                    return moment(value).fromNow()
                }
            },
        methods:{
                
            add(evt){
                let cardId = evt.item.getAttribute("cardId") 
                let listId = this.list.id

                axios.put('http://127.0.0.1:8000/api/card/'+ cardId+"/"+ listId)
                    .then(res =>{
                    })
                    .catch(error => {
                            console.log(error.response)
                    });

            }
            

           
        },

    }
</script>
