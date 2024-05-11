<template>
  <nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <a class="navbar-brand text-white" href="#">BarNaMão 🍻</a>
    <button class="navbar-toggler" type="button" @click="isCollapsed = !isCollapsed">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" :class="{ show: !isCollapsed }">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Cardápio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#cart">Carrinho</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Pedidos</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
</template>

<script>
export default {
  data() {
    return {
      isCollapsed: true
    }
  }
}
</script>
