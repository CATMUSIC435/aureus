const fs = require('fs');

function addBreadcrumbs(filePath) {
    let content = fs.readFileSync(filePath, 'utf8');
    
    if (content.includes('</header>') && !content.includes('yoast_breadcrumb')) {
        const breadcrumbsCode = `</header>\n\n    <!-- ── Breadcrumbs ── -->\n    <?php if ( function_exists('yoast_breadcrumb') ) { ?>\n        <div class="max-w-screen-md mx-auto px-6 xl:px-10 pt-8 pb-0">\n            <?php yoast_breadcrumb( '<p id="breadcrumbs" class="text-sm text-gray-500 font-medium">','</p>' ); ?>\n        </div>\n    <?php } ?>`;
        content = content.replace('</header>', breadcrumbsCode);
    }

    fs.writeFileSync(filePath, content, 'utf8');
}

addBreadcrumbs('aureus-theme/single.php');
addBreadcrumbs('aureus-theme/page.php');
console.log('Breadcrumbs added.');
