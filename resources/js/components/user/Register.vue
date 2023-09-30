<template>
  <div>
    <h2>Registrarse</h2>
    <form @submit.prevent="register">
      <input v-model="registration.name" type="text" placeholder="Nombre" />
      <input
        v-model="registration.email"
        type="email"
        placeholder="Correo electrónico"
      />
      <input
        v-model="registration.password"
        type="password"
        placeholder="Contraseña"
      />
      <button type="submit">Registrarse</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      registration: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  methods: {
    async register() {
      try {
        axios
          .post("/api/user", this.registration)
          .then((response) => {
            // La solicitud se ha realizado con éxito
            console.log("Usuario registrado:", response.data);
            this.$router.push({ name: "login" });
          })
          .catch((error) => {
            // Se ha producido un error en la solicitud
            console.error("Error al registrar usuario:", error);
            // Puedes manejar el error aquí
          });
      } catch (error) {
        console.error("Error al registrarse:", error);
      }
    },
  },
};
</script>
