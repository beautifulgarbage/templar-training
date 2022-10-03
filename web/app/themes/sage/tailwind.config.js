module.exports = {
  content: [
    './resources/assets/purgesafe/**/*.html',
    './resources/views/**/*.php',
    './dist/scripts/**/*.js',
  ],
  safelist: [
    'w-1/2',
    'lg:w-2/3',
    { pattern: /^bg-/ },
    { pattern: /^w-1\/2/ },
    { pattern: /^w-1\/3/ },
    { pattern: /^w-1\/4/ },
    { pattern: /^w-1\/5/ },
    { pattern: /^text-/ },
  ],
  theme: {
    fontFamily: {
      sans: ['DM Sans','system-ui','-apple-system','BlinkMacSystemFont'],
      serif: ['Publica', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
      mono: ['Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
    },
    extend: {
      colors: {
        'brand': 'red',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
