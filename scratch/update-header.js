const fs = require('fs');
const path = 'aureus-theme/header.php';
let content = fs.readFileSync(path, 'utf8');

// Replace Logo logic
const logoSearchStr = `<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 shrink-0 mr-2 xl:mr-6">
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"
            alt="<?php bloginfo( 'name' ); ?>"
            class="h-9 xl:h-10 w-auto object-contain"
            onerror="this.style.display='none'; document.getElementById('logo-fallback').style.display='flex';"
          />`;

const logoReplacementStr = `<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
          <div id="logo" class="flex items-center shrink-0 mr-2 xl:mr-6 custom-logo-wrap">
            <?php the_custom_logo(); ?>
          </div>
        <?php else : ?>
        <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 shrink-0 mr-2 xl:mr-6">
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"
            alt="<?php bloginfo( 'name' ); ?>"
            class="h-9 xl:h-10 w-auto object-contain"
            onerror="this.style.display='none'; document.getElementById('logo-fallback').style.display='flex';"
          />`;

content = content.replace(logoSearchStr, logoReplacementStr);

// Add closing php tag for else statement after the fallback SVG
const fallbackEndStr = `          </div>
        </a>`;
const fallbackEndReplacementStr = `          </div>
        </a>
        <?php endif; ?>`;
content = content.replace(fallbackEndStr, fallbackEndReplacementStr);

// Add Search Icon to Desktop Nav
const navEndStr = `            'menu_class'     => 'desktop-menu',
        ) );
        ?>`;
const navSearchAddition = `            'menu_class'     => 'desktop-menu',
        ) );
        ?>
        <!-- Search Form Toggle -->
        <div class="ml-auto hidden lg:flex items-center">
            <button id="search-toggle" aria-label="Toggle search" class="text-gray-600 hover:text-blue-600 p-2 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
            </button>
            <div id="search-bar" class="absolute top-full right-0 mt-2 mr-4 bg-white shadow-xl rounded-lg p-3 w-72 opacity-0 invisible transition-all duration-300 translate-y-[-10px]">
                <form role="search" method="get" class="flex relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" class="w-full rounded bg-gray-50 border-none px-4 py-2.5 text-sm focus:ring-1 focus:ring-blue-500" placeholder="<?php echo esc_attr_e( 'Tìm kiếm...', 'aureus' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="absolute right-0 top-0 bottom-0 px-3 text-gray-400 hover:text-blue-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 21l-4.35-4.35"/><circle cx="11" cy="11" r="8"/></svg>
                    </button>
                </form>
            </div>
        </div>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggle = document.getElementById('search-toggle');
            var bar = document.getElementById('search-bar');
            if(toggle && bar) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    bar.classList.toggle('opacity-0');
                    bar.classList.toggle('invisible');
                    bar.classList.toggle('translate-y-[-10px]');
                    if(!bar.classList.contains('invisible')) {
                        bar.querySelector('input').focus();
                    }
                });
            }
        });
        </script>`;
content = content.replace(navEndStr, navSearchAddition);

fs.writeFileSync(path, content, 'utf8');
console.log('header.php updated with custom-logo and search bar.');
