<template>
  <div class="login">
    
    <h2>🖐</h2>
    <h2 class="text-black">BarNaMão</h2>
    <input type="text" v-model="username" placeholder="Username" />
    <br>
    <input type="password" v-model="password" placeholder="Password" />
    <br>
    <button class="btn btn-primary btn-block" @click="login">Login</button>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      username: '',
      password: ''
    }
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('https://your-api-url.com/auth/login', {
          username: this.username,
          password: this.password
        });

        if (response.data.success) {
          const token = response.data.token;
          // Armazene o token em algum lugar seguro, como o armazenamento local
          localStorage.setItem('jwtToken', token);
          // Redirecione o usuário para a página inicial ou painel
          this.$router.push('/home');
        } else {
          console.log('Falha no login: ', response.data.message);
        }
      } catch (error) {
        console.error('Erro ao fazer login: ', error);
      }
    }
  }
}
</script>


<style scoped>
.login {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  background: url('assets/wallpaperLogin.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
