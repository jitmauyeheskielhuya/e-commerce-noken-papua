/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/*.php",
    "./app/Views/**/*.php",
    "./app/Views/**/**/*.php",
    "./app/Views/**/**/**/*.php",
    "./src/*.js",
    "./app/Views/**/*.js",
    "./app/Views/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  variants: {
    extend: {
      display: ['group-focus']
    },
  },
  plugins: [],

}

