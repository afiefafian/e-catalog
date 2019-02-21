<template>
  <div class="f_home">
    <div v-if="retrieve_data">
      <div v-if="get.data.length > 0">
        <thumbnail v-for="row in get.data" :key="row.id" v-bind:data="row"></thumbnail>
      </div>
      
      <div class="row" v-if="get.data.length > 0">
        <div class="col-md-12">
          <nav aria-label="Page navigation" class="pull-right">
            <ul class="pagination">
              <li class="previous" :class="{ disabled : get.prev_page_url == null }">
                <a aria-label="Previous" @click="changePage(get.current_page - 1)">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li v-for="n in get.last_page" :key="n" :class="{ active : n == get.current_page }">
                <a @click="changePage(n)">{{ n }}</a>
              </li>
              <li class="next" :class="{ disabled : get.next_page_url == null }">
                <a aria-label="Next" @click="changePage(get.current_page + 1)">
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
      if (this.$route.query.page) {
        var page = this.$route.query.page;
      }
      this.fetchData(page)
    }, 
    watch: {
      '$route' (to, from) {
        var page = this.$route.query.page;
        this.fetchData(page)
      }
    },
    methods: {
      fetchData (page) {
        this.loading = true;
        axios
        .get('/api/get_list_product', {
          params: {
            page: page
          }
        })
        .then(response => {
          this.retrieve_data = true;
          this.get = response.data;
        })
        .catch(error => {
          console.log(error)
        })
        .finally(() => this.loading = false);
      },
      changePage (page) {
          if (page != 0 && page != this.get.last_page + 1) {
            this.$router.push({ path: '/produk', query: { page: page } })
          }
      }
    },
    components: {
      'thumbnail': Thumbnail
    },
  };
</script>

<style>
</style>
