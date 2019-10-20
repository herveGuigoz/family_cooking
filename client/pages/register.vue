<template>
  <div class="flex bg-grey h-screen">
    <div class="min-w-450 flex-1 text-brown px-6">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">Register</h1>
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
            :errorMessage="errors.username"
            @update="getUsernameInput"
          />
          <ui-input
            id="email"
            name="email"
            label="email"
            type="email"
            required
            :errorMessage="errors.email"
            @update="getEmailInput"
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
          <ui-input
            id="confirmPassword"
            name="confirmPassword"
            label="confirm Password"
            type="password"
            required
            @update="getConfirmPasswordInput"/>
        </div>
        <div class="p-3 flex flex-nowrap">
          <div class="w-24">
            <ui-submit-button text="Submit"/>
          </div>
          <div class="text-xs flex-1 flex flex-nowrap justify-center items-center">
            <nuxt-link to="/login">Already have a FamilyCooking account? <span class="text-teal-500">Login!</span></nuxt-link>
          </div>
        </div>
      </form>
    </div>
    <div class="w-7/12 hidden md:block flex flex-col justify-center items-center">
      <flamenco-welcome/>
    </div>
  </div>
</template>

<script>
  import UiInput from "../components/UI/UiInput";
  import UiSubmitButton from "../components/UI/UiSubmitButton";
  import FlamencoWelcome from "../components/illustrations/FlamencoWelcome";
  export default {
    components: {
      UiInput,
      UiSubmitButton,
      FlamencoWelcome
    },
    data: () => ({
      user : {
        username: '',
        email: '',
        password: '',
      },
      errors: {
        username: null,
        email: null,
        password: null
      },
      error: null,
      isLoading: false
    }),
    methods: {
      getUsernameInput (content) { this.user.username = content.trim() },
      getEmailInput (content) { this.user.email = content.trim() },
      getPasswordInput (content) { this.user.password = content.trim() },
      getConfirmPasswordInput (content) { console.log(content.trim()) },// TODO
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
