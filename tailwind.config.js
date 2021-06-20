module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      'hmbp': '220px',

      'sssm': '258px',

      'ssmm': '270px',

      'ssm': '320px',

      'iphone6': '375px',

      'fotogaleriebp': '420px',

      'newsbp': '480px',

      'philosophiebp': '580px',

      'sm': '640px',
      // => @media (min-width: 640px) { ... }

      'btnbp': '655',

      'ausstellersmbp': '705px',

      'md': '768px',
      // => @media (min-width: 768px) { ... }

      'kontaktbp': '760px',

      'ausstellerbp': '940px',

      'lg': '1024px',
      // => @media (min-width: 1024px) { ... }

      'xl': '1280px',
      // => @media (min-width: 1280px) { ... }

      '2xl': '1536px',
      // => @media (min-width: 1536px) { ... }
    },
    extend: {
      fontFamily: {
        willkommen: ['EB Garamond']
      },
      keyframes: {
        wiggle: {
          "0%, 100%": { transform: "rotate(-3deg)" },
          "50%": { transform: "rotate(3deg)" }
        }
      },
      animation: {
        wiggle: "wiggle 200ms ease-in-out"
      }
    },

  },

  variants: {
    extend: {},
  },
  plugins: [],
}

