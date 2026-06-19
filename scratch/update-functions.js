const fs = require('fs');
const path = 'aureus-theme/functions.php';
let content = fs.readFileSync(path, 'utf8');

// Add custom logo support if not exists
if (!content.includes("add_theme_support( 'custom-logo' )")) {
    const setupHook = "add_theme_support( 'customize-selective-refresh-widgets' );";
    content = content.replace(setupHook, setupHook + "\n\n\t// Custom Logo Support\n\tadd_theme_support( 'custom-logo', array(\n\t\t'height'      => 80,\n\t\t'width'       => 200,\n\t\t'flex-width'  => true,\n\t\t'flex-height' => true,\n\t) );");
}

// Add script defer function if not exists
if (!content.includes('aureus_defer_scripts')) {
    content += `
/**
 * Defer JavaScripts
 * Deferring loading of JS files to optimize performance and Core Web Vitals
 */
function aureus_defer_scripts( $tag, $handle, $src ) {
    // List of scripts to defer
    $defer_scripts = array( 
        'tailwindcss',
        'jquery-slim',
        'lodash',
        'gsap',
        'gsap-scrolltrigger',
        'aureus-main-js'
    );
    
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . esc_url( $src ) . '" defer="defer"></script>' . "\\n";
    }
    
    return $tag;
}
add_filter( 'script_loader_tag', 'aureus_defer_scripts', 10, 3 );
`;
}

fs.writeFileSync(path, content, 'utf8');
console.log('functions.php updated with custom-logo and defer script.');
