<template>
    <!-- Navbar -->
    <NavbarComponent/>
    <!-- Cart -->
    <div class="container mt-5">
      <h2>Carrinho de Compras</h2>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12" v-for="(item, index) in cart" :key="item.id">
          <div class="card">
            <img :src="item.image" class="card-img-top" alt="Image">
            <div class="card-body">
              <h5 class="card-title">{{ item.name }}</h5>
              <p class="card-text">
                {{ item.description }}
              </p>
              <p class="card-text">
                Preço: {{ item.price }}
              </p>
              <button @click="removeFromCart(index)" class="btn btn-danger">Remover do carrinho</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h4>Total: {{ total }}</h4>
          <button @click="checkout" class="btn btn-success">Finalizar Compra</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import NavbarComponent from '@/components/NavbarComponent.vue'
  
  export default {
    name: 'ShoppingCart',
    components: {
      NavbarComponent
    },
    data() {
      return {
        cart: [
          // seus itens de carrinho aqui
        ]
      }
    },
    computed: {
      total() {
        return this.cart.reduce((total, item) => total + item.price, 0);
      }
    },
    methods: {
      removeFromCart(index) {
        this.cart.splice(index, 1);
        console.log('Item removido do carrinho:', index);
      },
      checkout() {
        // sua lógica de finalização de compra aqui
        console.log('Finalizando compra:', this.cart);
      }
    }
  }
  </script>
  