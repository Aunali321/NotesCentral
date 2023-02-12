/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "media",
  content: ["./src/**/*.{html,js,php}", "./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {},
  },
  plugins: [require("flowbite/plugin"), require("daisyui")],
  daisyui: {
    themes: ["bumblebee", "night"],
    darkTheme: "night",
  },
};
