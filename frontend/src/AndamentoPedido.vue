<template>
    <!-- Navbar -->
    <NavbarComponent/>
    <div class="order-tracking">
      <h2 class="text-white">Acompanhamento do Pedido</h2>
      <div v-if="loading">
        Carregando...
      </div>
      <div v-else>
        <div v-for="order in orders" :key="order.id" class="order">
          <h3>Pedido #{{ order.id }}</h3>
          <p>Status: {{ order.status }}</p>
          <ul>
            <li v-for="item in order.items" :key="item.id">
              {{ item.quantity }}x {{ item.product.name }} - {{ currency(item.product.price) }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import NavbarComponent from '@/components/NavbarComponent.vue'

  export default {
    components: {
      NavbarComponent
    },
    data() {
      return {
        loading: true,
        orders: [],
      };
    },
    methods: {
      currency(value) {
        return `R$ ${value.toFixed(2)}`;
      },
    },
    async created() {
      try {
        const response = await axios.get('/api/orders');
        this.orders = response.data;
      } catch (error) {
        console.error(error);
      } finally {
        this.loading = false;
      }
    },
  };
  </script>
  
  <style scoped>
  .order-tracking {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  background: url('assets/wallpaperAcompanhamento.gif') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
  .order {
    border: 1px solid #ccc;
    margin-bottom: 1em;
    padding: 1em;
  }
  </style>
  