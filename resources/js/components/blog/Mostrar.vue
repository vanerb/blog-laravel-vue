<template>
<div class="container">
     <div class="row">
    <div class="col-md-12 mb-4">
      <router-link :to="{ name: 'crearBlog' }" class="btn btn-success"
        >Nuevo</router-link
      >
    </div>

    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-striped table-dark">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Titulo</th>
              <th>Contenido</th>
              <th colspan="2" class="text-center">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="blog in blogs" :key="blog.id">
              <td>{{ blog.id }}</td>
              <td>{{ blog.title }}</td>
              <td>{{ blog.content }}</td>
              <td>
                <router-link
                  :to="{ name: 'editarBlog', params: { id: blog.id } }"
                  class="btn btn-success"
                  >Editar</router-link
                >
              </td>
              <td>
                <a
                  type="button"
                  @click="borrarBlog(blog.id)"
                  class="btn btn-danger"
                  >Eliminar</a
                >
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
 
</template>
<script>
export default {
  name: "blogs",
  computed:{
    info() {
      // Obtener la cadena JSON de sessionStorage
      const userData = sessionStorage.getItem("user");

      // Parsear la cadena JSON en un objeto JavaScript
      const userObject = JSON.parse(userData);

      // Acceder a las propiedades del objeto
      return userObject;
    }
   },
  data() {
    return {
      blogs: [],
    };
  },
  mounted() {
    this.mostrarBlogs();
  },
  methods: {
    async mostrarBlogs(){
            await this.axios.get('/api/blog', {params: { user_id: this.info.user_id }}).then(response=>{
                this.blogs = response.data
            }).catch(error=>{
                console.log(error)
                this.blogs = []
            })
    },

    borrarBlog(id) {
      if (confirm("¿Confirma eliminar el registro?")) {
        this.axios
          .delete(`/api/blog/${id}`)
          .then((response) => {
            this.mostrarBlogs()
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
};
</script>