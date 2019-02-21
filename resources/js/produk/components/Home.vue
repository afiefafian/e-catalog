<template>
  <div class="f_home">
    <div v-if="retrieve_data">
      <div v-if="get.data.length > 0">
        <thumbnail v-for="row in get.data" :key="row.id" v-bind:data="row"></thumbnail>
      </div>

      <div class="row">
          <div class="col-md-12">
            <nav aria-label="Page navigation" class="pull-right">
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
    </div>
    
    
  </div>
</template>
<script>
  import Thumbnail from './Thumbnail.vue';

  export default {
    data () {
      return {
        retrieve_data: false,
        loading: false,
        get: null
      };
    },
    created () {
      this.fetchData()
    },
    methods: {
      fetchData () {
        this.loading = true;
        
        axios
        .get('/api/get_list_product')
        .then(response => {
          this.retrieve_data = true;
          this.get = response.data;
        })
        .catch(error => {
          console.log(error)
        })
        .finally(() => this.loading = false)
        
      }
    },
    components: {
      'thumbnail': Thumbnail
    },
  };
</script>

<style>
</style>
