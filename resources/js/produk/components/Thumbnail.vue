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
    height: 240px;
    border-radius: 3px;
    border: 1px solid #dddddd;
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
  
  .caption {
    position: relative;
    height: 92px;
  }
  .c_nama {
    margin: 0;
    font-size: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    max-width: 97%;
    height: 60px;
  }

  .c_harga {
    position: absolute;
    bottom: 19px;
    color: #E94F37;
    font-weight: 700;
  }

  .c_supplier {
    position: absolute;
    bottom: 0;
    font-size: 11px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 97%;
    display: inline-block;
  }

  .no-image {
    color: #a5a5a5;
    text-align: center;
    margin-top: 65px;
  }

</style>