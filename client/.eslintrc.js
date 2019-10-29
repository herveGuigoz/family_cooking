module.exports = {
  root: true,
  env: {
    browser: true,
    es6: true
  },
  extends: [
    "eslint:recommended",
    'plugin:vue/essential',
    'plugin:vue/recommended',
    'standard',
    "@nuxtjs"
  ],
  globals: {
    Atomics: 'readonly',
    SharedArrayBuffer: 'readonly'
  },
  parserOptions: {
    parser: "babel-eslint",
    ecmaVersion: 2019,
    sourceType: 'module'
  },
  plugins: [
    'vue'
  ],
  rules: {
    "no-console": 1, // Allows console.log
    'vue/max-attributes-per-line': 'off'
  }
}
