<template>
  <div class="hidden md:flex md:justify-center md:items-center md:h-full md:block">
    <cooking-illustration-component height="h-full" width="w-2/3" />
  </div>
</template>

<script>
import CookingIllustrationComponent from '../../components/illustrations/CookingIllustrationComponent'
export default {
  components: { CookingIllustrationComponent },
  head: {
    title: 'We love recipes'
  }
}
</script>

<style scoped>

</style>
