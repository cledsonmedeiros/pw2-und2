<template>
  <div class="container" id="app">

    <form>
      <label>N1</label>
      <input type="text" v-model="n1">
      <label>N2</label>
      <input type="text" v-model="n2">
    </form>

    <div>Média: {{ media }}</div>

    <br><br>

    <nav>
      <router-link to="/cadastro">Cadastro</router-link>
      <router-link to="/">Listagem</router-link>
    </nav>

    <div class="mt-6">
      <router-view />
    </div>

  </div>
</template>

<script>
//import HelloWorld from './components/HelloWorld.vue'
import axios from "axios";

export default {
  name: "app",
  data: function() {
    return {
      n1: "",
      n2: ""
    };
  },
  methods: {},
  computed: {
    media: function() {
      return (Number(this.n1) + Number(this.n2)) / 2;
    }
  }
};
</script>

<style>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
