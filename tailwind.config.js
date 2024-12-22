/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js}"],
  theme: {
    container: {
      padding: {
        DEFAULT: '1.5rem',
        sm: '2rem',
        md: '3rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    fontSize: {
      '2xs': ['0.625rem'],
      xs: ['0.75rem'],
      sm: ['0.875rem'],
      base: ['1rem'],
      lg: ['1.125rem'],
      xl: ['1.25rem'],
      '2xl': ['1.5rem'],
      '3xl': ['1.875rem'],
      '4xl': ['2.25rem'],
      '5xl': ['3rem'],
      '6xl': ['3.75rem'],
    },
    colors: {
      transparent: 'transparent',
      primary: {
        light: '#B3A2CE',
        DEFAULT: '#714C98',
        dark: '#532984',
      },
      'white': '#FEFBF7',
      'black': '#000000',
      'gray': { light: '#C4C2C1' }
    },
    fontFamily: {
      'montserrat': ['Montserrat'],
    },
    extend: {
      gradientColorStopPositions: {
        '1/3': '33.33333333333333333%',
        '2/3': '66.6666666666666666666%',
        '1/4': '25%',
        '3/4': '75%'
      },
      translate: {
        'half-logo': '45%', //44.744356936%
      },
    },
  },
  plugins: [],
}

