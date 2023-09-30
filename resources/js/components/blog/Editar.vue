<template>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar blog</h4>
                </div>

                <div class="card-body">
                    <form @submit.prevent="actualizar">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" v-model="blog.title">
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                 <div class="form-floating">
                                    <textarea class="form-control" cols="30" rows="10" v-model="blog.content"></textarea>
                                    <label>Contenido</label>
                                </div>
                            </div>

                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-success">Editar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
   name: "editar-blog",
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
   data(){
    return{
        blog:{
            title:"",
            content:""
        }
    }
   },
   mounted(){
    this.mostrarBlog();
   },
   methods:{
    async mostrarBlog(){
        this.axios.get(`/api/blog/${this.$route.params.id}`).then(
            response=>{
                const {title, content} = response.data
                this.blog.title = title,
                this.blog.content = content
            }
        ).catch(error=>{
            console.log(error);
        })
    },
    async actualizar(){
        this.blog.user_id = this.info.user_id;
        this.axios.put(`/api/blog/${this.$route.params.id}`, this.blog).then(response=>{
            this.$router.push({
                name: "mostrarBlogs"
            })
        }).catch(error=>{
            console.log(error);
        })
    }
   }

}
</script>