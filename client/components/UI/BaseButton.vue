<template>
  <button
    class="btn leading-relaxed font-medium flex items-center cursor-pointer border shadow hover:shadow-lg focus:outline-none focus:shadow-outline"
    :class="btnClasses"
    v-bind="$attrs"
    v-on="$listeners"
  >
    <slot></slot>
  </button>
</template>
<script>
  export default {
    inheritAttrs: false,
    props: {
      color: {
        type: String,
        default: "teal"
      },
      size: {
        type: String,
        default: "md" //sm, md, lg
      },
      outline: Boolean,
      icon: Boolean,
      round: Boolean
    },
    computed: {
      colorClasses() {
        const color = this.color;
        const baseClasses = `bg-${color}-500 text-${color}-100 border-${color}-500 hover:bg-${color}-700 hover:border-${color}-700 hover:text-white`;
        const outlineClasses = `border-${color}-500 bg-white text-${color}-500 hover:bg-${color}-500 hover:border-${color}-500 hover:text-white`;
        return this.outline ? outlineClasses : baseClasses;
      },
      sizeClasses() {
        const isIcon = this.icon;
        const sizeMappings = {
          sm: `h-8 text-sm ${isIcon ? "px-2" : "px-4"}`,
          md: `h-10 ${isIcon ? "px-3" : "px-6"}`,
          lg: `text-lg h-12 ${isIcon ? "px-4" : "px-12"}`
        };

        return sizeMappings[this.size] || sizeMappings.md;
      },
      btnClasses() {
        const borderRadiusClasses = this.round ? "rounded-full" : "rounded";
        return `${this.colorClasses} ${this.sizeClasses} ${borderRadiusClasses}`;
      }
    }
  };
</script>
