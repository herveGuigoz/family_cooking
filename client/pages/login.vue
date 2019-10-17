<template>
  <div class="flex bg-grey h-screen">
    <div class="min-w-450 flex-1 text-brown px-6">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="title text-brown font-semibold text-center uppercase">Login</h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div v-if="error" class="bg-red-400 mb-6 text-white">{{ error }}</div>
        <div class="mt-12">
          <ui-input id="email" input-label="email" required input-type="email"/>
          <ui-input id="password" input-label="Password" required input-type="password"/>
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
      error: ""
    }),
    methods: {
      handleSubmit () {
        console.log('log')
      },
      async login(user) {
        try {
          console.log(user)
        } catch (e) {
          this.error = e.message;
        } finally {
          this.username = "";
          this.password = "";
        }
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
