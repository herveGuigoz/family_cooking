<template>
  <div class="min-h-screen flex flex-col md:flex-row md:flex-nowrap">
    <div class="md:hidden">
      <navbar />
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

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #3b8070;
  color: #3b8070;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #3b8070;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}
</style>
