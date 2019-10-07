import Vue from 'vue'
import Router from 'vue-router'
import ListagemView from './views/ListagemView.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'listagem',
      component: ListagemView
    },
    {
      path: '/cadastro',
      name: 'cadastro',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/CadastroView.vue')
    }
  ]
})
