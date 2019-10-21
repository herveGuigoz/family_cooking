<template>
  <div class="flex bg-grey h-screen flex-col md:flex-row">
    <div class="min-w-450 flex-1 text-brown px-6 flex flex-col">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">Login</h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div v-if="requestError" class="text-red-400 px-6 mt-1 -mb-6">{{ error }}</div>
        <div class="mt-12">
          <input-component
            v-model="form.username"
            :v="$v.form.username"
            type="text"
            id="username"
            label="username"
          />
          <input-component
            v-model="form.password"
            :v="$v.form.password"
            type="password"
            id="password"
            label="password"
          />
        </div>
        <div class="p-3 flex flex-nowrap">
          <div class="w-24">
            <submit-button-component text="Submit"/>
          </div>
          <div class="text-xs flex-1 flex justify-center items-center">
            <nuxt-link to="/register">New to FamilyCooking? <span class="text-teal-500">Create an account!</span></nuxt-link>
          </div>
        </div>
      </form>
    </div>
    <div class="md:w-7/12 pt-6 pl-6 flex flex-col justify-end">
      <sign-up4-illustration-component/>
    </div>
  </div>
</template>

<script>
  import { required, minLength } from "vuelidate/lib/validators";
  import InputComponent from "../components/form/InputComponent"
  import SubmitButtonComponent from "../components/form/SubmitButtonComponent";
  import SignUp4IllustrationComponent from "../components/illustrations/SignUp4IllustrationComponent";
  export default {
    components: {
      InputComponent,
      SubmitButtonComponent,
      SignUp4IllustrationComponent
    },
    data: () => ({
       form: {
         username: '',
         password: ''
       },
      errors: {
        email: null,
        password: null
      },
      requestError: null,
      isLoading: false
    }),
    validations: {
      form: {
        username: { required, minLength: minLength(4) },
        password: { required, minLength: minLength(6) }
      }
    },
    methods: {
      handleSubmit () {
        this.isLoading = true;
        this.requestError = '';
        this.$axios
          .$post('/login', this.user)
          .then(response => {
            this.$store.dispatch('auth', { token: response.token, username: this.user.username })
            this.$router.push('/')
          }).catch(error => {
          if (error.response) {
            /*
             * The request was made and the server responded with a
             * status code that falls out of the range of 2xx
             */
            if (error.response.status === 401) {
              this.requestError = error.response.data.message + ' 😨'
              console.log(error.response.data.message)
            }
          } else if (error.request) {
            /*
             * The request was made but no response was received, `error.request`
             * is an instance of XMLHttpRequest in the browser and an instance
             * of http.ClientRequest in Node.js
             */
            console.log(error.request);
            this.requestError = 'Something went wrong 😨'
          } else {
            // Something happened in setting up the request and triggered an Error
            console.log('Error', error.message);
            this.requestError = 'Something went wrong 😨'
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
