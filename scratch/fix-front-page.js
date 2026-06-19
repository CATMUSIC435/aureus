const fs = require('fs');
const path = 'aureus-theme/front-page.php';
let content = fs.readFileSync(path, 'utf8');

// 1. Hero Tag Line
content = content.replace(
  '<span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#1a56db]">Intelligence</span>',
  `<?php $tag_1 = function_exists('get_field') && get_field('hero_tag_1') ? get_field('hero_tag_1') : 'Intelligence'; ?>
              <span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#1a56db]"><?php echo esc_html($tag_1); ?></span>`
);
content = content.replace(
  '<span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#1a56db]">Innovation</span>',
  `<?php $tag_2 = function_exists('get_field') && get_field('hero_tag_2') ? get_field('hero_tag_2') : 'Innovation'; ?>
              <span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#1a56db]"><?php echo esc_html($tag_2); ?></span>`
);
content = content.replace(
  '<span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#e02424]">Impact</span>',
  `<?php $tag_3 = function_exists('get_field') && get_field('hero_tag_3') ? get_field('hero_tag_3') : 'Impact'; ?>
              <span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#e02424]"><?php echo esc_html($tag_3); ?></span>`
);

// 2. Hero Image
content = content.replace(
  '<img\n                src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"\n                alt="Aureus Global – Building The Future Ecosystem"',
  `<?php $hero_img = function_exists('get_field') && get_field('hero_main_image') ? get_field('hero_main_image') : false; ?>
              <img
                src="<?php echo $hero_img ? esc_url($hero_img['url']) : esc_url( get_template_directory_uri() ) . '/assets/images/logo-aureus-global.png'; ?>"
                alt="<?php echo $hero_img ? esc_attr($hero_img['alt']) : 'Aureus Global – Building The Future Ecosystem'; ?>"`
);

// 3. Watch Intro Text
content = content.replace(
  '<span class="text-[11px] font-bold uppercase tracking-wider text-gray-900">Xem Intro</span>',
  `<span class="text-[11px] font-bold uppercase tracking-wider text-gray-900"><?php echo function_exists('get_field') && get_field('intro_video_text') ? esc_html(get_field('intro_video_text')) : 'Xem Intro'; ?></span>`
);

// 4. Ecosystem Nodes
const ecosystemStaticNodes = `
            <!-- CENTER: AG Logo -->
            <div
              class="node node-center center-node"
              style="left:50%; top:50%;"
              data-title="AUREUS GLOBAL"
              data-desc="Trung tâm hệ sinh thái, kết nối các công ty thành viên trong chiến lược phát triển công nghệ, đầu tư và vận hành."
              data-tag="Global Ecosystem"
            >
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global-no-slogan.png" alt="Aureus Global" style="width:60%; max-width:100px; object-fit:contain; mix-blend-mode:multiply;" />
            </div>

            <!-- NODE: AUREUS HOLDING -->
            <div
              class="node node-small logo-node"
              style="left:50%; top:12%;"
              data-title="AUREUS HOLDING"
              data-desc="Đơn vị định hướng chiến lược, quản trị đầu tư và phát triển hệ sinh thái doanh nghiệp."
              data-tag="Holding"
            >
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-holding.png" alt="Aureus Holding" style="width:65%; max-width:90px; object-fit:contain;" />
            </div>

            <!-- NODE: AUREUS LAB -->
            <div
              class="node node-small logo-node"
              style="left:18%; top:36%;"
              data-title="AUREUS LAB"
              data-desc="Không gian nghiên cứu, thử nghiệm sản phẩm, công nghệ mới, AI, dữ liệu và giải pháp số."
              data-tag="Innovation Lab"
            >
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-labs.png" alt="Aureus Lab" style="width:65%; max-width:90px; object-fit:contain;" />
            </div>

            <!-- NODE: DIP TECH -->
            <div
              class="node node-small logo-node"
              style="left:82%; top:36%;"
              data-title="DIP TECH"
              data-desc="Đơn vị công nghệ phụ trách nền tảng số, phần mềm, tích hợp hệ thống và chuyển đổi số."
              data-tag="Technology"
            >
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dip-tech-3d-cam.png" alt="DIP Tech" style="width:65%; max-width:90px; object-fit:contain;" />
            </div>

            <!-- NODE: AUREUS DIGITAL -->
            <div
              class="node node-small logo-node"
              style="left:30%; top:80%;"
              data-title="AUREUS DIGITAL"
              data-desc="Đơn vị triển khai truyền thông số, thương hiệu, marketing performance và trải nghiệm khách hàng."
              data-tag="Digital Growth"
            >
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-digital.png" alt="Aureus Digital" style="width:65%; max-width:90px; object-fit:contain;" />
            </div>

            <!-- NODE: AUREUS VENTURES -->
            <div
              class="node node-small logo-node"
              style="left:70%; top:80%;"
              data-title="AUREUS VENTURES"
              data-desc="Mảng đầu tư, phát triển dự án, tìm kiếm cơ hội tăng trưởng và mở rộng hệ sinh thái."
              data-tag="Ventures"
            >
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-ventures.png" alt="Aureus Ventures" style="width:65%; max-width:90px; object-fit:contain;" />
            </div>`;

