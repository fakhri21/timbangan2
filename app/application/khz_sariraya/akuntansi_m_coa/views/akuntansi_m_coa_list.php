<!doctype html>
<div id="app">
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
</div>
<script>
var base_url="<?php echo base_url() ?>"
</script>

<script type="text/x-template" id="home">
<div>
<router-link :to="'tambah'" style="text-decoration: none;">
    <b-button varian="primary" size="sm"  class="mr-1">
        <i class="fa fa-plus" aria-hidden="true"></i> Tambah Baru
    </b-button>
</router-link>
    <b-form-input v-model="keyword" placeholder="Pencarian"></b-form-input>
      <b-table
        class="table table-striped table-inverse table-responsive"
        id="my-table"
        show-empty
        :items="items"
        :filter="keyword"
        :fields="fields"
        :current-page="currentPage"
        :per-page="perPage"
        @filtered="onFiltered"
        
        >
        <div slot="actions" slot-scope="row">
            <router-link :to="'ubah'" style="text-decoration: none;">
                <b-button varian="success" size="sm" @click="update(row.item.uniqid, row.item.qty, row.item.options.keterangan)" class="mr-1">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Ubah
                </b-button>
            </router-link>
            <router-link :to="'lihat'" style="text-decoration: none;">
                <b-button varian="warning" size="sm" @click="read(row.item.uniqid)" class="mr-1">
                    <i class="fa fa-eye" aria-hidden="true"></i> Lihat
                </b-button>
            </router-link>
          <b-button varian="danger" size="sm" @click="deleteitem(row.item.rowid)">
            <i class="fa fa-trash" aria-hidden="true"></i> Hapus
          </b-button>
        </div>
      </b-table>
    <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        class="my-0"
        aria-controls="my-table"
        >
    </b-pagination>          
</div>
</script>

<script>
Vue.component('menu-awal', {
    template: '#home',
    data: function() {
        return {
            rows: 1,
            currentPage: 1,
            perPage: 5,
            pageOptions: [5, 10, 15],
            keyword: "",
            items: [],
            fields: [
                { key: "id_coa", label: "id_coa", sortable: true },
{ key: "id_kelompok_coa", label: "id_kelompok_coa", sortable: true },
{ key: "id_kategori", label: "id_kategori", sortable: true },
{ key: "nama_coa", label: "nama_coa", sortable: true },
{ key: "uniqid_sub", label: "uniqid_sub", sortable: true },
{ key: "saldo_awal", label: "saldo_awal", sortable: true },
{ key: "saldo_normal_special", label: "saldo_normal_special", sortable: true },
{ key: "quantity", label: "quantity", sortable: true },
                { key: "actions", label: "Aksi", sortable: true },
                
            ]
        }
    },
    methods: {
        onFiltered(filteredItems) {
            this.rows = filteredItems.length
            this.currentPage = 1
          }
    },
    created: function () {
        var _this = this;
        $.getJSON("akuntansi_m_coa/json", function (json) {
            _this.items = json.data;
            _this.rows = json.total_rows;
        });
    }

})
</script>

<script type="text/x-template" id="form">
<div>
    <div class="mt-2 mb-2">
           <h3 class="text-center">Akuntansi_m_coa</h3>
    </div>
	    <b-form-group>
            <label for="varchar">Id Coa <?php echo form_error('form.id_coa') ?></label>
            <b-form-input required v-model="form.id_coa"  type="text" class="form-control" name="form.id_coa" id="form.id_coa" placeholder="Id Coa"  />
            </b-form-group>
	    <b-form-group>
            <label for="char">Id Kelompok Coa <?php echo form_error('form.id_kelompok_coa') ?></label>
            <b-form-input required v-model="form.id_kelompok_coa"  type="text" class="form-control" name="form.id_kelompok_coa" id="form.id_kelompok_coa" placeholder="Id Kelompok Coa"  />
            </b-form-group>
	    <b-form-group>
            <label for="varchar">Id Kategori <?php echo form_error('form.id_kategori') ?></label>
            <b-form-input required v-model="form.id_kategori"  type="text" class="form-control" name="form.id_kategori" id="form.id_kategori" placeholder="Id Kategori"  />
            </b-form-group>
	    <b-form-group>
            <label for="varchar">Nama Coa <?php echo form_error('form.nama_coa') ?></label>
            <b-form-input required v-model="form.nama_coa"  type="text" class="form-control" name="form.nama_coa" id="form.nama_coa" placeholder="Nama Coa"  />
            </b-form-group>
	    <b-form-group>
            <label for="varchar">Uniqid Sub <?php echo form_error('form.uniqid_sub') ?></label>
            <b-form-input required v-model="form.uniqid_sub"  type="text" class="form-control" name="form.uniqid_sub" id="form.uniqid_sub" placeholder="Uniqid Sub"  />
            </b-form-group>
	    <b-form-group>
            <label for="decimal">Saldo Awal <?php echo form_error('form.saldo_awal') ?></label>
            <b-form-input required v-model="form.saldo_awal"  type="text" class="form-control" name="form.saldo_awal" id="form.saldo_awal" placeholder="Saldo Awal"  />
            </b-form-group>
	    <b-form-group>
            <label for="varchar">Saldo Normal Special <?php echo form_error('form.saldo_normal_special') ?></label>
            <b-form-input required v-model="form.saldo_normal_special"  type="text" class="form-control" name="form.saldo_normal_special" id="form.saldo_normal_special" placeholder="Saldo Normal Special"  />
            </b-form-group>
	    <b-form-group>
            <label for="decimal">Quantity <?php echo form_error('form.quantity') ?></label>
            <b-form-input required v-model="form.quantity"  type="text" class="form-control" name="form.quantity" id="form.quantity" placeholder="Quantity"  />
            </b-form-group>
	    <button @click="simpan" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $button ?></button> 

</div>
</script>

<script>
Vue.component('form-item', {
    template: '#form',
    data: function() {
        return { 
            uniqid:"",
            form :
            {
                id_coa:"",
            
                id_kelompok_coa:"",
            
                id_kategori:"",
            
                nama_coa:"",
            
                uniqid_sub:"",
            
                saldo_awal:"",
            
                saldo_normal_special:"",
            
                quantity:"",
            }    
        }
    },

    methods: {
        simpan() {
            var _this=this;
            $.post("akuntansi_m_coa/create_action",_this.form,function(){
                alertify.success("Berhasil")
            })
          }

  }

})

const routes = [
  { path: '/', component: 'menu-awal' },
  { path: '/tambah', component: 'form-item' },
  { path: '/lihat', component: 'form-item' },
  { path: '/ubah', component: 'form-item' }
]

const router = new VueRouter({
  routes 
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