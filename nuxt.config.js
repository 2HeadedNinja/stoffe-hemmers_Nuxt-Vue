export default {
  mode: 'universal',
  /*
   ** Headers of the page
   */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: process.env.npm_package_description || ''
      }
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }]
  },
  /*
   ** Customize the progress-bar color
   */
  loading: { color: '#fff' },
  /*
   ** Global CSS
   */
  css: [
    '@/assets/css/build.min.css'
  ],
  /*
   ** Plugins to load before mounting the App
   */
  plugins: [
    { ssr: false, src: '~/plugins/noframework.waypoints.js'}
  ],
  /*
   ** Nuxt.js dev-modules
   */
  buildModules: [
    // Doc: https://github.com/nuxt-community/eslint-module
  ],
  /*
   ** Nuxt.js modules
   */
  modules: [
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios',
    ['nuxt-i18n',{
    locales: [
      {
        name  : 'Deutsch',
        code  : 'de',
        iso   : 'de-DE',
        file  : 'de-DE.js'
      },
      {
        name  : 'Nederland',
        code  : 'nl',
        iso   : 'nl-NL',
        file  : 'nl-NL.js'
      }
    ],
    langDir       : 'lang/',
    defaultLocale : 'de'
  }]

  ],
  /*
   ** Axios module configuration
   ** See https://axios.nuxtjs.org/options
   */
  axios: {},
  /*
   ** Build configuration
   */
  build: {
    /*
     ** You can extend webpack config here
     */
    extend(config, ctx) {}
  },

  server: {
    port: 3010, // default: 3000
    host: 'localhost', // default: localhost
  },

  globalName : 'root',

  globals    : {
    id : globalName => `${globalName}`
  }
}
