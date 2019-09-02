import request from "vue-resource/src/http/request";

require('./bootstrap');

import axios from 'axios'
import Vuex from 'vuex'
import VueSweetalert2 from 'vue-sweetalert2';
import createPersistedState from 'vuex-persistedstate'
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'

window.Vue = require('vue');



Vue.use(Vuex)
Vue.use(VueSweetalert2)
Vue.use(axios)
Vue.use(Vuetify)
Vue.use(VueResource)
Vue.use(VueRouter)

import classes from './components/classesComponent'
import account from './components/AccountComponent'

const routes = [
    { path: '/classes', component: classes },
    { path: '/account', component: account },
]

const router = new VueRouter({
    routes // short for `routes: routes`
})

Vue.http.interceptors.push((request,next)=> {
    next(response => {
        if(response.status === 404 || response.status === 500)
            this.$swal({
                type: 'error',
                title: 'Oops...',
                text:response.body.error
            })
    })
});

export default new Vuetify({ })


const store = new Vuex.Store({
    state: {
        user: {},
        level: {},
        token: '',
        isSignedIn: false,
    },
    mutations: {
        login(state,user,token){
            state.user = user
            state.token = token
            state.isSignedIn = true
        },
        logout(state){
            state.user = ''
            state.token = ''
            state.isSignedIn = ''
        }
    },
    getters: {
        loginStatus(state){
            if(state.isSignedIn){
                return true
            }else{
                return false
            }
        },
        getUser(state){
            return state.user
        },
        getToken(state){
            return state.token
        },
        getLevel(state){
            return state.level
        }
    },
    plugins: [createPersistedState()],
})

import maincomponent from './components/mainComponent'
import response from "vue-resource/src/http/response";


const app = new Vue({
    el: '#app',
    store,
    router,
    vuetify: new Vuetify(),
    components: {
        maincomponent
    }

})
