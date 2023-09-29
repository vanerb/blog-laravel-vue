<template>
<main>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Vanerb</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <router-link exact-active-class="active" to="/" class="nav-link" aria-current="page">Inicio</router-link>
      </li>
      <li class="nav-item">
         <router-link exact-active-class="active" to="/blogs" class="nav-link" aria-current="page">Blogs</router-link>
      </li>
      <li class="nav-item">
         <router-link exact-active-class="active" to="/contacto" class="nav-link" aria-current="page">Contacto</router-link>
      </li>
    </ul>
   
  </div>
  </nav>


  <div>
    <router-view></router-view>
  </div>
</main>
  
</template>