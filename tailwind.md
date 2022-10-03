# Breakpoints

These are our default breakpoints (mobile first so there is no xs)

```
screens: {
  sm: '640px',
  md: '768px',
  lg: '1024px',
  xl: '1280px',
}
```

# Colors

Here is where all the brand colors are defined. Personally I like obfescating the colors to names that invoke some sort of connection, but are not specific (just in case they change). i.e. Instead of Aqua -> Pacific. Pink -> Reef.

```
{
  transparent: 'transparent',
  current: 'currentColor',
  ...
  black: '#000',
  white: '#fff',
}
```


# Fonts

These don't have to be labelled sans / serif / mono. We could call the sections headline / default or anything. Reading from top to bottom (or left to right) shows order of fallback. The first being the preferred font, followed by it's fallback (and so on).

```
fontFamily: {
  sans: [
    '"Helvetica Neue"',
    'Arial',
    'sans-serif',
  ],
  serif: ['Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
  mono: ['Menlo', 'Monaco', 'Consolas', '"Liberation Mono"', '"Courier New"', 'monospace'],
}
```

# Font Size

The base font is defined in the `body` of the document and all font modifications are rems of the base (default 16px).

```
fontSize: {
  xs: '0.75rem', // 12px
  sm: '0.875rem', // 14px
  base: '1rem', // 16px
  lg: '1.125rem', // 18px
  xl: '1.25rem', // 20px
  '2xl': '1.5rem', // 24px
  '3xl': '2rem', // 32px
  '4xl': '3rem', // 48px
  'hero': '4rem', // 64px special one for hero headlines
}
```

# Font Weight

This is usually defined by the available font weights in the design. Ideally there would only by 2-3 weights in our final file. (thin, normal, bold)

```
fontWeight: {
  hairline: '100',
  thin: '200',
  light: '300',
  normal: '400',
  medium: '500',
  semibold: '600',
  bold: '700',
  extrabold: '800',
  black: '900',
}
```

# Leading / Tracking (aka letter spacing & line height)

Again, these are also multiples of the base font size. That way if we adjust the base font, all our leading / tracking rules would automatically adjust.

```
letterSpacing: {
  tighter: '-0.05em',
  tight: '-0.025em',
  normal: '0',
  wide: '0.025em',
  wider: '0.05em',
  widest: '0.1em',
},
lineHeight: {
  none: '1',
  tight: '1.25',
  snug: '1.375',
  normal: '1.5',
  relaxed: '1.625',
  loose: '2',
  '3': '.75rem',
  '4': '1rem',
  '5': '1.25rem',
  '6': '1.5rem',
  '7': '1.75rem',
  '8': '2rem',
  '9': '2.25rem',
  '10': '2.5rem',
}
```

# Spacing (for both Padding & Margins)

These spacing rules (aside from 1px - hairline) are relative to the base font size (default of 16px). A rem is basically a multiple of the base font. i.e. p-3 rule is a padding rule (0.75rem * 16px) = 12px. All size rules are based on rems and are multiples of the base font.

```
spacing: {
  px: '1px',
  '0': '0',
  '1': '0.25rem',
  '2': '0.5rem',
  '3': '0.75rem',
  '4': '1rem',
  '5': '1.25rem',
  '6': '1.5rem',
  '8': '2rem',
  '10': '2.5rem',
  '12': '3rem',
  '16': '4rem',
  '20': '5rem',
  '24': '6rem',
  '32': '8rem',
  '40': '10rem',
  '48': '12rem',
  '56': '14rem',
  '64': '16rem',
}
```

# Radius

```
borderRadius: {
  none: '0',
  sm: '0.125rem',
  default: '0.25rem',
  md: '0.375rem',
  lg: '0.5rem',
  full: '9999px',
}
```

# Border Thickness

```
borderWidth: {
  default: '1px',
  '0': '0',
  '2': '2px',
  '4': '4px',
  '8': '8px',
}
```

# Drop Shadows

A limited set of dropshadows (aka box-shadows in css) are important for small design inconsistancies.

```
boxShadow: {
  xs: '0 0 0 1px rgba(0, 0, 0, 0.05)',
  sm: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
  default: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
  md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
  lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
  xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
  '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
  inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
  outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
  none: 'none',
}
```

# Opacity

Some elements may be faded. We usually defined a few rules so there are no opacity: 0.432
```
opacity: {
  '0': '0',
  '25': '0.25',
  '50': '0.5',
  '75': '0.75',
  '100': '1',
}
```

# Grid Widths

We don't really use formal grids anymore the way we did a few years back because the world has moved to flexboxes or css grids. This allows us to have an endless array of grid sizes we never used to. Usually we go with these but more can be added

```
width: theme => ({
  auto: 'auto',
  ...theme('spacing'), // These rules also import the spacing rules above
  '1/2': '50%',
  '1/3': '33.333333%',
  '2/3': '66.666667%',
  '1/4': '25%',
  '2/4': '50%',
  '3/4': '75%',
  '1/5': '20%',
  '2/5': '40%',
  '3/5': '60%',
  '4/5': '80%',
  '1/6': '16.666667%',
  '2/6': '33.333333%',
  '3/6': '50%',
  '4/6': '66.666667%',
  '5/6': '83.333333%',
  '1/12': '8.333333%',
  '2/12': '16.666667%',
  '3/12': '25%',
  '4/12': '33.333333%',
  '5/12': '41.666667%',
  '6/12': '50%',
  '7/12': '58.333333%',
  '8/12': '66.666667%',
  '9/12': '75%',
  '10/12': '83.333333%',
  '11/12': '91.666667%',
  full: '100%',
  screen: '100vw', // this is a special rule that ensures 100% of the viewport height
})
```

Keep in mind these are just the basic rules and we can extend or modify to fit the design needs.
