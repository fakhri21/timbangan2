        <div id="app">
            <!-- menu item -->
            <b-container fluid>
            <b-row>
            <b-col v-bind:class="m5" md="8" offset-md="2" v-bind:class="b">
            <b-alert variant="success" show dismissible><i class="fas fa-info-circle"></i> Halo {{nama}}, Selamat datang di Dashboard</b-alert>
            
            <!-- kontainer menu -->
            <b-card>
            <transition
                name="custom-classes-transition"
                enter-active-class="animated slideInUp"

                >
                <router-view></router-view>
            </transition>
            </b-card>
            <!-- /kontainer menu -->
            
            
            </b-col>
            </b-row>
            </b-container>            
        </div>