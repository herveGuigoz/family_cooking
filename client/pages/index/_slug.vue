<template>
  <div>{{ title }}</div>
</template>

<script>
export default {
  middleware: ['recipes'],
  validate ({ params }) {
    return /[\w|-]*/.test(params.id) // TODO Une meilleure regex
  },
  asyncData ({ params, store, error }) {
    const recipe = store.state.recipes.list.find(recipe => recipe.slug === params.slug)
    if (!recipe) {
      return error({ message: 'Recipe not found', statusCode: 404 })
    }
    return recipe
  },
  head () {
    return {
      title: this.title
    }
  }
}
</script>

<style scoped>

</style>
