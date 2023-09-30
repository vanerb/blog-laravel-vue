const Home = () => import('./components/Home.vue')
const Contacto = () => import('./components/Contacto.vue')


const Mostrar = () => import('./components/blog/Mostrar.vue')
const Editar = () => import('./components/blog/Editar.vue')
const Crear = () => import('./components/blog/Crear.vue')
const Login = () => import('./components/user/Login.vue')
const Register = () => import('./components/user/Register.vue')
const Logout = () => import('./components/user/Logout.vue')


export const routes = [
    {
        name:'home',
        path: '/',
        component: Home
    },
    {
        name:'contacto',
        path: '/contacto',
        component: Contacto
    },
    {
        name:'mostrarBlogs',
        path: '/blogs',
        component: Mostrar,
        beforeEnter: (to, from, next) => {
            // Verifica si el usuario está autenticado antes de acceder a la ruta Crear
            if (sessionStorage.getItem('user')) {
              next(); // El usuario está autenticado, continúa
            } else {
              next('/login'); // El usuario no está autenticado, redirige a la página de inicio de sesión
            }
        }
    },
    {
        name: 'crearBlog',
        path: '/crear',
        component: Crear,
        beforeEnter: (to, from, next) => {
          // Verifica si el usuario está autenticado antes de acceder a la ruta Crear
          if (sessionStorage.getItem('user')) {
            next(); // El usuario está autenticado, continúa
          } else {
            next('/login'); // El usuario no está autenticado, redirige a la página de inicio de sesión
          }
        }
      },
      {
        name: 'editarBlog',
        path: '/editar/:id',
        component: Editar,
        beforeEnter: (to, from, next) => {
          // Verifica si el usuario está autenticado antes de acceder a la ruta Editar
          if (sessionStorage.getItem('user')) {
            next(); // El usuario está autenticado, continúa
          } else {
            next('/login'); // El usuario no está autenticado, redirige a la página de inicio de sesión
          }
        }
     }
     ,{
        name:'login',
        path: '/login',
        component: Login
     },
     {
        name:'register',
        path: '/register',
        component: Register
     },
     {
        name:'logout',
        path: '/logout',
        component: Logout
     }

]