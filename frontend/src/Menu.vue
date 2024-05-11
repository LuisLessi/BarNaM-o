<template>
  <div id="app">
    <!-- Navbar -->
   <NavbarComponent/>
    <!-- Menu -->
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12" v-for="item in menu" :key="item.id">
          <div class="card mb-3">
            <img :src="item.image" class="card-img-top" alt="Image">
            <div class="card-body">
              <h5 class="card-title">{{ item.name }}</h5>
              <p class="card-text">
                {{ item.description }}
              </p>
              <p class="card-text">
                Preço: {{ item.price }}
              </p>
              <button @click="addToCart(item)" class="btn btn-primary mb-2">Adicionar ao 🛒</button>
              <br>
              <button @click="removeFromCart(item)" class="btn btn-danger">Remover do 🛒</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Carrinho -->
    <hr id="cart" style="height:20px; background-color:blue;">

    <div class="container mt-5">
      <h2>Carrinho 🛒</h2>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12" v-for="item in cart" :key="item.id">
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
              <button @click="removeFromCart(item)" class="btn btn-danger">Remover do carrinho</button>
            </div>
          </div>
        </div>
      </div>
      <button @click="submitOrder" class="btn btn-success mt-3">Enviar pedido</button>
    </div>
  </div>
</template>

<script>
import NavbarComponent from '@/components/NavbarComponent.vue'

export default {
  name: 'App',
  components: {
    NavbarComponent
  },

  data() {
    return {
      menu: [
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },
        { id: 1, name: 'Item 1', description: 'Descrição do Item 1', price: 10, image: 'https://www.cariucho.com.br/wp-content/uploads/2023/09/espetinho-que-nao-fica-seco-e-duro.jpg' },

      ],
      cart: []
    }
  },
  methods: {
    addToCart(item) {
      this.cart.push(item);
      console.log('Item adicionado ao carrinho:', item);
    },
    removeFromCart(item) {
      const index = this.cart.indexOf(item);
      if (index > -1) {
        this.cart.splice(index, 1);
        console.log('Item removido do carrinho:', item);
      }
    },
    submitOrder() {
      // Aqui você pode adicionar a lógica para enviar o pedido ao backend
      console.log('Pedido enviado:', this.cart);
      this.cart = []; // Limpar o carrinho após o envio do pedido
    }
  }
}
</script>

<style>
.app {
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
</style>
