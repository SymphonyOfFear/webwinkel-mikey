/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {
      colors: {
        'background': '#0A141F',
        'foreground': '#F3F6F7',
        'primary': '#1C75BC',
        'secondary': '#134A7C',
        'sidebar-background': '#16222D',
        'navbar-background': '#0D1F2A',
        'hover': '#1C75BC',
        'footer-background': '#1E2A34',
        'text-color': '#F3F6F7',
      },
      spacing: {
        'sidebar-width': '250px',
        'header-height': '80px',
        'footer-height': '60px',
      },
      fontFamily: {
        'body': ['Jost', 'sans-serif'],
      }
    },
  },
  plugins: [],
}

