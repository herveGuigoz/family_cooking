<template>
  <div class="flex bg-grey h-screen flex-col md:flex-row">
    <div class="min-w-450 flex-1 text-brown px-6">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">Register</h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div class="mt-12">
          <input-component
            v-model="form.username"
            :v="$v.form.username"
            type="text"
            id="username"
            label="username"
            :error="errors.username"
          />
          <input-component
            v-model="form.email"
            :v="$v.form.email"
            type="email"
            id="email"
            label="email"
            :error="errors.email"
          />
          <input-component
            v-model="form.password"
            :v="$v.form.password"
            type="password"
            id="password"
            label="password"
            :error="errors.password"
          />
          <input-component
            v-model="form.confirmPassword"
            :v="$v.form.confirmPassword"
            type="password"
            id="confirmPassword"
            label="Confirm Password"
            :error="errors.confirmPassword"
          />
        </div>
        <div class="p-3 flex flex-nowrap">
          <div class="w-24">
            <submit-button-component text="Submit"/>
          </div>
          <div class="text-xs flex-1 flex flex-nowrap justify-center items-center">
            <nuxt-link to="/login">Already have a FamilyCooking account? <span class="text-teal-500">Login!</span></nuxt-link>
          </div>
        </div>
      </form>
    </div>
    <div class="md:w-7/12 flex flex-col justify-center items-center">
      <flamenco-welcome-illustration-component/>
    </div>
  </div>
</template>

<script>
  import 'vuejs-noty/dist/vuejs-noty.css'
  import { required, email, minLength, sameAs } from "vuelidate/lib/validators";
  import InputComponent from "../components/form/InputComponent";
  import SubmitButtonComponent from "../components/form/SubmitButtonComponent";
  import FlamencoWelcomeIllustrationComponent from "../components/illustrations/FlamencoWelcomeIllustrationComponent";
  export default {
    components: {
      InputComponent,
      SubmitButtonComponent,
      FlamencoWelcomeIllustrationComponent
    },
    data: () => ({
      form: {
        username: '',
        email: '',
        password: '',
        confirmPassword: ''
      },
      errors: {
        email: null,
        username: null,
        password: null,
        confirmPassword: null
      }
    }),
    validations: {
      form: {
        username: { required, minLength: minLength(4) },
        email: { required, email },
        password: { required, minLength: minLength(6) },
        confirmPassword: { sameAsPassword : sameAs('password') }
      }
    },
    methods: {
      handleSubmit () {
        this.$nuxt.$loading.start()
        this.errors.email = null
        this.errors.username = null
        this.errors.password = null
        this.errors.confirmPassword = null
        this.$v.form.$touch();
        if (this.$v.form.$error) {
          !this.$v.form.email.required || !this.$v.form.email.email ? this.errors.email = 'Cet email n\'est pas valide'
            : null
          !this.$v.form.username.required ? this.errors.username = 'Il manque votre nom d\'utitlisateur'
            : !this.$v.form.username.minLength ? this.errors.username = 'Votre nom d\'utitlisateur doit être composé de 4 caractères minimum'
              : null
          !this.$v.form.password.required ? this.errors.password = 'Il manque votre mot de passe'
            : !this.$v.form.password.minLength ? this.errors.password = 'Votre mot de passe doit être composé de 6 caractères minimum'
              : null
          !this.$v.form.confirmPassword.sameAsPassword ? this.errors.confirmPassword = 'Vos mots de passe ne correspondent pas' : null
          return
        }
        this.$axios
          .$post('/register', this.user)
          .then(response => {
            this.$store.dispatch('auth', { token: response.token })
            this.$noty.success(`Nice to meet you ${this.form.username}`)
            this.$router.push('/')
          }).catch(error => {
            if (error.response) {
            if (error.response.status === 403) {
              this.$noty.error(`${error.response.data.error} 😨`)
            }
            } else if (error.request) {
              console.log(error.request);
              this.$noty.error('Something went wrong 😨')
            } else {
              console.log('Error', error.message);
              this.$noty.error('Something went wrong 😨')
            }
          }).finally(() => {
            this.$nuxt.$loading.finish()
          })
      }
    }
  }
</script>

<style scoped>
  .title {
    line-height: 1.125;
    word-break: break-word;
  }
  .text-brown {
    color: rgb(85, 85, 85);
  }
  .min-w-450 {
    min-width: 450px;
  }
</style>
