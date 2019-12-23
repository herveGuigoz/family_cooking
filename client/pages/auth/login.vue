<template>
  <div class="flex h-screen flex-col md:flex-row">
    <div class="min-w-450 flex-1 text-brown px-6 flex flex-col">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">
          Login
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
            id="password"
            v-model="form.password"
            :v="$v.form.password"
            type="password"
            label="password"
            :error="errors.password"
          />
        </div>
        <div class="p-3 flex flex-nowrap">
          <div class="w-24">
            <base-button outline>
              Submit
            </base-button>
          </div>
          <div class="text-xs flex-1 flex justify-center items-center">
            <nuxt-link to="/auth/register">
              New to FamilyCooking? <span class="text-teal-500">Create an account!</span>
            </nuxt-link>
          </div>
        </div>
      </form>
    </div>
    <div class="md:w-7/12 pt-6 pl-6 flex flex-col justify-end">
      <sign-up4-illustration-component />
    </div>
  </div>
</template>

<script>
import { required, minLength } from 'vuelidate/lib/validators'
import InputComponent from '../../components/form/InputComponent'
import BaseButton from '../../components/UI/BaseButton'
import SignUp4IllustrationComponent from '../../components/illustrations/SignUp4IllustrationComponent'
export default {
  components: {
    InputComponent,
    BaseButton,
    SignUp4IllustrationComponent
  },
  data: () => ({
    form: {
      username: '',
      password: ''
    },
    errors: {
      username: null,
      password: null
    },
    requestError: null
  }),
  validations: {
    form: {
      username: { required, minLength: minLength(4) },
      password: { required, minLength: minLength(6) }
    }
  },
  methods: {
    async handleSubmit () {
      this.$nuxt.$loading.start()
      this.errors.username = null
      this.errors.password = null
      this.$v.form.$touch()
      if (this.$v.form.$error) {
        this.errors.username = !this.$v.form.username.required
          ? 'Votre nom d\'utitlisateur doit être composé de 4 caractères minimum'
          : !this.$v.form.username.minLength
            ? 'Il manque votre username'
            : null
        this.errors.password = !this.$v.form.password.required
          ? 'Il manque votre mot de passe'
          : !this.$v.form.password.minLength
            ? 'Votre mot de passe doit être composé de 6 caractères minimum'
            : null
        return
      }
      try {
        await this.$store.dispatch('auth/authenticateUser', this.form)
        this.$notifications(`Welcome Back ${this.form.username}`, { style: 'success' })
        this.$router.push('/')
      } catch (e) {
        if (e.response.status === 401) {
          this.$notifications(`${e.response.data.message} 😨`, { style: 'error' })
        } else {
          this.$notifications('Something went wrong 😨', { style: 'error' })
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
