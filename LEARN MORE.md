# Learn More
## Full tree structure
The base project tree looks like this:

```
webpage-test
├── Assets
│   ├── Authors
│   │   └── /* Author pictures (if needed) */
│   ├── Article Name
│   │   ├── /* Assets for article */
│   └── Thumbnails
│       ├── Default.png       /* Fallback thumbnail */
│       └── Article Name.png  /* Article thumbnail */
├── Files
│   ├── Screenshots
│   │   └── /* README screenshots */
│   ├── Stylesheets
│   │   ├── Auto
│   │   │   └── Theme Name.css
│   │   ├── Dark
│   │   │   └── Theme Name.css
│   │   ├── Light
│   │   │   └── Theme Name.css
│   │   ├── General.css
│   │   ├── MediaQueries.css
│   │   └── Style.css
│   ├── Icon.png
│   ├── Manifest.webmanifest
│   └── Scripts.js
├── PHP
│   ├── Files
│   │   ├── Authors
│   │   │   └── /* Author cards */
│   │   ├── cat-Category Name
│   │   │   └── Article Name;;Author.php
│   │   ├── Parts
│   │   │   └── /* Article parts (1-5) and comments */
│   │   ├── All.php
│   │   ├── Categories.php
│   │   └── Index.php
│   ├── Output
│   │   └── /* Output HTML files */
│   └── Generate.php
├── /* HTML content from Output folder */
└── README.md
```

TODO:
- Better documentation
- Better performance
- Improve desktop layout