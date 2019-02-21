<template>
  <div :class="'img'+ data.id">
    <div class="col-xs-6 col-sm-4 col-md-3">
      <div class="thumbnail">
        <div class="img-container">
          <img v-if="data.url_gambar" :src="'public/images/produk/' + data.url_gambar" :alt="'gambar ' + data.nama">
          <p class="no-image" v-if="data.url_gambar == null">No Image</p>
        </div>
        <div class="caption">
          <h4 class="c_nama"><b>{{ data.nama }}</b></h4>
          <p class="c_harga">Rp {{ data.harga | number_formatter }}</p>
          <p class="c_supplier">Supplier <a>{{ data.nama_supplier }}</a></p>
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
    -webkit-box-shadow: 0px 1px 4px 0px rgba(0,0,0,0.25);
    -moz-box-shadow: 0px 1px 4px 0px rgba(0,0,0,0.25);
    box-shadow: 0px 1px 4px 0px rgba(0,0,0,0.25);
    transition: box-shadow 0.15s ease-in-out;
    padding: 0;
  }
  
  .thumbnail:hover {
    -webkit-box-shadow: 0px 8px 14px 0px rgba(0,0,0,0.15);
    -moz-box-shadow: 0px 8px 14px 0px rgba(0,0,0,0.15);
    box-shadow: 0px 8px 14px 0px rgba(0,0,0,0.15);
    transition: box-shadow 0.15s ease-in-out;
  }

  .img-container {
    height: 148px;
    background: #dcdcdc;
    margin: 0 auto;
    overflow: hidden;
  }
  
  
  .thumbnail .img-container > img {
    width: auto;
    height: auto;
    max-width: none;
    max-height: none;
    display: block;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    zoom:0.8;
  }
  
  .c_harga {
    color: E94F37;
  }

  .c_supplier {
    font-size: 12px;
  }

  .no-image {
    color: #a5a5a5;
    text-align: center;
    margin-top: 65px;
  }
</style>