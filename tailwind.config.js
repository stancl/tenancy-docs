const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  purge: [
    './source/**/*.md', './source/**/*.php', './source/*.php'
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        mono: ['Fira Code', ...defaultTheme.fontFamily.mono]
      },
    },
  },
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
