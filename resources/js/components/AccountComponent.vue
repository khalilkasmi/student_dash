<template>
    <div>
       <v-row>
           <
                   <v-list class="mx-auto" width="50%">
                       <v-list-item >
                           <v-avatar size="100"  class="mx-auto">
                               <v-img  :src="user.user.avatar" alt="avatar"></v-img>
                           </v-avatar>
                       </v-list-item>
                       <v-list-item>
                           <v-list-item-title class="text-center mt-3">
                               Welcome back, {{user.user.name}}
                           </v-list-item-title>
                       </v-list-item>
                   </v-list>


       </v-row>
        <v-row class="mt-10">
            <v-card
                class="mx-auto"
                color="white"
                width="50%"
                flat
            >
                <v-expansion-panels
                    multiple

                >
                    <v-expansion-panel class="ma-3">
                        <v-expansion-panel-header>Personal information</v-expansion-panel-header>
                        <v-expansion-panel-content>
                           <v-list>

                               <v-list-item two-line>
                                   <v-list-item-content>
                                       <v-list-item-subtitle >full Name</v-list-item-subtitle>
                                       <v-list-item-title >{{user.user.name}}</v-list-item-title>
                                   </v-list-item-content>
                               </v-list-item>

                               <v-list-item two-line>
                                   <v-list-item-content>
                                       <v-list-item-subtitle >Email</v-list-item-subtitle>
                                       <v-list-item-title >{{user.user.email}}</v-list-item-title>
                                   </v-list-item-content>
                               </v-list-item>

                               <v-list-item two-line>
                                   <v-list-item-content>
                                       <v-list-item-subtitle >Birthdate</v-list-item-subtitle>
                                       <v-list-item-title >{{user.user.birthdate}}</v-list-item-title>
                                   </v-list-item-content>
                               </v-list-item>

                           </v-list>
                        </v-expansion-panel-content>
                    </v-expansion-panel>

                    <v-expansion-panel class="ma-3">
                        <v-expansion-panel-header>Academic information</v-expansion-panel-header>
                        <v-expansion-panel-content>
                            <v-list>

                                <v-list-item two-line>
                                    <v-list-item-content>
                                        <v-list-item-subtitle >CNE</v-list-item-subtitle>
                                        <v-list-item-title >{{user.user.cne}}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item two-line>
                                    <v-list-item-content>
                                        <v-list-item-subtitle >CIN</v-list-item-subtitle>
                                        <v-list-item-title >{{user.user.cin}}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item two-line>
                                    <v-list-item-content>
                                        <v-list-item-subtitle >Major</v-list-item-subtitle>
                                        <v-list-item-title >{{user.user.major}}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item two-line>
                                    <v-list-item-content>
                                        <v-list-item-subtitle >level</v-list-item-subtitle>
                                        <v-list-item-title >{{level.level.level_name}}</v-list-item-title>
                                    </v-list-item-content>
                                </v-list-item>

                            </v-list>
                        </v-expansion-panel-content>
                    </v-expansion-panel>

                </v-expansion-panels>
            </v-card>
        </v-row>

    </div>
</template>

<script>
export default {
    data(){
        return {
            user: this.$store.getters.getUser,
            level: {}
        }
    },
    methods: {
        getlevel(){
            const vm = this
            axios.get('api/user/'+vm.user.user.id+'/level?token='+vm.user.token)
                .then((response) => {
                   vm.level =  response.data;
                })
                .catch((error) => {
                    this.$swal({
                        type: 'error',
                        title: error,
                        showConfirmButton: false,
                        customClass: 'swal-wide',
                        timer: 1500,
                        toast: true
                    })
                });
        }
    },
    mounted() {
        this.getlevel()
    }

}
</script>
