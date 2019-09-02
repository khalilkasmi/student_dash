<template>
  <v-app>
      <div>
          <login v-if="!islogedin"></login>
          <div v-else>
              <dashboard></dashboard>
          </div>
      </div>
  </v-app>
</template>

<script>
    import login from './loginComponent'
    import dashboard from './dashboard'
    export default {
        data(){
            return {

            }
        },
        components: {
            login,
            dashboard
        },

        computed: {
            islogedin(){
                return this.$store.getters.loginStatus
            }
        }
    }
</script>
