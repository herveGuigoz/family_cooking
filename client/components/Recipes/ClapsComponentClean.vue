<template>
  <div class="canvas">
    <div id="totalCounter" class="total-counter">{{ totalCount }}</div>
    <div
      @click="onClick"
      id="clap"
      class="clap-container"
      :class="{'scale': bounceHeart}"
    >
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="50" height="50"><path fill="#ed7899" d="M32,56.999c0.768,0.006,1.538-0.196,2.22-0.609c4.26-2.56,13.9-8.76,20.84-16.39 C59.61,35.03,63,29.45,63,23.89C63,14.56,55.44,7,46.11,7c-4.619,0-8.811,1.863-11.854,4.875C34.214,11.916,33.125,13,32,13 c-1.125,0-2.214-1.084-2.256-1.125C26.701,8.863,22.509,7,17.89,7C8.56,7,1,14.56,1,23.89C1,29.45,4.39,35.03,8.94,40 c6.94,7.63,16.58,13.83,20.84,16.39C30.462,56.802,31.232,57.005,32,56.999L32,56.999z"/><path fill="#f283a5" d="M56.874,10.77c4.066,4.418,6.087,8.836,6.045,13.254c-0.013,1.371-1.134,2.476-2.505,2.476l0,0 c-1.413,0-2.498-1.171-2.494-2.584c0-0.009,0-0.018,0-0.026c0-6.56-5.34-11.89-11.89-11.89c-0.932,0-1.857,0.113-2.751,0.328 c-1.098,0.264-2.234-0.246-2.77-1.24l-0.004-0.008c-0.78-1.448,0.028-3.239,1.628-3.621c4.397-1.049,9.453-0.386,14.262,2.895 C56.568,10.472,56.732,10.616,56.874,10.77z"/><path fill="#e0678f" d="M31.994,56.716c-1.071,0-2.155-0.287-3.134-0.888c-3.762-2.311-13.236-8.48-19.933-15.842 c-0.612-0.668-1.219-1.377-1.896-2.216c-2.082-2.578-1.68-6.356,0.898-8.438c2.579-2.082,6.356-1.679,8.438,0.898 c0.518,0.641,0.97,1.17,1.424,1.666c5.834,6.415,14.754,12.112,17.35,13.706c2.824,1.734,3.707,5.429,1.973,8.253 C35.98,55.699,34.011,56.716,31.994,56.716z"/><path fill="#8d6c9f" d="M32.032,57.999c-0.021,0-0.043,0-0.064,0c-0.954,0-1.889-0.26-2.705-0.754 c-4.93-2.961-14.224-9.054-21.063-16.572C2.76,34.731,0,29.084,0,23.89C0,14.025,8.025,6,17.89,6c4.733,0,9.193,1.834,12.558,5.164 C30.723,11.439,31.459,12,32,12s1.277-0.561,1.549-0.832C36.917,7.834,41.377,6,46.11,6C55.975,6,64,14.025,64,23.89 c0,5.194-2.76,10.842-8.203,16.786c-6.836,7.516-16.13,13.608-21.063,16.571C33.921,57.739,32.986,57.999,32.032,57.999z M32,55.999 h0.008c0.619-0.005,1.185-0.156,1.694-0.465c3.897-2.342,13.703-8.604,20.617-16.207C59.417,33.761,62,28.567,62,23.89 C62,15.128,54.872,8,46.11,8c-4.203,0-8.163,1.629-11.151,4.586C34.727,12.819,33.471,14,32,14s-2.727-1.181-2.963-1.418 C26.053,9.629,22.093,8,17.89,8C9.128,8,2,15.128,2,23.89c0,4.678,2.583,9.871,7.678,15.435C16.595,46.93,26.4,53.192,30.295,55.532 c0.514,0.311,1.067,0.467,1.697,0.467H32z"/><path fill="#8d6c9f" d="M49.865 11.584C48.619 11.196 47.319 11 46 11c-.552 0-1 .447-1 1s.448 1 1 1c1.117 0 2.218.166 3.271.494.099.03.199.045.297.045.426 0 .821-.274.955-.703C50.687 12.309 50.393 11.748 49.865 11.584zM56.675 21.334c.113.455.521.759.969.759.08 0 .162-.01.243-.029.536-.134.862-.677.729-1.212-.74-2.974-2.523-5.603-5.021-7.404-.448-.32-1.073-.22-1.396.227-.323.448-.222 1.073.226 1.396C54.54 16.595 56.049 18.819 56.675 21.334zM30.967 52.211c-.174 0-.35-.045-.511-.141-.475-.283-.63-.896-.348-1.371l1.023-1.718c.283-.474.896-.63 1.371-.348.475.283.63.896.348 1.371l-1.023 1.718C31.64 52.037 31.308 52.211 30.967 52.211zM26.674 49.559c-.195 0-.392-.057-.565-.176-.456-.313-.571-.935-.258-1.39l1.132-1.649c.313-.455.935-.572 1.39-.258.456.313.571.935.258 1.39L27.5 49.125C27.306 49.407 26.993 49.559 26.674 49.559zM22.564 46.599c-.216 0-.435-.07-.618-.214-.434-.341-.509-.97-.168-1.404l1.236-1.572c.342-.435.971-.51 1.404-.168.434.341.509.97.168 1.404l-1.236 1.572C23.153 46.468 22.86 46.599 22.564 46.599zM18.635 43.407c-.238 0-.476-.084-.667-.255-.411-.369-.446-1.001-.077-1.412l1.335-1.489c.368-.412 1-.446 1.412-.077.411.369.446 1.001.077 1.412l-1.335 1.489C19.182 43.294 18.909 43.407 18.635 43.407zM14.899 39.979c-.259 0-.518-.1-.714-.3-.386-.395-.38-1.028.014-1.415l1.428-1.4c.395-.386 1.027-.38 1.415.014.386.395.38 1.028-.014 1.415l-1.428 1.4C15.404 39.884 15.151 39.979 14.899 39.979zM11.438 36.26c-.281 0-.561-.118-.758-.348-.36-.418-.313-1.05.105-1.41l1.516-1.305c.419-.36 1.05-.313 1.41.105.36.418.313 1.05-.105 1.41l-1.516 1.305C11.9 36.181 11.668 36.26 11.438 36.26z"/></svg>
    </div>
    <div id="clicker" class="click-counter">
      <span class="counter ">+{{ accCounter }}</span>
    </div>
    <div id="sonar-clap" class="clap-container-sonar"></div>
    <div id="particles" class="particles-container">
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
    </div>
    <div id="particles-2" class="particles-container">
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
    </div>
    <div id="particles-3" class="particles-container">
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
      <div class="triangle">
        <div class="square"></div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "ClapsComponent",
    data: () => ({
      bounceHeart: false,
      accCounter: 0,
      totalCount: 127,
      minDeg: 1,
      maxDeg: 72,
      particlesGroup1IsAnimated: false,
      particlesGroup2IsAnimated: false,
      particlesGroup3IsAnimated: false,
      particlesClasses: [
        {
          class: "pop-top"
        },
        {
          class: "pop-top-left"
        },
        {
          class: "pop-top-right"
        },
        {
          class: "pop-bottom-right"
        },
        {
          class: "pop-bottom-left"
        },
      ]
    }),
    methods : {
      onClick () {
        if (this.accCounter >= 99) {
          return
        }
        this.accCounter ++
        this.totalCount++
        const clap = document.getElementById('clap');
        const particles = document.getElementById('particles');
        const particles2 = document.getElementById('particles-2');
        const particles3 = document.getElementById('particles-3');
        setTimeout(()=> this.upClickCounter(), 1) // let vue update values TODO Verifier qu'il est toujours necessaire de mettre ce timeout
        ;

        // heart bounced animation
        this.bounceHeart = true
        setTimeout(()=> this.bounceHeart = false, 700)

        if (!this.particlesGroup1IsAnimated) {
          this.animateParticles(particles, 700, this.particlesGroup1IsAnimated);
        } else if(!this.particlesGroup2IsAnimated, this.particlesGroup2IsAnimated){
          this.animateParticles(particles2, 700);
        } else if(!this.particlesGroup3IsAnimated, this.particlesGroup3IsAnimated) {
          this.animateParticles(particles3, 700);
        }
      },
      upClickCounter() {
        const clickCounter = document.getElementById("clicker");
        const totalClickCounter = document.getElementById('totalCounter');

        if (clickCounter.classList.contains('first-active')) {
          this.runAnimationCycle(clickCounter, 'active');
        } else {
          this.runAnimationCycle(clickCounter, 'first-active');
        }
        this.runAnimationCycle(totalClickCounter, 'fader');
      },
      runAnimationCycle(el, className, duration) {
        if (el && !el.classList.contains(className)) {
          el.classList.add(className);
        } else {
          el.classList.remove(className);
          void el.offsetWidth; // Trigger a reflow in between removing and adding the class name
          el.classList.add(className);
        }
      },
      runParticleAnimationCycle(el, className, duration) {
        if (el && !el.classList.contains(className)) {
          el.classList.add(className);
          setTimeout(() => {
            el.classList.remove(className);
          }, duration);
        }
      },
      animateParticles(particles, dur, particlesGroup) {
        this.addRandomParticlesRotation(particles.id, this.minDeg, this.maxDeg);
        for(let i = 0; i < this.particlesClasses.length; i++) {
          this.runParticleAnimationCycle(particles.children[i], this.particlesClasses[i].class, dur);
        }
        // Boolean functionality only to activate particles2, particles3 when needed
        particlesGroup = true
        setTimeout(() => {
          particlesGroup = false
        }, dur);
      },
      getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min  + 1)) + min;
      },
      addRandomParticlesRotation(particlesName, minDeg, maxDeg) {
        const particles = document.getElementById(particlesName);
        const randomRotationAngle = this.getRandomInt(minDeg, maxDeg) + 'deg';
        particles.style.transform = `rotate(${randomRotationAngle})`;
      }
    }
  }
