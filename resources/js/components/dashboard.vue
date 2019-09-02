<template>

        <div>
            <div class="d-inline-block  deep-purple accent-4 white--text">
                <v-card
                    height="100%"
                    width="256"
                    class="mx-auto"
                >
                    <v-navigation-drawer  permanent fixed >
                        <v-list-item>


                            <v-list-item-avatar max-width="50">
                                <v-avatar>
                                    <img :src="user.user.avatar" alt="avatar">
                                </v-avatar>
                            </v-list-item-avatar>


                            <v-list-item-content>
                                <v-list-item-title class="title">
                                    {{user.user.name}}
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{user.user.email}}
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>

                        <v-divider></v-divider>

                        <v-list
                            dense
                            nav
                        >
                            <v-list-item
                                v-for="item in items"
                                :key="item.title"
                                link
                                :href="item.link"
                            >
                                <v-list-item-icon>
                                    <v-icon>{{ item.icon }}</v-icon>
                                </v-list-item-icon>

                                <v-list-item-content>
                                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                            <v-list-item link @click="logout">
                                <v-list-item-icon>
                                    <v-icon>mdi-account-arrow-left</v-icon>
                                </v-list-item-icon>

                                <v-list-item-content>
                                    <v-list-item-title>
                                        Logout
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list>
                    </v-navigation-drawer>
                </v-card>
            </div>
            <div class="d-inline-block ma-2  black white--text">
                <router-view></router-view>
            </div>
        </div>

</template>
<script>
export default {
    data(){
        return {
            items: [
                { title: 'My Account', icon: 'mdi-account',link: '/#/account' },
                { title: 'Classes', icon: 'mdi-book', link: '/#/classes' },

            ],
            right: null,
            user: this.$store.getters.getUser,
            dense:true
        }
    },
    methods: {
        logout(){
            this.$store.commit('logout')
        }
    },
    mounted(){
        this.$swal({
            position: 'top-end',
            type: 'success',
            title: 'welcome back '+ this.$store.getters.getUser.user.name.toLowerCase(),
            showConfirmButton: false,
            customClass: 'swal-wide',
            timer: 5000,
            toast: true
        })
    }
}
</script>

