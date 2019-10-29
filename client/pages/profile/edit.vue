<template>
  <div class="flex w-full h-full justify-center xl:pt-6">
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
                <moustache width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="moustache" value="moustache" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <baby width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="baby" value="baby" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <darthvader width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="darthVader" value="darthVader" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramaamy width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaAmy" value="futuramaAmy" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramabender width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaBender" value="futuramaBender" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramafry width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaFry" value="futuramaFry" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramahermes width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaHermes" value="futuramaHermes" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramaleela width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaLeela" value="futuramaLeela" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramamom width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaMom" value="futuramaMom" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramanibbler width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaNibbler" value="futuramaNibbler" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramaprofessor width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaProfessor" value="futuramaProfessor" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <futuramazoidberg width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaZoidberg" value="futuramaZoidberg" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <homersimpson width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="homerSimpson" value="homerSimpson" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <ironman width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="ironMan" value="ironMan" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <mermaid width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="mermaid" value="mermaid" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <naruto width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="naruto" value="naruto" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <pennywise width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="pennywise" value="pennywise" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <r2d2 width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="r2d2" value="r2d2" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <songoku width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="songoku" value="songoku" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <stich width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="stich" value="stich" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <stormtrooper width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="stormtrooper" value="stormtrooper" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <supermario width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="superMario" value="superMario" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <unicorn width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="unicorn" value="unicorn" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <walterwhite width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="walterwhite" value="walterwhite" v-model="form.avatar">
              </div>
            </div>
          </div>
          <div class="mt-6 xl:mt-16 xl:flex-1 max-w-lg">
            <input-component
              v-model="form.username"
              :v="$v.form.username"
              type="text"
              id="username"
              label="username"
              :error="errors.username"
              disabled
            />
            <input-component
              v-model="form.email"
              :v="$v.form.email"
              type="email"
              id="email"
              label="email"
              :error="errors.email"
            />
            <input-component
              v-model="form.password"
              :v="$v.form.password"
              type="password"
              id="password"
              label="password"
              :error="errors.password"
            />
            <input-component
              v-model="form.newPassword"
              :v="$v.form.newPassword"
              type="password"
              id="newPassword"
              label="New Password (optional)"
              :error="errors.newPassword"
            />
          </div>
        </div>
        <div class="w-24 ml-3 mt-6 xl:mt-0">
          <submit-button-component text="Submit"/>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import { mapState } from 'vuex'
  import 'vuejs-noty/dist/vuejs-noty.css'
  import { required, email, minLength, sameAs } from "vuelidate/lib/validators";
  import InputComponent from "../../components/form/InputComponent";
  import SubmitButtonComponent from "../../components/form/SubmitButtonComponent";
  import moustache from "~/components/icons/avatars/moustache";
  import anonymous from "~/components/icons/avatars/anonymous";
  import baby from "~/components/icons/avatars/baby";
  import darthvader from "~/components/icons/avatars/darthvader";
  import futuramaamy from "~/components/icons/avatars/futuramaamy";
  import futuramabender from "~/components/icons/avatars/futuramabender";
  import futuramafry from "~/components/icons/avatars/futuramafry";
  import futuramahermes from "~/components/icons/avatars/futuramahermes";
  import futuramaleela from "~/components/icons/avatars/futuramaleela";
  import futuramamom from "~/components/icons/avatars/futuramamom";
  import futuramanibbler from "~/components/icons/avatars/futuramanibbler";
  import futuramaprofessor from "~/components/icons/avatars/futuramaprofessor";
  import futuramazoidberg from "~/components/icons/avatars/futuramazoidberg";
  import homersimpson from "~/components/icons/avatars/homersimpson";
  import ironman from "~/components/icons/avatars/ironman";
  import mermaid from "~/components/icons/avatars/mermaid";
  import naruto from "~/components/icons/avatars/naruto";
  import pennywise from "~/components/icons/avatars/pennywise";
  import r2d2 from "~/components/icons/avatars/r2d2";
  import songoku from "~/components/icons/avatars/songoku";
  import stich from "~/components/icons/avatars/stich";
  import stormtrooper from "~/components/icons/avatars/stormtrooper";
  import supermario from "~/components/icons/avatars/supermario";
  import unicorn from "~/components/icons/avatars/unicorn";
  import walterwhite from "~/components/icons/avatars/walterwhite";
  export default {
    middleware: ['restricted'],
    components: {
      InputComponent,
      SubmitButtonComponent,
      moustache,
      anonymous,
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
      naruto,
      pennywise,
      r2d2,
      songoku,
      stich,
      stormtrooper,
      supermario,
      unicorn,
      walterwhite
    },
    computed: mapState([
      'user'
    ]),
    mounted () {
      this.form.avatar = this.user.avatar
      this.form.username = this.user.username
      this.form.email = this.user.email
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
      handleSubmit () {
        this.$nuxt.$loading.start()
        this.$v.form.$touch();
        if (this.$v.form.$error) {
          !this.$v.form.email.required || !this.$v.form.email.email ? this.errors.email = 'Cet email n\'est pas valide'
            : null
          !this.$v.form.username.required ? this.errors.username = 'Il manque votre nom d\'utitlisateur'
            : !this.$v.form.username.minLength ? this.errors.username = 'Votre nom d\'utitlisateur doit être composé de 4 caractères minimum'
            : null
          !this.$v.form.password.required ? this.errors.password = 'Il manque votre mot de passe'
            : !this.$v.form.password.minLength ? this.errors.password = 'Votre mot de passe doit être composé de 6 caractères minimum'
            : null
          !this.$v.form.newPassword.minLength ? this.errors.newPassword = 'Votre nouveau mot de passe doit être composé de 6 caractères minimum'
            : null
          return
        }
        const user = {
          username : this.form.username,
          email: this.form.email,
          avatar: this.form.avatar,
          password: this.form.password
        }
        this.form.newPassword.length > 0 ? user.newPassword = this.form.newPassword : null

        this.$axios
          .$post('/edit', user)
          .then(response => {
            this.$store.dispatch('auth', { token: response.token })
            this.$noty.success(`${this.form.username} your profile has been updated`)
            this.$router.push('/')
          }).catch(error => {
          if (error.response) {
            if (error.response.status === 403) {
              this.$noty.error(`${error.response.data.error} 😨`)
            }
          } else if (error.request) {
            console.log(error.request);
            this.$noty.error('Something went wrong 😨')
          } else {
            console.log('Error', error.message);
            this.$noty.error('Something went wrong 😨')
          }
        }).finally(() => {
          this.$nuxt.$loading.finish()
        })
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
