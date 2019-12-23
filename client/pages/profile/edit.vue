<template>
  <div class="flex h-screen justify-center py-6 overflow-y-auto">
    <div class="flex flex-col pt-6 max-w-5xl xl:flex-1 xl:px-3 xl:mt-6">
      <div class="flex flex-row flex-nowrap justify-center items-center w-full">
        <h1 class="block text-gray-900 text-2xl">
          Update your Profile
        </h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div class="flex flex-col xl:flex-row xl:flex-nowrap justify-between">
          <div class="px-3 mt-12 xl:mt-16 max-w-lg">
            <p class="block uppercase tracking-wide text-xs font-bold">
              Avatar
            </p>
            <div class="flex flex-row flex-wrap">
              <div class="flex flex-col justify-center items-center p-2">
                <moustache width="w-10" height="h-10" />
                <input id="moustache" v-model="form.avatar" class="mt-2" type="radio" value="moustache">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <baby width="w-10" height="h-10" />
                <input id="baby" v-model="form.avatar" class="mt-2" type="radio" value="baby">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <darthvader width="w-10" height="h-10" />
                <input id="darthvader" v-model="form.avatar" class="mt-2" type="radio" value="darthvader">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramaamy width="w-10" height="h-10" />
                <input id="futuramaamy" v-model="form.avatar" class="mt-2" type="radio" value="futuramaamy">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramabender width="w-10" height="h-10" />
                <input id="futuramabender" v-model="form.avatar" class="mt-2" type="radio" value="futuramabender">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramafry width="w-10" height="h-10" />
                <input id="futuramafry" v-model="form.avatar" class="mt-2" type="radio" value="futuramafry">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramahermes width="w-10" height="h-10" />
                <input id="futuramahermes" v-model="form.avatar" class="mt-2" type="radio" value="futuramahermes">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramaleela width="w-10" height="h-10" />
                <input id="futuramaleela" v-model="form.avatar" class="mt-2" type="radio" value="futuramaleela">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramamom width="w-10" height="h-10" />
                <input id="futuramamom" v-model="form.avatar" class="mt-2" type="radio" value="futuramamom">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramanibbler width="w-10" height="h-10" />
                <input id="futuramanibbler" v-model="form.avatar" class="mt-2" type="radio" value="futuramanibbler">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramaprofessor width="w-10" height="h-10" />
                <input id="futuramaprofessor" v-model="form.avatar" class="mt-2" type="radio" value="futuramaprofessor">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramazoidberg width="w-10" height="h-10" />
                <input id="futuramazoidberg" v-model="form.avatar" class="mt-2" type="radio" value="futuramazoidberg">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <homersimpson width="w-10" height="h-10" />
                <input id="homersimpson" v-model="form.avatar" class="mt-2" type="radio" value="homersimpson">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <ironman width="w-10" height="h-10" />
                <input id="ironman" v-model="form.avatar" class="mt-2" type="radio" value="ironman">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <mermaid width="w-10" height="h-10" />
                <input id="mermaid" v-model="form.avatar" class="mt-2" type="radio" value="mermaid">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramazapp width="w-10" height="h-10" />
                <input id="futuramazapp" v-model="form.avatar" class="mt-2" type="radio" value="futuramazapp">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <pennywise width="w-10" height="h-10" />
                <input id="pennywise" v-model="form.avatar" class="mt-2" type="radio" value="pennywise">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <r2d2 width="w-10" height="h-10" />
                <input id="r2d2" v-model="form.avatar" class="mt-2" type="radio" value="r2d2">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <songoku width="w-10" height="h-10" />
                <input id="songoku" v-model="form.avatar" class="mt-2" type="radio" value="songoku">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <stich width="w-10" height="h-10" />
                <input id="stich" v-model="form.avatar" class="mt-2" type="radio" value="stich">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <stormtrooper width="w-10" height="h-10" />
                <input id="stormtrooper" v-model="form.avatar" class="mt-2" type="radio" value="stormtrooper">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <supermario width="w-10" height="h-10" />
                <input id="supermario" v-model="form.avatar" class="mt-2" type="radio" value="supermario">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <unicorn width="w-10" height="h-10" />
                <input id="unicorn" v-model="form.avatar" class="mt-2" type="radio" value="unicorn">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <walterwhite width="w-10" height="h-10" />
                <input id="walterwhite" v-model="form.avatar" class="mt-2" type="radio" value="walterwhite">
              </div>
            </div>
          </div>
          <div class="mt-6 xl:mt-16 xl:flex-1 max-w-lg">
            <input-component
              id="username"
              v-model="form.username"
              :v="$v.form.username"
              type="text"
              label="username"
              :error="errors.username"
              disabled
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
              id="newPassword"
              v-model="form.newPassword"
              :v="$v.form.newPassword"
              type="password"
              label="New Password (optional)"
              :error="errors.newPassword"
            />
          </div>
        </div>
        <div class="w-24 ml-3 mt-6 xl:mt-0">
          <base-button outline>
            Submit
          </base-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { required, email, minLength } from 'vuelidate/lib/validators'