</script>

<style scoped>
  .canvas {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 300px;
    height: 300px;
    position: relative;
  }
  .canvas .total-counter {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    position: absolute;
    margin-top: -35px;
    color: gray;
    font-family: sans-serif;
    font-size: 14px;
  }
  .canvas .total-counter.fader {
    animation: fade-in 1400ms forwards;
  }
  .canvas .clap-container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    width: 60px;
    height: 60px;
    z-index: 2;
    cursor: pointer;
  }
  .canvas .clap-container .clap-icon {
    font-size: 30px;
    color: #e0678f; /* rgb(0, 209, 178)  rgb(85, 85, 85) */
    width: 30px;
    height: 30px;
  }
  .canvas .clap-container.scale {
    animation: scaleAndBack 700ms forwards;
  }
  .canvas .click-counter {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 35px;
    height: 35px;
    position: absolute;
    top: 132px;
    background-color: #e0678f;
    border-radius: 50%;
    z-index: 1;
  }
  .canvas .click-counter .counter {
    font-family: sans-serif;
    font-size: 14px;
    color: #fff;
  }
  .canvas .click-counter.first-active {
    animation: first-bump-in 1s forwards;
  }
  .canvas .click-counter.active {
    animation: bump-in 1s forwards;
  }
  .canvas .clap-container-sonar {
    width: 60px;
    height: 60px;
    background: #e0678f;
    border-radius: 50%;
    position: absolute;
    opacity: 0;
    z-index: 0;
  }

  .canvas .particles-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 60px;
    height: 60px;
    position: absolute;
    /* border: 1px solid gray;
     */
    /* z-index: 3;
     */
  }
  .canvas .particles-container .triangle {
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 10px solid red;
    border-bottom: 4px solid transparent;
    position: absolute;
  }
  .canvas .particles-container .triangle .square {
    width: 5px;
    height: 5px;
    background: #e0678f;
    position: absolute;
    left: -15px;
    top: 0;
  }
  .canvas .particles-container .pop-top {
    animation: pop-top 1s forwards;
  }
  .canvas .particles-container .pop-top-left {
    animation: pop-top-left 1s forwards;
  }
  .canvas .particles-container .pop-top-right {
    animation: pop-top-right 1s forwards;
  }
  .canvas .particles-container .pop-bottom-right {
    animation: pop-bottom-right 1s forwards;
  }
  .canvas .particles-container .pop-bottom-left {
    animation: pop-bottom-left 1s forwards;
  }
  @keyframes sonar-wave {
    0% {
      opacity: 0.7;
    }
    100% {
      transform: scale(1.4);
      opacity: 0;
    }
  }
  @keyframes fade-in {
    0% {
      opacity: 0;
    }
    50% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }
  @keyframes pop-top {
    0% {
      transform: translate(0, 0) rotate(0);
      opacity: 0.4;
    }
    100% {
      transform: translate(0, -100px) rotate(0);
      opacity: 0;
    }
  }
  @keyframes pop-top-left {
    0% {
      transform: translate(0, 0) rotate(-55deg);
      opacity: 0.4;
    }
    100% {
      transform: translate(-100px, -50px) rotate(-55deg);
      opacity: 0;
    }
  }
  @keyframes pop-top-right {
    0% {
      transform: translate(0, 0) rotate(55deg);
      opacity: 0.4;
    }
    100% {
      transform: translate(100px, -50px) rotate(55deg);
      opacity: 0;
    }
  }
  @keyframes pop-bottom-right {
    0% {
      transform: translate(0, 0) rotate(135deg);
      opacity: 0.4;
    }
    100% {
      transform: translate(70px, 80px) rotate(135deg);
      opacity: 0;
    }
  }
  @keyframes pop-bottom-left {
    0% {
      transform: translate(0, 0) rotate(-135deg);
      opacity: 0.4;
    }
    100% {
      transform: translate(-70px, 80px) rotate(-135deg);
      opacity: 0;
    }
  }
  @keyframes first-bump-in {
    0% {
      transform: translateY(-65px);
      opacity: 1;
    }
    50% {
      transform: translateY(-80px);
      opacity: 1;
    }
    100% {
      transform: translateY(-100px);
      opacity: 0;
    }
  }
  @keyframes bump-in {
    0% {
      transform: translateY(-80px) scale(0.9);
      opacity: 1;
    }
    50% {
      transform: translateY(-80px) scale(1);
      opacity: 1;
    }
    100% {
      transform: translateY(-100px) scale(1);
      opacity: 0;
    }
  }
  @keyframes scaleAndBack {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.15);
    }
    100% {
      transform: scale(1);
    }
  }
</style>
