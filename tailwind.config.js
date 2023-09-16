/** @type {import('tailwindcss').Config} */
export default {
//module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {
        backgroundImage: (theme) => ({
            'bgImageLogin': "url('/public/images/cover_w1920_h490_struct-org.jpg')",
        }),
    },
  },
  plugins: [],
}

