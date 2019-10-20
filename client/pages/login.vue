<template>
  <div class="flex bg-grey h-screen">
    <div class="min-w-450 flex-1 text-brown px-6">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">Login</h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div v-if="error" class="text-red-400 px-6 mt-1 -mb-6">{{ error }}</div>
        <div class="mt-12">
          <ui-input
            id="username"
            name="username"
            label="username"
            type="text"
            required
            :errorMessage="errors.email"
            @update="getUsernameInput"
          />
          <ui-input
            id="password"
            name="password"
            label="password"
            type="password"
            required
            :errorMessage="errors.password"
            @update="getPasswordInput"
          />
        </div>
        <div class="p-3 flex flex-nowrap">
          <div class="w-24">
            <ui-submit-button text="Submit"/>
          </div>
          <div class="text-xs flex-1 flex justify-center items-center">
            <nuxt-link to="/register">New to FamilyCooking? <span class="text-teal-500">Create an account!</span></nuxt-link>
          </div>
        </div>
      </form>
    </div>
    <div class="w-7/12 hidden md:block flex flex-col justify-end">
      <sign-up4/>
    </div>
  </div>
</template>

<script>
  import UiInput from "../components/UI/UiInput";
  import UiSubmitButton from "../components/UI/UiSubmitButton";
  import SignUp4 from "../components/illustrations/SignUp4";
  export default {
    components: {
      UiInput,
      UiSubmitButton,
      SignUp4
    },
    data: () => ({
      user : {
        username: '',
        password: ''
      },
      errors: {
        email: null,
        password: null
      },
      error: null,
      isLoading: false
    }),
    methods: {
      getUsernameInput (content) { this.user.username = content.trim() },
      getPasswordInput (content) { this.user.password = content.trim() },
      handleSubmit () {
        this.isLoading = true;
        this.error = '';
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
              this.error = error.response.data.message + ' 😨'
              console.log(error.response.data.message)
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
