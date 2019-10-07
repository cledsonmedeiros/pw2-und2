<template>

  <div class="row mt-5">
    <div class="col-12">
      <Listagem titulo="Lista de Tarefas" v-bind:lista="tarefas" @destruir="excluirTarefa" @concluido="concluido"></Listagem>
    </div>
  </div>

</template>

<script>
import Listagem from "../components/Listagem.vue";
import axios from "axios";

export default {
  name: "ListagemView",
  components: {
    Listagem
  },
  data: function() {
    return {
      tarefas: []
    };
  },
  created: function() {
    this.atualizarLista();
  },
  methods: {
    excluirTarefa: function(index) {
      var _this = this;
      axios
        .delete("http://eyglys.com.br/apitodo/todo/delete?id=" + index)
        .then(function(resposta) {
          _this.atualizarLista();
        });
    },

    atualizarLista: function() {
      var _this = this;
      axios
        .get("http://eyglys.com.br/apitodo/todo?per-page=100")
        .then(function(resposta) {
          _this.tarefas = resposta.data.map(function(obj) {
            return { tarefa: obj.todo, isConcluido: obj.finished, id: obj.id };
          });
        });
    },

    concluido: function(obj) {
      var _this = this;
      axios
        .put("http://eyglys.com.br/apitodo/todo/update?id=" + obj.id, {
          finished: obj.isConcluido
        })
        .then(function(response) {
          _this.atualizarLista();
        });
    }
  }
};
</script>
