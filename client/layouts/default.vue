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
    <transition name="slither">
      <notification-component v-if="notification.show" :message="notification.message" :delay="notification.delay" :options="notification.options"/>
    </transition>
  </div>
</template>
<script>
import { mapState } from 'vuex'
import NavbarComponent from '../components/menu/NavbarComponent'
import SidebarMenuComponent from '../components/menu/SidebarMenuComponent'
import NotificationComponent from "../components/NotificationComponent";
export default {
  components: {
    NavbarComponent,
    SidebarMenuComponent,
    NotificationComponent
  },
  computed: mapState({
    notification: 'notification'
  })
}
</script>
<style>
*,
*:before,
*:after {
  box-sizing: border-box;
  margin: 0;
}
.slither-enter-active, .slither-leave-active {
  transition: transform 0.35s;
}
.slither-enter, .slither-leave-to {
  transform: translateX(110%);
}

.slither-enter-to, .slither-leave {
  transform: translateX(0);
}
</style>
