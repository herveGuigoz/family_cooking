<template>
  <div class="flex bg-grey h-screen">
    <div class="min-w-450 flex-1 text-brown px-6">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">Login</h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div class="mt-12">
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
      email: '',
      password: '',
      errors: {
        email: null,
        password: null
      },
      error: null,
      isLoading: false
    }),
    methods: {
      getEmailInput (content) { this.email = content },
      getPasswordInput (content) { this.password = content },
      handleSubmit() {
        /*
        this.$axios
          .$post('/login', {
            email: this.email,
            password: this.password
          })
          .then(response => {
            console.log(response.data);
            //this.$emit('user-authenticated', userUri);
            //this.email = '';
            //this.password = '';
          }).catch(error => {
            console.log(error.response.data);
          }).finally(() => {
            this.isLoading = false;
          })
         */
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
