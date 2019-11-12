
export default {
  mode: 'spa',
  /*
  ** Headers of the page
  */
  head: {
    title: 'Family Cooking',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  /*
   * Global Middleware
   */
  router: {
    middleware: 'auth'
  },
  /*
  ** Customize the progress-bar color
  */
  // loading: { color: '#00D1B2', height: '5px', continuous: true },
  loading: '~/components/Loading.vue',
  /*
  ** Global CSS
  */
  css: [
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/axios.js',
    '~/plugins/filters.js',
    '~/plugins/vuelidate.js',
    { src: '~/plugins/vueNoty.js', ssr: false }
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    // Doc: https://github.com/nuxt-community/nuxt-tailwindcss
    '@nuxtjs/tailwindcss',
    '@nuxtjs/moment'
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    '@nuxtjs/axios',
    ['cookie-universal-nuxt', { alias: 'cookie' }],
    'nuxt-purgecss'
  ],
  axios: {
    baseURL: 'http://0.0.0.0:8000' // See https://github.com/nuxt-community/axios-module#options
  },
  moment: {
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    postcss: {
      plugins: {
        tailwindcss: './tailwind.config.js'
      }
    },
    extend (config, ctx) {
      /*
      if (ctx.isDev && ctx.isClient) {
        config.module.rules.push({
          enforce: 'pre',
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          exclude: /(node_modules)/,
          options: {
            fix: true
          }
        })
      }
      */
    }
  },
  transition: {
    name: 'fade',
    mode: 'out-in'
  },
  server: {
    port: 3000, // default: 3000
    host: '0.0.0.0' // default: localhost,
    // timing: false
  },
  env: {
    baseURL: 'http://0.0.0.0:80'
  }
}
