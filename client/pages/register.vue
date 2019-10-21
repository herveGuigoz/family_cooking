<template>
  <div class="flex bg-grey h-screen flex-col md:flex-row">
    <div class="min-w-450 flex-1 text-brown px-6">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">Register</h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div v-if="error" class="text-red-400 px-6 mt-1 -mb-6">{{ error }}</div>
        <div class="mt-12">
          <input-component
            v-model="form.username"
            :v="$v.form.username"
            type="text"
            id="username"
            label="username"
          />
          <input-component
            v-model="form.email"
            :v="$v.form.email"
            type="email"
            id="email"
            label="email"
          />
          <input-component
            v-model="form.password"
            :v="$v.form.password"
            type="password"
            id="password"
            label="password"
          />
          <input-component
            v-model="form.confirmPassword"
            :v="$v.form.confirmPassword"
            type="password"
            id="confirmPassword"
            label="Confirm Password"
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
        password: null
      },
      error: false,
      isLoading: false
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
        this.isLoading = true;
        this.error = '';
        this.$axios
          .$post('/register', this.user)
          .then(response => {
            this.$store.dispatch('auth', { token: response.token, username: this.user.username })
            this.$router.push('/')
          }).catch(error => {
            if (error.response) {
            /*
             * The request was made and the server responded with a
             * status code that falls out of the range of 2xx
             */
            if (error.response.status === 403) {
              this.error = error.response.data.error + ' 😨'
            }
            } else if (error.request) {
              /*
               * The request was made but no response was received, `error.request`
               * is an instance of XMLHttpRequest in the browser and an instance
               * of http.ClientRequest in Node.js
               */
              console.log(error.request);
              this.error = 'Something went wrong 😨'
            } else {
              // Something happened in setting up the request and triggered an Error
              console.log('Error', error.message);
              this.error = 'Something went wrong 😨'
            }
          }).finally(() => {
            this.isLoading = false;
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
