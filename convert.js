const fs = require('fs');

let css = fs.readFileSync('styles.css', 'utf-8');

const colors = [
  ['#ffffff', 'var(--color-white)'],
  ['#fff', 'var(--color-white)'],
  ['#1a56db', 'var(--color-primary)'],
  ['#1446c0', 'var(--color-primary-dark)'],
  ['#1e40af', 'var(--color-primary-darker)'],
  ['#1e3a8a', 'var(--color-primary-darkest)'],
  ['#eff6ff', 'var(--color-blue-50)'],
  ['#f0f6ff', 'var(--color-blue-50)'],
  ['#f0f4ff', 'var(--color-blue-50)'],
  ['#eef2fb', 'var(--color-blue-50)'],
  ['#e0eaff', 'var(--color-blue-100)'],
  ['#dbeafe', 'var(--color-blue-100)'],
  ['#c7d9f7', 'var(--color-blue-200)'],
  ['#bfdbfe', 'var(--color-blue-200)'],
  ['#93c5fd', 'var(--color-blue-300)'],
  ['#9db8e8', 'var(--color-blue-300)'],
  ['#f8faff', 'var(--color-bg-light)'],
  ['#111827', 'var(--color-gray-900)'],
  ['#0f172a', 'var(--color-gray-900)'],
  ['#374151', 'var(--color-gray-700)'],
  ['#6b7280', 'var(--color-gray-500)'],
  ['#9ca3af', 'var(--color-gray-400)'],
  ['#e5e7eb', 'var(--color-gray-200)'],
  ['#f3f4f6', 'var(--color-gray-100)'],
  ['#e5eaf4', 'var(--color-gray-border)'],
  ['#e8edf5', 'var(--color-gray-border)']
];

const rootVars = `:root {
  --color-primary: #1a56db;
  --color-primary-dark: #1446c0;
  --color-primary-darker: #1e40af;
  --color-primary-darkest: #1e3a8a;
  --color-blue-50: #eff6ff;
  --color-blue-100: #e0eaff;
  --color-blue-200: #c7d9f7;
  --color-blue-300: #93c5fd;
  --color-bg-light: #f8faff;
  --color-white: #ffffff;
  --color-gray-900: #111827;
  --color-gray-700: #374151;
  --color-gray-500: #6b7280;
  --color-gray-400: #9ca3af;
  --color-gray-200: #e5e7eb;
  --color-gray-100: #f3f4f6;
  --color-gray-border: #e5eaf4;
  --color-primary-rgb: 26, 86, 219;
}

`;

// 1. Replace Hex colors
// Let's first read it without rootVars since we already might have prepended it in previous run.
// If it already has :root, remove it so we can append it cleanly.
if (css.includes(':root {')) {
  // Strip previous root block
  css = css.replace(/:root\s*\{[^}]*\}\s*/m, '');
}

for (const [hex, variable] of colors) {
  const regex = new RegExp(hex + '(?![a-zA-Z0-9])', 'gi');
  css = css.replace(regex, variable);
}

css = css.replace(/rgba\(\s*26\s*,\s*86\s*,\s*219\s*,/g, 'rgba(var(--color-primary-rgb),');
css = css.replace(/rgb\(\s*26\s*,\s*86\s*,\s*219\s*\)/g, 'rgb(var(--color-primary-rgb))');

// 3. Process px -> rem/em
// Notice the literal \n for splitting lines properly
const lines = css.split('\n');
const processedLines = lines.map(line => {
  if (line.includes('@media')) {
    return line.replace(/\b(\d+(?:\.\d+)?)px\b/g, (match, p1) => {
      return (parseFloat(p1) / 16) + 'em';
    });
  }
  
  return line.replace(/\b(\d+(?:\.\d+)?)px\b/g, (match, p1) => {
    const val = parseFloat(p1);
    if (val > 2) {
      let rem = val / 16;
      rem = Math.round(rem * 10000) / 10000;
      return rem + 'rem';
    }
    return match;
  });
});

css = rootVars + processedLines.join('\n');
fs.writeFileSync('styles.css', css);
console.log('CSS conversion completed successfully.');
