<template>
  <div class="antialiased h-screen flex flex-col md:flex-row md:flex-nowrap overflow-hidden font-book">
    <div class="md:hidden">
      <navbar-component />
    </div>
    <div class="hidden md:block flex-none w-full max-w-xxs bg-brown">
      <sidebar-menu-component />
    </div>
    <div class="flex-1 bg-grey">
      <nuxt />
    </div>
  </div>
</template>
<script>
import NavbarComponent from '../components/menu/NavbarComponent'
import SidebarMenuComponent from '../components/menu/SidebarMenuComponent'
export default {
  components: {
    NavbarComponent,
    SidebarMenuComponent
  }
}
</script>
<style>
*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
}
</style>
