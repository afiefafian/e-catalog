<template>
  <div :class="'img'+ data.id">
    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="thumbnail">
        <img :src="'public/images/produk/' + data.url_gambar" :alt="'gambar ' + data.nama">
        <div class="caption">
          <h4><b>{{ data.nama }}</b></h4>
          <p class="">Rp {{ data.harga | number_formatter }}</p>
          <p>Supplier <router-link to="/produk/detail"><a>{{ data.nama_supplier }}</a></router-link></p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['data']
  };
</script>
<style scoped>
  .thumbnail {
    height: 262px;
    border-radius: 2px;
    border: none;
    -webkit-box-shadow: 1px 1px 12px 1px rgba(0,0,0,0.44);
    -moz-box-shadow: 1px 1px 12px 1px rgba(0,0,0,0.44);
    box-shadow: 1px 1px 12px 1px rgba(0,0,0,0.44);
    padding: 0;

  }
  .thumbnail > img, 
  .thumbnail a > img {
    height: 140px;
  }
  .thumbnail .caption {
    padding: 6px 9px;
  }
</style>