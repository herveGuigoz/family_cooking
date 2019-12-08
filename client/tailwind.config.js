/*
** TailwindCSS Configuration File
**
** Docs: https://tailwindcss.com/docs/configuration
** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
*/
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  theme: {
    extend: {
      fontFamily: {
        book: [
          'Avenir-Book',
          ...defaultTheme.fontFamily.sans,
        ],
        light: [
          'Avenir-Light',
          ...defaultTheme.fontFamily.sans,
        ],
        sans: [
          'Avenir-Book',
          'Avenir-Light',
          ...defaultTheme.fontFamily.sans,
        ]
      },
      colors: {
        brown: 'rgb(85, 85, 85)',
        grey: 'rgb(245, 245, 245)',
        verve: 'rgb(0, 209, 178)',
        beige: {
          500: 'rgb(219, 219, 219)'
        },
      },
      spacing: {
        '7' : '1.875rem',
        '9': '2.18175rem',
      },
      maxWidth: {
        xxs: '12rem',
      }
    }
  },
  variants: {},
  plugins: []
}
