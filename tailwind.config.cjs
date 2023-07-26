// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  safelist: [
    {
      pattern: /^(?!(?:scroll|bottom)$)m\w?-/,
      variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
  ],
  theme: {
    colors: {
      inherit: 'inherit',
      current: 'currentColor',
      transparent: 'transparent',
      black: '#000',
      white: '#fff',
      light: '#FAF2EA',
      lightSecondary: '#262626',
      dark: '#414642',
      darkSecondary: '#FFF',
      headers: '#1E1E1E',
      headersSecondary: '#FFF',
      accent: '#C6663F',
      accentSecondary: '#F0F0F0',
    },
    fontFamily: {
      sans: [
        '"League Spartan"',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ],
      serif: [
        'Cormorant',
        'serif'
      ]
    },
    fontSize: {
      xs: 12 / 16 + 'rem',
      sm: 14 / 16 + 'rem',
      base: 16 / 16 + 'rem',
      lg: 18 / 16 + 'rem',
      xl: 20 / 16 + 'rem',
      '2xl': 24 / 16 + 'rem',
      '3xl': 32 / 16 + 'rem',
      '4xl': 40 / 16 + 'rem',
      '5xl': 44 / 16 + 'rem',
      '6xl': 56 / 16 + 'rem',
      '7xl': 64 / 16 + 'rem',
      '8xl': 72 / 16 + 'rem',
      '9xl': 96 / 16 + 'rem',
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1270px',
    },
    container: {
      center: true,
      padding: {
        DEFAULT: 'calc( var(--gutter) * 2 )',
        lg: '3.125rem', // 50px
      }
    },
    extend: {
      spacing: {
        gutter: 'var(--gutter, 1rem )', // 16px
        'gutter-full': 'calc( var(--gutter) * 2 )', //32px
      },
    },
  },
  plugins: [],
};
