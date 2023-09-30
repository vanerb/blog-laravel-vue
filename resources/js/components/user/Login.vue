<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center">Iniciar Sesión</h2>
      </div>
      <div class="card-body">
        <form @submit.prevent="login">
          <input
            v-model="credentials.email"
            type="email"
            placeholder="Correo electrónico"
          />
          <input
            v-model="credentials.password"
            type="password"
            placeholder="Contraseña"
          />
          <button class="btn btn-success" type="submit">Iniciar Sesión</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      credentials: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    async login() {
      try {
        axios
          .post("/api/login", this.credentials)
          .then((response) => {
            // La solicitud se ha realizado con éxito
            console.log("Usuario logueado:", response.data);
            sessionStorage.setItem("user", JSON.stringify(response.data));
            window.location.reload();
            this.$router.push({ name: "mostrarBlogs" });
          })
          .catch((error) => {
            // Se ha producido un error en la solicitud
            console.error("Error al registrar usuario:", error);
            // Puedes manejar el error aquí
          });
      } catch (error) {
        console.error("Error al iniciar sesión:", error);
      }
    },
  },
};
</script>
