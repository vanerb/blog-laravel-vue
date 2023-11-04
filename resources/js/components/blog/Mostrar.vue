<template>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12 mb-4">
                <router-link :to="{ name: 'crearBlog' }" class="btn btn-success"
                    >Nuevo</router-link
                >
            </div>

            <div class="col-md-12">
                <div class="card" v-for="blog in blogs" :key="blog.id">
                    <div class="card-header">
                        <h1>{{ blog.title }}</h1>
                    </div>
                    <div
                        class="card-body"
                        style="
                            overflow: hidden;
                            text-overflow: ellipsis;
                            white-space: nowrap;
                        "
                    >
                        {{ blog.content }}
                    </div>
                    <div class="card-footer">
                        <router-link
                            :to="{
                                name: 'detalleBlog',
                                params: { id: blog.id },
                            }"
                            class="btn btn-primary"
                            >Ver más</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "blogs",
    computed: {
        info() {
            // Obtener la cadena JSON de sessionStorage
            const userData = sessionStorage.getItem("user");

            // Parsear la cadena JSON en un objeto JavaScript
            const userObject = JSON.parse(userData);

            // Acceder a las propiedades del objeto
            return userObject;
        },
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
        async mostrarBlogs() {
            await this.axios
                .get("/api/blog", { params: { user_id: this.info.user_id } })
                .then((response) => {
                    this.blogs = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.blogs = [];
                });
        },

        borrarBlog(id) {
            if (confirm("¿Confirma eliminar el registro?")) {
                this.axios
                    .delete(`/api/blog/${id}`)
                    .then((response) => {
                        this.mostrarBlogs();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
