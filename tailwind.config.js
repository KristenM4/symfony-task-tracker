/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/styles/*.{js,jsx,ts,tsx,vue}",
    "./templates/**/*.html.twig"
  ],
  safelist: [
    'opacity-0',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

