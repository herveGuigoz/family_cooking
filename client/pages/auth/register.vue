<template>
  <div class="flex h-screen flex-col md:flex-row">
    <div class="min-w-450 flex-1 text-brown px-6">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">
          Register
        </h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div class="mt-12">
          <input-component
            id="username"
            v-model="form.username"
            :v="$v.form.username"
            type="text"
            label="username"
            :error="errors.username"
          />
          <input-component
            id="email"
            v-model="form.email"
            :v="$v.form.email"
            type="email"
            label="email"
            :error="errors.email"
          />
          <input-component
            id="password"
            v-model="form.password"
            :v="$v.form.password"
            type="password"
            label="password"
            :error="errors.password"
          />
          <input-component
            id="confirmPassword"
            v-model="form.confirmPassword"
            :v="$v.form.confirmPassword"
            type="password"
            label="Confirm Password"
            :error="errors.confirmPassword"
          />
        </div>
        <div class="p-3 flex flex-nowrap">
          <div class="w-24">
            <base-button>Submit</base-button>
          </div>
          <div class="text-xs flex-1 flex flex-nowrap justify-center items-center">
            <nuxt-link to="/auth/login">
              Already have a FamilyCooking account? <span class="text-teal-500">Login!</span>
            </nuxt-link>
          </div>
        </div>
      </form>
    </div>
    <div class="md:w-7/12 flex flex-col justify-center items-center">
      <flamenco-welcome-illustration-component />
    </div>
  </div>
</template>

<script>
import 'vuejs-noty/dist/vuejs-noty.css'
import { required, email, minLength, sameAs } from 'vuelidate/lib/validators'
import InputComponent from "../../components/form/InputComponent";
import BaseButton from "../../components/UI/BaseButton";
import FlamencoWelcomeIllustrationComponent from "../../components/illustrations/FlamencoWelcomeIllustrationComponent";
export default {
  components: {
    InputComponent,
    BaseButton,
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
      confirmPassword: { sameAsPassword: sameAs('password') }
    }
  },
  methods: {
    async handleSubmit () {
      this.$nuxt.$loading.start()
      this.errors.email = null
      this.errors.username = null
      this.errors.password = null
      this.errors.confirmPassword = null
      this.$v.form.$touch()
      if (this.$v.form.$error) {
        this.errors.email = !this.$v.form.email.required || !this.$v.form.email.email ? 'Cet email n\'est pas valide' : null
        this.errors.username = !this.$v.form.username.required ? 'Il manque votre nom d\'utitlisateur'
          : !this.$v.form.username.minLength ? 'Votre nom d\'utitlisateur doit être composé de 4 caractères minimum'
            : null
        this.errors.password = !this.$v.form.password.required ? 'Il manque votre mot de passe'
          : !this.$v.form.password.minLength ? 'Votre mot de passe doit être composé de 6 caractères minimum'
            : null
        this.errors.confirmPassword = !this.$v.form.confirmPassword.sameAsPassword ? 'Vos mots de passe ne correspondent pas' : null
        return
      }
      try {
        await this.$store.dispatch('auth/registerUser', this.form)
        this.$noty.success(`Nice to meet you ${this.form.username}`)
        this.$router.push('/')
      } catch (e) {
        if (e.response.status === 403) {
          this.$noty.error(`${e.response.data.error} 😨`)
        } else {
          this.$noty.error('Something went wrong 😨')
        }
      }
      this.$nuxt.$loading.finish()
    }
  }
}
</script>

<style scoped>
  .min-w-450 {
    min-width: 450px;
  }
</style>
