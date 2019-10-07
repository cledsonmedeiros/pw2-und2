<template>
	<div>
		<!--<h1>{{ titulo }}</h1>-->
    <slot name="header">
      <h1>Um título qualquer</h1>
    </slot>

		<form class="form-inline text-center" @submit.prevent="submit" >
			<input type="text" name="tarefa" class="form-control mr-2" placeholder="Tarefa" v-model="form">

			<input type="submit" value="OK" class="btn btn-primary">
		</form>

    <slot name="footer"></slot>
	</div>
</template>

<script>
export default {
  name: 'Formulario',
  props: {
    titulo: String,
  },
  data: function() {
    return {
      form: ''
    };
  },
  methods: {
    submit:function() {
      if (this.form != '') {
        this.$emit('cadastrar',this.form);
        this.form = '';
      }
    }
  }
}
</script>

<style>
	
</style>