const fs = require('fs');
const path = 'aureus-theme/assets/css/styles.css';

const css = `
/* ══════════════════ POST & PAGE ENTRY CONTENT ══════════════════ */
.entry-content {
  color: var(--color-gray-700);
  line-height: 1.8;
  font-size: 1.0625rem;
}
.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4 {
  color: var(--color-gray-900);
  font-weight: 700;
  margin-top: 2rem;
  margin-bottom: 1rem;
  line-height: 1.3;
}
.entry-content h1 { font-size: 2.25rem; }
.entry-content h2 { font-size: 1.875rem; }
.entry-content h3 { font-size: 1.5rem; }
.entry-content p {
  margin-bottom: 1.5rem;
}
.entry-content ul, .entry-content ol {
  margin-bottom: 1.5rem;
  padding-left: 1.5rem;
}
.entry-content ul { list-style-type: disc; }
.entry-content ol { list-style-type: decimal; }
.entry-content li { margin-bottom: 0.5rem; }
.entry-content a {
  color: var(--color-primary);
  text-decoration: underline;
  text-underline-offset: 4px;
}
.entry-content a:hover { color: var(--color-primary-darker); }
.entry-content img {
  max-width: 100%;
  height: auto;
  border-radius: 0.75rem;
  margin: 2rem 0;
}
.entry-content blockquote {
  border-left: 4px solid var(--color-primary);
  padding-left: 1rem;
  font-style: italic;
  color: var(--color-gray-500);
  margin: 1.5rem 0;
  background: var(--color-bg-light);
  padding: 1.5rem;
  border-radius: 0 0.5rem 0.5rem 0;
}
`;

fs.appendFileSync(path, css);
console.log('Appended typography CSS.');
