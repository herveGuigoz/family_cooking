<template>
  <div class="flex w-full h-full justify-center xl:pt-6">
    <div class="flex flex-col pt-6 pl-6 xl:w-2/3 xl:mt-6">
      <div class="flex flex-row flex-nowrap justify-center items-center w-full">
        <h1 class="block text-gray-900 text-2xl">
          Update your Profile
        </h1>
      </div>
      <form @submit.prevent="handleSubmit">
        <div class="flex flex-col xl:flex-row xl:flex-nowrap justify-center">
          <div class="px-3 mt-12 xl:mt-16 max-w-lg">
            <p class="block uppercase tracking-wide text-xs font-bold text-gray-900">
              Avatar
            </p>
            <div class="flex flex-row flex-wrap">
              <div class="flex flex-col justify-center items-center p-2">
                <icon-user-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="user" value="user" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-baby-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="baby" value="baby" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-darth-vader-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="darthVader" value="darthVader" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-amy-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaAmy" value="futuramaAmy" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-bender-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaBender" value="futuramaBender" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-fry-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaFry" value="futuramaFry" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-hermes-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaHermes" value="futuramaHermes" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-leela-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaLeela" value="futuramaLeela" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-mom-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaMom" value="futuramaMom" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-nibbler-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaNibbler" value="futuramaNibbler" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-professor-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaProfessor" value="futuramaProfessor" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-futurama-zoidberg-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="futuramaZoidberg" value="futuramaZoidberg" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-homer-simpson-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="homerSimpson" value="homerSimpson" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-iron-man-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="ironMan" value="ironMan" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-mermaid-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="mermaid" value="mermaid" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-naruto-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="naruto" value="naruto" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-pennywise-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="pennywise" value="pennywise" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-r2d2-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="r2d2" value="r2d2" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-songoku-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="songoku" value="songoku" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-stich-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="stich" value="stich" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-stormtrooper-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="stormtrooper" value="stormtrooper" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-super-mario-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="superMario" value="superMario" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-unicorn-component width="w-10" height="h-10"/>
                <input class="mt-2" type="radio" id="unicorn" value="unicorn" v-model="form.avatar">
              </div>
              <div class="flex flex-col justify-center items-center p-2">
                <icon-walterwhite-component width="w-10" height="h-10"/>
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
        <div class="w-24 ml-3 mt-6 xl:px-2">
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
  import InputComponent from "~/components/form/InputComponent";
  import SubmitButtonComponent from "~/components/form/SubmitButtonComponent";
  import IconUserComponent from "~/components/icons/avatars/IconUserComponent";
  import IconBabyComponent from "~/components/icons/avatars/IconBabyComponent";
  import IconDarthVaderComponent from "~/components/icons/avatars/IconDarthVaderComponent";
  import IconFuturamaAmyComponent from "~/components/icons/avatars/IconFuturamaAmyComponent";
  import IconFuturamaBenderComponent from "~/components/icons/avatars/IconFuturamaBenderComponent";
  import IconFuturamaFryComponent from "~/components/icons/avatars/IconFuturamaFryComponent";
  import IconFuturamaHermesComponent from "~/components/icons/avatars/IconFuturamaHermesComponent";
  import IconFuturamaLeelaComponent from "~/components/icons/avatars/IconFuturamaLeelaComponent";
  import IconFuturamaMomComponent from "~/components/icons/avatars/IconFuturamaMomComponent";
  import IconFuturamaNibblerComponent from "~/components/icons/avatars/IconFuturamaNibblerComponent";
  import IconFuturamaProfessorComponent from "~/components/icons/avatars/IconFuturamaProfessorComponent";
  import IconFuturamaZoidbergComponent from "~/components/icons/avatars/IconFuturamaZoidbergComponent";
  import IconHomerSimpsonComponent from "~/components/icons/avatars/IconHomerSimpsonComponent";
  import IconIronManComponent from "~/components/icons/avatars/IconIronManComponent";
  import IconMermaidComponent from "~/components/icons/avatars/IconMermaidComponent";
  import IconNarutoComponent from "~/components/icons/avatars/IconNarutoComponent";
  import IconPennywiseComponent from "~/components/icons/avatars/IconPennywiseComponent";
  import IconR2d2Component from "~/components/icons/avatars/IconR2d2Component";
  import IconSongokuComponent from "~/components/icons/avatars/IconSongokuComponent";
  import IconStichComponent from "~/components/icons/avatars/IconStichComponent";
  import IconStormtrooperComponent from "~/components/icons/avatars/IconStormtrooperComponent";
  import IconSuperMarioComponent from "~/components/icons/avatars/IconSuperMarioComponent";
  import IconUnicornComponent from "~/components/icons/avatars/IconUnicornComponent";
  import IconWalterwhiteComponent from "~/components/icons/avatars/IconWalterwhiteComponent";
  export default {
    middleware: ['restricted'],
    components: {
      InputComponent,
      SubmitButtonComponent,
      IconUserComponent,
      IconBabyComponent,
      IconDarthVaderComponent,
      IconFuturamaAmyComponent,
      IconFuturamaBenderComponent,
      IconFuturamaFryComponent,
      IconFuturamaHermesComponent,
      IconFuturamaLeelaComponent,
      IconFuturamaMomComponent,
      IconFuturamaNibblerComponent,
      IconFuturamaProfessorComponent,
      IconFuturamaZoidbergComponent,
      IconHomerSimpsonComponent,
      IconIronManComponent,
      IconMermaidComponent,
      IconNarutoComponent,
      IconPennywiseComponent,
      IconR2d2Component,
      IconSongokuComponent,
      IconStichComponent,
      IconStormtrooperComponent,
      IconSuperMarioComponent,
      IconUnicornComponent,
      IconWalterwhiteComponent
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
        this.$v.form.$touch();
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

        if (this.$v.form.$error) {
          return
        }

        console.log('pas d\'erreur')
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
