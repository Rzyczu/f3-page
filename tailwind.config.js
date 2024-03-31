/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./dist/*.{html,js}"],
  theme: {
    container: {
      margin: {
        DEFAULT: '1rem',
        sm: '2rem',
        md: '3rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
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
        'gray': {light: '#C4C2C1'}
      },
      fontFamily: {
        serif: ['Inter', 'sans-serif']
      },
      extend:{
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

