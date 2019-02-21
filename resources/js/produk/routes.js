import Home from './components/Home.vue';
import Detail from './components/DetailProduk.vue';

export const routes = [
    { path: '/produk', component: Home, name: 'Home' },
    { path: '/produk/detail', component: Detail, name: 'Detail' }
];