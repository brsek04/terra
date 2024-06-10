/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    
  ],
  theme: {
    extend: {
      width: {
        '16': '4rem',
        '64': '16rem',
      },
    },
  },
  variants: {
    extend: {
      display: ['group-hover'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('flowbite/plugin'),
  ],
}

