/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/styles/input.css",
    "./**/**/**/*.{html,js,php}",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        primary: '#3dd577',
      },
    },
    container: {
      maxWidth: {
        'sm': '640px',
        'md': '768px',
        'lg': '1024px',
        'xl': '1024px',
        
      }
    },
  },
}