<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h1 class="text-center">{{ blog.title }}</h1>
                    </div>
                    <div class="card-body">
                        <pre style="white-space: pre-wrap;">{{ blog.content }}</pre>
                    </div>
                </div>
               
                
            </div>
        </div>
        
    </div>
</template>


<script>
export default {
   name: "detalle-blog",
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