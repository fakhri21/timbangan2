<!-- template -->
        <!-- template view untuk komponen "Home" -->
        <script type="text/x-template" id="home">
        <b-row>
        <b-col md="4" sm="4" v-bind:class="c_untuk_kolom_item" v-for="menuitem in menu">
        
        <router-link v-if="menuitem.status==='internal'" :to="menuitem.value" style="text-decoration: none;">
        
        <div v-bind:class="c_kontainer_item">
        <div v-bind:class="c_untuk_itemnya">
            <i v-bind:class="menuitem.ikon"></i>
        </div>
        <p v-bind:class="text_hitam">{{menuitem.judul}}</p>
        
        </div>
        
        </router-link>
        <a v-if="menuitem.status!='internal'"  v-bind:href="base_url+menuitem.value">
        
        <div v-bind:class="c_kontainer_item">
        <div v-bind:class="c_untuk_itemnya">
            <i v-bind:class="menuitem.ikon"></i>
        </div>
        <p v-bind:class="text_hitam">{{menuitem.judul}}</p>
        
        </div>
        
        </a>

        </b-col>
        </b-row>
        </script>

        <script type="text/x-template" id="timbangan">
        <b-row>
            <b-col md="12">
                <b-button @click="goBack" class="mb-3"><i class="fas fa-angle-left"></i> Kembali</b-button>
                <b-alert variant="success" show><i class="fas fa-info-circle"></i> Status timbangan saat ini : <b>{{status}}</b></b-alert>
                <b-button variant="primary" class="mb-4"><i class="fas fa-door-open"></i> Buka Timbangan</b-button>
                <b-button variant="danger" class="mb-4"><i class="fas fa-door-closed"></i> Tutup Timbangan</b-button>

            </b-col>
        <b-col md="4" sm="4" v-bind:class="c_untuk_kolom_item" v-for="menuitem in menu">
        <router-link  v-if="menuitem.status==='internal'" :to="menuitem.value" style="text-decoration: none;">
        
        <div v-bind:class="c_kontainer_item">
        <div v-bind:class="c_untuk_itemnya">
            <i v-bind:class="menuitem.ikon"></i>
        </div>
        <p v-bind:class="text_hitam">{{menuitem.judul}}</p>
        
        </div>
        
        </router-link>

        <a v-if="menuitem.status!='internal'"  v-bind:href="base_url+menuitem.value">
        
        <div v-bind:class="c_kontainer_item">
        <div v-bind:class="c_untuk_itemnya">
            <i v-bind:class="menuitem.ikon"></i>
        </div>
        <p v-bind:class="text_hitam">{{menuitem.judul}}</p>
        
        </div>
        
        </a>

        </b-col>
        </b-row>
        </script>
        <script type="text/x-template" id="piutang">
        <b-row>
            <b-col md="12" class="mb-2">
                <b-button @click="goBack"><i class="fas fa-angle-left"></i> Kembali</b-button>
            </b-col>
        <b-col md="4" sm="4" v-bind:class="c_untuk_kolom_item" v-for="menuitem in menu">
        <router-link :to="menuitem.value" style="text-decoration: none;">
        
        <div v-bind:class="c_kontainer_item">
        <div v-bind:class="c_untuk_itemnya">
            <i v-bind:class="menuitem.ikon"></i>
        </div>
        <p v-bind:class="text_hitam">{{menuitem.judul}}</p>
        
        </div>
        
        </router-link>
        </b-col>
        </b-row>
        </script>
<script>
var base_url ="<?php echo base_url() ?>"
    Vue.component('menu-awal', {
    template: '#home',
    data: function() {
        return {
            menu: [

                {
                    judul: 'Timbangan',
                    ikon: 'fas fa-weight ikon-besar',
                    value : 'ke-menu-timbangan',
                    status :'internal'
                },

                {
                    judul: 'Piutang Dagang',
                    ikon: 'fas fa-file-contract ikon-besar',
                    value : 'ke-menu-piutang',
                    status :'internal'
                },

                {
                    judul: 'Konfigurasi',
                    ikon: 'fas fa-tools ikon-besar',
                    value : 'konfigurasi',
                    status :'eksternal'
                },

                {
                    judul: 'Data Kendaraan',
                    ikon: 'fas fa-bus-alt ikon-besar',
                    value : 'm_kendaraan',
                    status :'eksternal'
                },

                {
                    judul: 'Data Supplier',
                    ikon: 'fas fa-users ikon-besar',
                    value : 'm_supplier',
                    status :'eksternal'
                },

                {
                    judul: 'Data Pelanggan',
                    ikon: 'fas fa-user-circle ikon-besar',
                    value : 'm_customer',
                    status :'eksternal'
                },
            ],

            c_untuk_kolom_item: 'block',
            c_kontainer_item: 'card kotak-hijau my-2',
            c_untuk_itemnya: 'card-body',
            text_hitam: 'text-light judul-menu',


        }
    }

})

Vue.component('menu-timbangan', {
    template: '#timbangan',
    data: function() {
        return {
            menu: [

                {
                    judul: 'Timbangan Utama',
                    ikon: 'fas fa-shopping-cart ikon-besar',
                    value : '#'
                },

                {
                    judul: 'Daftar Struk',
                    ikon: 'fas fa-file-alt ikon-besar',
                    value : '#'
                },

                {
                    judul: 'Laporan Umum',
                    ikon: 'fas fa-file ikon-besar',
                    value : '#'
                },
            ],

            c_untuk_kolom_item: 'block',
            c_kontainer_item: 'card kotak-biru my-2',
            c_untuk_itemnya: 'card-body',
            text_hitam: 'text-light judul-menu',

            status: 'terbuka',


        }
    },

    methods: {
    goBack () {
      window.history.length > 1
        ? this.$router.go(-1)
        : this.$router.push('/')
    }
  }

})

Vue.component('menu-piutang', {
    template: '#piutang',
    data: function() {
        return {
            menu: [

                {
                    judul: 'Piutang Timbangan',
                    ikon: 'fas fa-comments-dollar ikon-besar',
                    value : '#'
                },

                {
                    judul: 'COA Piutang',
                    ikon: 'fas fa-clipboard-list ikon-besar',
                    value : '#'
                },

                {
                    judul: 'Laporan Piutang',
                    ikon: 'fas fa-file-invoice ikon-besar',
                    value : '#'
                },

                {
                    judul: 'Voucher Piutang',
                    ikon: 'fas fa-ticket-alt ikon-besar',
                    value : '#'
                },
            ],

            c_untuk_kolom_item: 'block',
            c_kontainer_item: 'card kotak-merah my-2',
            c_untuk_itemnya: 'card-body',
            text_hitam: 'text-light judul-menu',


        }
    },

    methods: {
    goBack () {
      window.history.length > 1
        ? this.$router.go(-1)
        : this.$router.push('/')
    }
  }

})


// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
  { path: '/', component: 'menu-awal' },
  { path: '/ke-menu-timbangan', component: 'menu-timbangan' },
  { path: '/ke-menu-piutang', component: 'menu-piutang' }
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

var app = new Vue({
    router,
    el: '#app',
    data: {
        x:1,
        b: 'border',
        c: 'border fixed-bottom footer',
        m5: 'my-5',
        center: 'text-center my-3',
        k_item: 'card my-2',
        footer_khz: 'footer-khz',

        icon: 'fas fa-user',
        nama: 'Admin',
    }

});
</script>
