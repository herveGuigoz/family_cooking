<template>
  <div class="antialiased h-screen flex flex-col md:flex-row md:flex-nowrap overflow-hidden">
    <div class="md:hidden">
      <navbar />
    </div>
    <div class="hidden md:block flex-none w-full max-w-xxs bg-brown">
      <sidebar-menu-component />
    </div>
    <div class="flex-1">
      <nuxt />
    </div>
  </div>
</template>
<script>
import Navbar from '../components/menu/Navbar'
import SidebarMenuComponent from '../components/menu/SidebarMenuComponent'
export default {
  components: {
    Navbar,
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
