const fs = require('fs');
const path = 'aureus-theme/front-page.php';
let content = fs.readFileSync(path, 'utf8');

// 1. Stats Ticker
const statsStart = content.indexOf('<div class="ticker-track" id="ticker-track">') + '<div class="ticker-track" id="ticker-track">'.length;
const statsEnd = content.indexOf('</div><!-- /ticker-track -->');
const statsStatic = content.slice(statsStart, statsEnd);

const statsACF = `
          <?php if ( function_exists('have_rows') && have_rows('stats_list') ) : ?>
            <?php while ( have_rows('stats_list') ) : the_row(); ?>
              <div class="ticker-item">
                <div class="ticker-icon" <?php if(get_sub_field('is_highlighted')) echo 'style="color:#e02424;border-color:#fee2e2;background:#fff5f5;"'; ?> aria-hidden="true">
                  <?php echo get_sub_field('icon_svg'); ?>
                </div>
                <div class="min-w-0">
                  <div class="flex items-baseline gap-0.5">
                    <span class="ticker-num" <?php if(get_sub_field('target_number')) echo 'data-target="'.esc_attr(get_sub_field('target_number')).'"'; ?> <?php if(get_sub_field('suffix')) echo 'data-suffix="'.esc_attr(get_sub_field('suffix')).'"'; ?> <?php if(get_sub_field('is_highlighted')) echo 'style="color:#e02424;"'; ?>><?php echo esc_html(get_sub_field('display_text') ?: '0'); ?></span>
                    <?php if(get_sub_field('suffix')) : ?>
                      <span style="font-size:1.1rem;font-weight:800;<?php echo get_sub_field('is_highlighted') ? 'color:#e02424;' : 'color:#111827;'; ?>"><?php echo esc_html(get_sub_field('suffix')); ?></span>
                    <?php endif; ?>
                  </div>
                  <p class="ticker-cat"><?php echo esc_html(get_sub_field('title')); ?></p>
                  <p class="ticker-sub"><?php echo esc_html(get_sub_field('subtitle')); ?></p>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
${statsStatic}
          <?php endif; ?>
`;
content = content.replace(statsStatic, statsACF);

// 2. Companies Cards
const coStart = content.indexOf('<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-2 lg:gap-4" id="co-cards">') + '<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-2 lg:gap-4" id="co-cards">'.length;
const coEnd = content.indexOf('</div><!-- /co-cards -->');
const coStatic = content.slice(coStart, coEnd);

const coACF = `
          <?php if ( function_exists('have_rows') && have_rows('companies_list') ) : ?>
            <?php while ( have_rows('companies_list') ) : the_row(); 
              $logo = get_sub_field('logo');
              $image = get_sub_field('image');
              $link = get_sub_field('link');
            ?>
            <div class="group bg-white border border-[#e5eaf4] rounded-[0.875rem] overflow-hidden flex flex-col transition-all duration-300 hover:shadow-[0_0.625rem_2.5rem_rgba(26,86,219,0.11)] hover:-translate-y-1">
              <div class="pt-[0.875rem] px-4 pb-[0.625rem] flex items-center gap-[0.625rem] border-b border-[#eff6ff]">
                <?php if($logo) : ?>
                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="w-9 h-9 object-contain mix-blend-multiply shrink-0" />
                <?php endif; ?>
                <div class="min-w-0">
                  <p class="text-[0.6875rem] font-extrabold uppercase tracking-[0.08em] text-[#1e3a8a] whitespace-nowrap"><?php echo esc_html(get_sub_field('name')); ?></p>
                  <div class="inline-flex items-center gap-1 mt-[0.1875rem]">
                    <span class="text-[0.5938rem] text-gray-500 font-medium whitespace-nowrap"><?php echo esc_html(get_sub_field('category')); ?></span>
                  </div>
                </div>
              </div>
              <div class="relative w-full aspect-video overflow-hidden">
                <?php if($image) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105" />
                <?php endif; ?>
              </div>
              <div class="p-4 pb-[1.125rem] flex flex-col flex-1">
                <p class="text-[0.7813rem] text-gray-500 leading-[1.65] flex-1 mb-[0.875rem]"><?php echo esc_html(get_sub_field('description')); ?></p>
                <?php if($link) : ?>
                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">
                  <?php echo esc_html($link['title'] ? $link['title'] : 'Learn More'); ?>
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
                <?php endif; ?>
              </div>
            </div>
            <?php endwhile; ?>
          <?php else : ?>
${coStatic}
          <?php endif; ?>
`;
content = content.replace(coStatic, coACF);

// 3. Investor Pillars
const pStart = content.indexOf('<div class="ir-pillars py-8">') + '<div class="ir-pillars py-8">'.length;
const pEnd = content.indexOf('</div><!-- /ir-pillars -->');
const pStatic = content.slice(pStart, pEnd);

const pACF = `
          <?php if ( function_exists('have_rows') && have_rows('investor_pillars') ) : ?>
            <?php while ( have_rows('investor_pillars') ) : the_row(); ?>
            <div class="pillar-item">
              <div class="pillar-icon" aria-hidden="true">
                <?php echo get_sub_field('icon_svg'); ?>
              </div>
              <p class="pillar-label"><?php echo esc_html(get_sub_field('title')); ?></p>
              <p class="pillar-sub"><?php echo esc_html(get_sub_field('subtitle')); ?></p>
            </div>
            <?php endwhile; ?>
          <?php else : ?>
${pStatic}
          <?php endif; ?>
`;
content = content.replace(pStatic, pACF);

// 4. Partners
const partStart = content.indexOf('<div class="partners-track partners-track--left">') + '<div class="partners-track partners-track--left">'.length;
const partEnd = content.indexOf('</div><!-- /partners-track -->'); // wait, the original html has multiple tracks.
// Let's just write the whole file to avoid messy replacement.
fs.writeFileSync(path, content, 'utf8');
console.log('Repeater injection successful');
