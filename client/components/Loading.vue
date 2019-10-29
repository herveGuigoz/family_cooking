<template lang="html">
  <div v-if="loading" class="loading-page">
    <figure>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80" width="80" height="80"><path fill="#02d1b2" d="M38 62.5A7.5 7.5 0 1 0 38 77.5A7.5 7.5 0 1 0 38 62.5Z" /><path fill="#02d1b2" d="M38,63c3.86,0,7,3.14,7,7s-3.14,7-7,7s-7-3.14-7-7S34.14,63,38,63 M38,62c-4.418,0-8,3.582-8,8 s3.582,8,8,8s8-3.582,8-8S42.418,62,38,62L38,62z" /><path fill="#02d1b2" d="M38 2.5A4.5 4.5 0 1 0 38 11.5A4.5 4.5 0 1 0 38 2.5Z" /><path fill="#02d1b2" d="M38,3c2.206,0,4,1.794,4,4s-1.794,4-4,4s-4-1.794-4-4S35.794,3,38,3 M38,2c-2.761,0-5,2.239-5,5 s2.239,5,5,5s5-2.239,5-5S40.761,2,38,2L38,2z" /><path fill="#02d1b2" d="M7 36.5A2.5 2.5 0 1 0 7 41.5A2.5 2.5 0 1 0 7 36.5Z" /><path fill="#02d1b2" d="M7,37c1.103,0,2,0.897,2,2s-0.897,2-2,2s-2-0.897-2-2S5.897,37,7,37 M7,36c-1.657,0-3,1.343-3,3 s1.343,3,3,3s3-1.343,3-3S8.657,36,7,36L7,36z" /><path fill="#02d1b2" d="M69 32.5A6.5 6.5 0 1 0 69 45.5A6.5 6.5 0 1 0 69 32.5Z" /><path fill="#02d1b2" d="M69,33c3.308,0,6,2.692,6,6s-2.692,6-6,6s-6-2.692-6-6S65.692,33,69,33 M69,32c-3.866,0-7,3.134-7,7 s3.134,7,7,7s7-3.134,7-7S72.866,32,69,32L69,32z" /><g><path fill="#02d1b2" d="M14 58.5A1.5 1.5 0 1 0 14 61.5A1.5 1.5 0 1 0 14 58.5Z" /><path fill="#02d1b2" d="M14,59c0.551,0,1,0.449,1,1s-0.449,1-1,1s-1-0.449-1-1S13.449,59,14,59 M14,58 c-1.105,0-2,0.895-2,2s0.895,2,2,2s2-0.895,2-2S15.105,58,14,58L14,58z" /></g><g><path fill="#02d1b2" d="M60 10.5A5.5 5.5 0 1 0 60 21.5A5.5 5.5 0 1 0 60 10.5Z" /><path fill="#02d1b2" d="M60,11c2.757,0,5,2.243,5,5s-2.243,5-5,5s-5-2.243-5-5S57.243,11,60,11 M60,10c-3.314,0-6,2.686-6,6 s2.686,6,6,6s6-2.686,6-6S63.314,10,60,10L60,10z" /></g><g><path fill="#02d1b2" d="M16 12.5A3.5 3.5 0 1 0 16 19.5A3.5 3.5 0 1 0 16 12.5Z" /><path fill="#02d1b2" d="M16,13c1.654,0,3,1.346,3,3s-1.346,3-3,3s-3-1.346-3-3S14.346,13,16,13 M16,12c-2.209,0-4,1.791-4,4 s1.791,4,4,4s4-1.791,4-4S18.209,12,16,12L16,12z" /></g><g><path fill="#02d1b2" d="M60 52.5A7.5 7.5 0 1 0 60 67.5A7.5 7.5 0 1 0 60 52.5Z" /><path fill="#02d1b2" d="M60,53c3.86,0,7,3.14,7,7s-3.14,7-7,7s-7-3.14-7-7S56.14,53,60,53 M60,52c-4.418,0-8,3.582-8,8 s3.582,8,8,8s8-3.582,8-8S64.418,52,60,52L60,52z" /></g></svg>
    </figure>
  </div>
</template>

<script>
export default {
  data: () => ({
    loading: false
  }),
  methods: {
    start () {
      this.loading = true
    },
    finish () {
      this.loading = false
    }
  }
}
</script>

<style scoped>
  .loading-page {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    text-align: center;
    font-size: 30px;
    font-family: sans-serif;
  }
  .loading-page svg {
    animation-duration: 1s;
    animation-timing-function: steps(8, end);
  }
  @keyframes spin {
    0% {
      transform: rotate(0deg)
    }

    100% {
      transform: rotate(359deg)
    }
  }
  svg {
    animation-iteration-count: infinite;
    animation-name: spin;
  }
  figure {
    position: relative;
  }
</style>
