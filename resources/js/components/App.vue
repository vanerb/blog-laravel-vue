<template>
  <main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">Vanerb</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link
              exact-active-class="active"
              to="/"
              class="nav-link"
              aria-current="page"
              >Inicio</router-link
            >
          </li>
          <li class="nav-item">
            <router-link
              exact-active-class="active"
              to="/blogs"
              class="nav-link"
              aria-current="page"
              >Blogs</router-link
            >
          </li>
          <li class="nav-item">
            <router-link
              exact-active-class="active"
              to="/contacto"
              class="nav-link"
              aria-current="page"
              >Contacto</router-link
            >
          </li>
        </ul>

        <!-- Botones de autenticación -->

        <ul class="navbar-nav float-end mr-2">
          <li v-if="!isLoggedIn" class="nav-item">
            <a class="nav-link btn btn-link" @click="redirectToLogin"
              >Iniciar Sesión</a
            >
          </li>
          <li v-if="!isLoggedIn" class="nav-item">
            <a class="nav-link btn btn-link" @click="redirectToRegister"
              >Registrarse</a
            >
          </li>
          
           <li v-if="isLoggedIn">
            <a class="nav-link btn btn-link" href="/adminblog"> Administrar</a>
            
          </li>
          <li v-if="isLoggedIn">
            <a class="nav-link btn btn-link" href="/"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg> {{ info.user.name }}</a>
            
          </li>
          <li v-if="isLoggedIn" class="nav-item">
            <a class="nav-link btn btn-link" @click="logout">Cerrar Sesión</a>

          </li>

          
        </ul>
      </div>
    </nav>

    <div>
      <router-view></router-view>
    </div>
  </main>
</template>

<script>
export default {
  computed: {
    isLoggedIn() {
      // Puedes utilizar alguna lógica para determinar si el usuario está autenticado
      // Por ejemplo, comprobar si existe una variable de usuario en el almacenamiento local
      return sessionStorage.getItem("user") !== null;
    },

    info() {
      // Obtener la cadena JSON de sessionStorage
      const userData = sessionStorage.getItem("user");

      // Parsear la cadena JSON en un objeto JavaScript
      const userObject = JSON.parse(userData);

      // Acceder a las propiedades del objeto
      return userObject;
    },
  },
  methods: {
    redirectToLogin() {
      // Redirige al usuario a la página de inicio de sesión
      this.$router.push("/login");
    },
    redirectToRegister() {
      // Redirige al usuario a la página de registro
      this.$router.push("/register");
    },
    logout() {
      // Realiza la lógica de cierre de sesión aquí
      // Puede incluir una llamada a la API para cerrar la sesión en el servidor
      // Y luego eliminar la información de autenticación del almacenamiento local
      sessionStorage.removeItem("user");
      // Redirige al usuario a la página de inicio
      window.location.reload();
      this.$router.push("/login");
    },
  },
};
</script>