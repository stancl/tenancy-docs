const defaultTheme = require('tailwindcss/defaultTheme')
const plugin       = require('tailwindcss/plugin')

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
    plugin(function({ addUtilities }) {
      const flexBasis = {
        '.flex-basis-full': {
          'flex-basis': '100%',
        },
        '.flex-basis-auto': {
          'flex-basis': 'auto',
        },
      }

      addUtilities(flexBasis, {
        variants: ['responsive'],
      })
    }),
  ]
}