import InputComponent from '../../components/form/InputComponent'
import BaseButton from '../../components/UI/BaseButton'
import moustache from '~/components/icons/avatars/moustache'
import baby from '~/components/icons/avatars/baby'
import darthvader from '~/components/icons/avatars/darthvader'
import futuramaamy from '~/components/icons/avatars/futuramaamy'
import futuramabender from '~/components/icons/avatars/futuramabender'
import futuramafry from '~/components/icons/avatars/futuramafry'
import futuramahermes from '~/components/icons/avatars/futuramahermes'
import futuramaleela from '~/components/icons/avatars/futuramaleela'
import futuramamom from '~/components/icons/avatars/futuramamom'
import futuramanibbler from '~/components/icons/avatars/futuramanibbler'
import futuramaprofessor from '~/components/icons/avatars/futuramaprofessor'
import futuramazoidberg from '~/components/icons/avatars/futuramazoidberg'
import homersimpson from '~/components/icons/avatars/homersimpson'
import ironman from '~/components/icons/avatars/ironman'
import mermaid from '~/components/icons/avatars/mermaid'
import futuramazapp from '~/components/icons/avatars/futuramazapp'
import pennywise from '~/components/icons/avatars/pennywise'
import r2d2 from '~/components/icons/avatars/r2d2'
import songoku from '~/components/icons/avatars/songoku'
import stich from '~/components/icons/avatars/stich'
import stormtrooper from '~/components/icons/avatars/stormtrooper'
import supermario from '~/components/icons/avatars/supermario'
import unicorn from '~/components/icons/avatars/unicorn'
import walterwhite from '~/components/icons/avatars/walterwhite'
export default {
  middleware: ['restricted'],
  components: {
    InputComponent,
    BaseButton,
    moustache,
    baby,
    darthvader,
    futuramaamy,
    futuramabender,
    futuramafry,
    futuramahermes,
    futuramaleela,
    futuramamom,
    futuramanibbler,
    futuramaprofessor,
    futuramazoidberg,
    homersimpson,
    ironman,
    mermaid,
    futuramazapp,
    pennywise,
    r2d2,
    songoku,
    stich,
    stormtrooper,
    supermario,
    unicorn,
    walterwhite
  },
  async asyncData (context) {
    const storedUser = await context.store.getters['auth/getUser']
    return { storedUser }
  },
  data: () => ({
    form: {
      avatar: '',
      username: '',
      email: '',
      password: '',
      newPassword: ''
    },
    errors: {
      email: null,
      username: null,
      password: null,
      newPassword: null
    }
  }),
  created () {
    this.form.avatar = this.storedUser.avatar
    this.form.username = this.storedUser.username
    this.form.email = this.storedUser.email
  },
  validations: {
    form: {
      avatar: { required },
      username: { required, minLength: minLength(4) },
      email: { required, email },
      password: { required, minLength: minLength(6) },
      newPassword: { minLength: minLength(6) }
    }
  },
  methods: {
    async handleSubmit () {
      this.$v.form.$touch()
      if (this.$v.form.$error) {
        this.errors.email = !this.$v.form.email.required || !this.$v.form.email.email ? 'Cet email n\'est pas valide' : null
        this.errors.username = !this.$v.form.username.required ? 'Il manque votre nom d\'utitlisateur'
          : !this.$v.form.username.minLength ? 'Votre nom d\'utitlisateur doit être composé de 4 caractères minimum'
            : null
        this.errors.password = !this.$v.form.password.required ? 'Il manque votre mot de passe'
          : !this.$v.form.password.minLength ? 'Votre mot de passe doit être composé de 6 caractères minimum'
            : null
        this.errors.newPassword = !this.$v.form.newPassword.minLength ? 'Votre nouveau mot de passe doit être composé de 6 caractères minimum' : null
        return
      }
      const user = {
        username: this.form.username,
        email: this.form.email,
        avatar: this.form.avatar,
        password: this.form.password
      }
      user.newPassword = this.form.newPassword.length > 0 ? this.form.newPassword : null

      if (!this.$store.state.auth.token) {
        if (this.$cookie.get('auth')) {
          await this.$store.dispatch('auth/initAuth')
        } else {
          this.$router.push('/')
        }
      }

      this.$nuxt.$loading.start()
      try {
        await this.$store.dispatch('auth/updateUser', user)
        this.$notifications(`${this.form.username} your profile has been updated`, { style: 'success' })
        this.$router.push('/')
      } catch (e) {
        this.$notifications('Something went wrong 😨', { style: 'error' })
      }
      this.$nuxt.$loading.finish()
    }
  }
}
</script>
<style scoped>
  input {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    border-radius: 50%;
    width: 16px;
    height: 16px;

    border: 2px solid #999;
    transition: 0.2s all linear;
    margin-right: 5px;

    position: relative;
    top: 4px;
  }
  input:focus {
    outline: none;
  }
  input:checked {
    border: 6px solid hsl(0,0%,60%);
  }
</style>
