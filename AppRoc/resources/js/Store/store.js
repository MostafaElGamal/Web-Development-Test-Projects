import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import createPersistedState from 'vuex-persistedstate'


Vue.use(Vuex)


export const store = new Vuex.Store({
	state: {
		token: localStorage.getItem('access_token') || null,
		auth:''

	},
// -----------------------------------------------------------------
	plugins: [createPersistedState()],
// -----------------------------------------------------------------
	mutations:{
		retrieveToken(state, token){
			state.token = token
		},

		destroyToken(state){
			state.token = null	 
		},

		auth(state, auth){
			state.auth = auth
		}
	},

// -----------------------------------------------------------------
	getters:{
		loggedin(state){
			if ( state.token !== null ){
				if (state.token !== undefined){
					return true
				}
			}
			return false
		}
	},
// -----------------------------------------------------------------
	actions: {

		retrieveToken(context, credentials){

			return new Promise( (resolve, reject) =>{

				axios.post('http://127.0.0.1:8000/api/login', {
					email : credentials.email,
					password : credentials.password
					})
					.then(res =>{ 
						const token = res.data.access_token

						localStorage.setItem('access_token', token)
						context.commit('retrieveToken', token)
						store.dispatch('auth')

						resolve(res)
					})
					.catch(error => {
	                      if (error.response.status == 422 ){
	                            reject(error.response.data.errors)

	                      }else if ( error.response.status == 401 ){
	                      	reject(error.response.data)
	                      }
	                    })
				
			})
		},

		destroyToken(context){

			
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token	
			if(context.getters.loggedin){
				return new Promise( (resolve, reject) =>{

				axios.post('http://127.0.0.1:8000/api/logout')

					.then(res =>{ 
						const token = res.data.access_token

						localStorage.removeItem('access_token')
						context.commit('destroyToken')
						resolve(res)
					})
					.catch(error => {
	                      localStorage.removeItem('access_token')
						  context.commit('destroyToken')
                    })
				
				})

			}
		},

		signup(context, data){
			return new Promise( (resolve, reject) =>{

			axios.post('http://127.0.0.1:8000/api/register', {
				name: data.name,
				email: data.email,
				password: data.password,
				password_confirmation: data.password_confirmation
			})

				.then(res =>{ 
					resolve(res)
				})
				.catch(error => {
					reject(error.response.data.errors)
                })
				
			})
		},

		auth(context){
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token	
				if(context.getters.loggedin){
					return new Promise( (resolve, reject) =>{

					axios.get('http://127.0.0.1:8000/api/user')

						.then(res =>{ 
							const auth = res.data
							context.commit('auth', auth)

						})
						.catch(error => {
							console.log("The Error form auth function")
	                    })
					
					})

				}
		},

		createList(context, data){

			console.log(data)

			return new Promise( (resolve, reject) =>{
               axios.post('http://127.0.0.1:8000/api/list', {
               	name: data.name,
               	user_id: data.user_id
               })
                    .then(res =>{
                    	resolve(res)

                    })
                    .catch(error => {
                      if (error.response.status == 422){
                      	reject(error)
                      }
            });
          })
		},

		deleteList(context, data){
			return new Promise( (resolve, reject) =>{
				axios.delete('http://127.0.0.1:8000/api/list/'+ data.listId )

					.then(res =>{ 

						resolve(res)
					})
					.catch(error => {
						reject(error)
                    })
				
				})
		
		}

	}
})