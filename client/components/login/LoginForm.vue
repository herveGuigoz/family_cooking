<template>
  <form @submit.prevent="handleSubmit">
    <div class="w-full px-3 mb-3">
      <label
        class="block uppercase tracking-wide text-xs font-bold text-brown mb-2"
        for="email"
      >Email</label>
      <input
        v-model="user.email"
        :class="{ 'border border-red-500': submitting && invalidEmail }"
        class="appearance-none block w-full bg-white text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none"
        id="email"
        type="email"
        required
      />
    </div>
    <div class="px-3 mb-1">
      <p v-if="error.email && submitting" class="text-red-500 text-xs">❗Le nom d'utilisateur peut contenir : des lettres, des chiffres, des tirets</p>
    </div>
    <div class="w-full px-3 mb-3">
      <label
        class="block uppercase tracking-wide text-xs font-bold text-brown mb-2"
        for="password"
      >Password</label>
      <input
        v-model="user.password"
        :class="{ 'border border-red-500': submitting && invalidPassword }"
        class="appearance-none block w-full bg-white text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none"
        id="password"
        type="password"
        required
      />
    </div>
    <div class="px-3 mb-1">
      <p v-if="error.password && submitting" class="text-red-500 text-xs">❗Le mot de passe doit contenir 5 caractères minimum</p>
    </div>

    <div class="p-3">
      <button class="text-teal-500 py-1 px-4 border border-teal-500 rounded">Login</button>
    </div>
  </form>
</template>

<script>
  export default {
    name: "LoginForm",
    data: () => ({
      submitting: false,
      error: {
        email : false,
        password: false
      },
      success: false,
      regex: /[^\w|_|-]/,
      user: {
        email: "",
        password: ""
      }
    }),
    methods: {
      handleSubmit() {
        this.submitting = true;
        this.clearStatus();

        if (this.invalidEmail) {
          this.error.email = true;
          return;
        }
        if (this.invalidPassword) {
          this.error.password = true
          return;
        }

        this.$emit("submit:user", this.user);

        this.user = {
          email: "",
          password: ""
        };

        this.success = true;
        this.submitting = false;
      },
      clearStatus() {
        this.success = false;
        this.error.email = false;
        this.error.password = false;
      }
    },
    computed: {
      invalidEmail() {
        this.user.email = this.user.email.trim()
        return this.user.email.length < 0 || this.regex.test(this.user.email);
      },

      invalidPassword() {
        return this.user.password.length < 5;
      }
    }
  }
</script>

<style scoped>

</style>
