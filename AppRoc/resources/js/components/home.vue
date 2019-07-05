<template>

    <div> 
        <toolbar></toolbar>

     <v-container grid-list-xs text-xs-center> 

            <router-view></router-view>

     </v-container>
    
    </div>
</template>
<script>

import toolbar from './ToolBarComponent'
import list from './listComponent'




export default {
        components:{toolbar,list},

        data(){
            return {

            }
        },
}
</script>

