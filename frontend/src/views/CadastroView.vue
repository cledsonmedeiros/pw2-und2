<template>
  <div class="row justify-content-md-center">
    <div class="col-md-5 col-12 ">

      <Formulario @cadastrar="cadastro" titulo="Cadastro de tarefas">
        <template v-slot:header>
          <h1>Cadastro de tarefas 2</h1>
          <h6>Digite o nome da tarefa</h6>
        </template>

        <template v-slot:footer>
          <hr />
        </template>
      </Formulario>

    </div>
  </div>
</template>

<script>
import Formulario from "../components/Formulario.vue";

export default {
  name: "CadastroView",
  components: {
    Formulario
  },
  methods: {
    cadastro: function(paramTarefa) {
      var _this = this;
      axios
        .put("http://eyglys.com.br/apitodo/todo/create", {
          todo: paramTarefa
        })
        .then(function(resposta) {
          // _this.atualizarLista();
          _this.$router.push('/');
        });
    }
  }
};
</script>
