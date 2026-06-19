const fs = require('fs');
const path = 'aureus-theme/front-page.php';
let content = fs.readFileSync(path, 'utf8');

// The Partners section
const t1Start = content.indexOf('<div class="partners-track partners-track--left">') + '<div class="partners-track partners-track--left">'.length;
const t1End = content.indexOf('</div>\n      </div>\n\n      <!-- ROW 2: scroll right -->');
const t1Static = content.slice(t1Start, t1End);

const t1ACF = `
          <?php if ( function_exists('have_rows') && have_rows('partners_track_1') ) : ?>
            <!-- Set A -->
            <?php while ( have_rows('partners_track_1') ) : the_row(); 
              $is_text = get_sub_field('is_text_only');
            ?>
              <?php if($is_text) : ?>
                <div class="partner-logo-item partner-text-item"><span><?php echo esc_html(get_sub_field('text')); ?></span></div>
              <?php else : 
                $logo = get_sub_field('logo');
                if($logo) :
              ?>
                <div class="partner-logo-item"><img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" /></div>
              <?php endif; endif; ?>
            <?php endwhile; ?>
            <!-- Set B (duplicate for seamless loop) -->
            <?php while ( have_rows('partners_track_1') ) : the_row(); 
              $is_text = get_sub_field('is_text_only');
            ?>
              <?php if($is_text) : ?>
                <div class="partner-logo-item partner-text-item"><span><?php echo esc_html(get_sub_field('text')); ?></span></div>
              <?php else : 
                $logo = get_sub_field('logo');
                if($logo) :
              ?>
                <div class="partner-logo-item"><img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" /></div>
              <?php endif; endif; ?>
            <?php endwhile; ?>
          <?php else : ?>
${t1Static}
          <?php endif; ?>
        `;
content = content.replace(t1Static, t1ACF);


const t2Start = content.indexOf('<div class="partners-track partners-track--right">') + '<div class="partners-track partners-track--right">'.length;
const t2End = content.lastIndexOf('</div>\n      </div>\n    </section>');
const t2Static = content.slice(t2Start, t2End);

const t2ACF = `
          <?php if ( function_exists('have_rows') && have_rows('partners_track_2') ) : ?>
            <!-- Set A -->
            <?php while ( have_rows('partners_track_2') ) : the_row(); 
              $is_text = get_sub_field('is_text_only');
            ?>
              <?php if($is_text) : ?>
                <div class="partner-logo-item partner-text-item"><span><?php echo esc_html(get_sub_field('text')); ?></span></div>
              <?php else : 
                $logo = get_sub_field('logo');
                if($logo) :
              ?>
                <div class="partner-logo-item"><img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" /></div>
              <?php endif; endif; ?>
            <?php endwhile; ?>
            <!-- Set B (duplicate) -->
            <?php while ( have_rows('partners_track_2') ) : the_row(); 
              $is_text = get_sub_field('is_text_only');
            ?>
              <?php if($is_text) : ?>
                <div class="partner-logo-item partner-text-item"><span><?php echo esc_html(get_sub_field('text')); ?></span></div>
              <?php else : 
                $logo = get_sub_field('logo');
                if($logo) :
              ?>
                <div class="partner-logo-item"><img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" /></div>
              <?php endif; endif; ?>
            <?php endwhile; ?>
          <?php else : ?>
${t2Static}
          <?php endif; ?>
        `;
content = content.replace(t2Static, t2ACF);

fs.writeFileSync(path, content, 'utf8');
console.log('Partners injected');
