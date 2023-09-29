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