const ecosystemACF = `
            <?php if ( function_exists('have_rows') && have_rows('ecosystem_nodes') ) : ?>
              <?php while ( have_rows('ecosystem_nodes') ) : the_row(); 
                $is_center = get_sub_field('is_center_node');
                $top = get_sub_field('position_top') ?: '50%';
                $left = get_sub_field('position_left') ?: '50%';
                $logo = get_sub_field('logo');
                $classes = $is_center ? 'node node-center center-node' : 'node node-small logo-node';
              ?>
                <div
                  class="<?php echo esc_attr($classes); ?>"
                  style="left:<?php echo esc_attr($left); ?>; top:<?php echo esc_attr($top); ?>;"
                  data-title="<?php echo esc_attr(get_sub_field('title')); ?>"
                  data-desc="<?php echo esc_attr(get_sub_field('description')); ?>"
                  data-tag="<?php echo esc_attr(get_sub_field('tag')); ?>"
                >
                  <?php if($logo): ?>
                  <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" style="width:<?php echo $is_center ? '60%' : '65%'; ?>; max-width:<?php echo $is_center ? '100px' : '90px'; ?>; object-fit:contain; <?php if($is_center) echo 'mix-blend-mode:multiply;'; ?>" />
                  <?php endif; ?>
                </div>
              <?php endwhile; ?>
            <?php else : ?>
${ecosystemStaticNodes}
            <?php endif; ?>
`;
content = content.replace(ecosystemStaticNodes, ecosystemACF);

// 5. News Section Titles
content = content.replace(
  '<p class="news-eyebrow">Tin tức &amp; Sự kiện</p>',
  '<p class="news-eyebrow"><?php echo function_exists("get_field") && get_field("news_section_eyebrow") ? esc_html(get_field("news_section_eyebrow")) : "Tin tức &amp; Sự kiện"; ?></p>'
);
content = content.replace(
  '<h2 class="news-section-title">Cập nhật mới nhất</h2>',
  '<h2 class="news-section-title"><?php echo function_exists("get_field") && get_field("news_section_title") ? esc_html(get_field("news_section_title")) : "Cập nhật mới nhất"; ?></h2>'
);

// 6. Partners Section Titles
content = content.replace(
  '<p class="partners-eyebrow">Đối tác Chiến lược</p>',
  '<p class="partners-eyebrow"><?php echo function_exists("get_field") && get_field("partners_eyebrow") ? esc_html(get_field("partners_eyebrow")) : "Đối tác Chiến lược"; ?></p>'
);
content = content.replace(
  '<h2 class="partners-title">Cùng Kiến tạo Tương lai</h2>',
  '<h2 class="partners-title"><?php echo function_exists("get_field") && get_field("partners_title") ? esc_html(get_field("partners_title")) : "Cùng Kiến tạo Tương lai"; ?></h2>'
);
content = content.replace(
  '<p class="partners-sub">Hợp tác với các doanh nghiệp, tổ chức hàng đầu trong và ngoài nước để xây dựng hệ sinh thái công nghệ bền vững.</p>',
  '<p class="partners-sub"><?php echo function_exists("get_field") && get_field("partners_description") ? esc_html(get_field("partners_description")) : "Hợp tác với các doanh nghiệp, tổ chức hàng đầu trong và ngoài nước để xây dựng hệ sinh thái công nghệ bền vững."; ?></p>'
);

// 7. Fix partners track 2 missing ACF
const track2Start = content.indexOf('<div class="partners-track partners-track--right">') + '<div class="partners-track partners-track--right">'.length;
const track2End = content.lastIndexOf('</div>\n      </div>\n\n    </section>');
const track2Content = content.slice(track2Start, track2End);

const newTrack2 = `
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
${track2Content}
          <?php endif; ?>
        `;
content = content.replace(track2Content, newTrack2);

fs.writeFileSync(path, content, 'utf8');
console.log("Fixed hardcoded fields.");
