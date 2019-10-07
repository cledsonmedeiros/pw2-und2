<template>
	<div>
		<h1>{{ titulo }}</h1>
		
		<ul class="list-group">
			<!-- item da lista -->

			<li v-for="(item, index) in lista" class="list-group-item" :key="item.id"
			v-bind:class="{ concluido: item.isConcluido }"
			>{{ item.tarefa }} 

			<button @click="excluir(item.id)" type="button" class="close" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>

			<span class="float-right"><input type="checkbox" v-model="item.isConcluido" @click="concluido({ id: item.id, isConcluido: !item.isConcluido?1:0 })"></span>

			</li>
		</ul><!-- .list-group -->
	</div>
</template>

<script>
export default {
  name: 'Listagem',
  props: {
  	lista: Array,
  	titulo: String
  },
  methods: {
  	excluir:function(index) {
  		this.$emit('destruir',index);
  	},
  	concluido: function(obj) {
  		this.$emit('concluido',obj);
  	}
  }
}
</script>

<style scoped>
.concluido {
	color: #ccc;
	text-decoration: line-through;
}
</style>