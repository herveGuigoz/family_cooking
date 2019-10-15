<template>
  <div
    class="sidebar block h-screen flex-col items-center bg-brown shadow my-0 p-2 overflow-hidden"
    :class="hover ? 'w-64' : 'w-24'"
    @mouseover="hover = true"
    @mouseleave="hover = false"
  >
    <div class="pt-6 flex flex-row flex-nowrap">
      <nuxt-link to="/">
        <h1 class="brand font-semibold uppercase">Family<br>cooking</h1>
      </nuxt-link>
    </div>


    <nuxt-link to="/">
      <a
        class="hover:bg-beige hover:text-brown text-beige flex flex-no-wrap items-center rounded h-10 my-8 px-2"
        href="#"
      >
        <div class="ml-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 16 16">
            <path
              fill-rule="evenodd"
              d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0 0 13 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 0 0 0-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"
            />
          </svg>
        </div>
        <span class="ml-10 flex-1 text-xl">Search</span>
      </a>
    </nuxt-link>

  </div>
</template>

<script>
export default {
  components: {
  },
  data: () => ({
    hover: false,
  })
}
</script>

<style scoped>
  svg {
    fill: rgb(219, 219, 219);
  }
  .brand {
    line-height: 1.125;
    word-break: break-word;
    color: rgb(0, 209, 178);
  }
  .label {
    font-family: "Avenir-Light", sans-serif;
  }

  a:hover > div > svg {
    fill: rgb(85, 85, 85);
  }

  .sidebar {
    z-index: 1;
    transition: 0.5s;
    overflow-x: hidden;
    white-space: nowrap;
  }

</style>
