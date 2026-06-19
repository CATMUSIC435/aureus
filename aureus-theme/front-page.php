<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The front page template file
 *
 * @package Aureus_Global
 */

get_header();
?>
  <!-- ═══════════════════════════════════════════ HERO SECTION ═══════════════════════════════════════════ -->
  <main>
    <section id="hero" class="hero-section">

      <!-- Decorative concentric circles (globe) -->
      <div class="hero-globe"></div>

      <!-- City silhouette overlay -->
      <div class="hero-city"></div>

      <!-- Content wrapper -->
      <div class="relative z-10 w-full max-w-screen-xl mx-auto px-6 xl:px-10 pt-[68px] flex items-center min-h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center w-full py-20">

          <!-- ── LEFT: Text Content ── -->
          <div class="flex flex-col">

            <!-- Tag line -->
            <div id="hero-tag" class="flex items-center gap-0 mb-6">
              <?php $tag_1 = function_exists('get_field') && get_field('hero_tag_1', 'option') ? get_field('hero_tag_1', 'option') : 'Intelligence'; ?>
              <span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#1a56db]"><?php echo esc_html($tag_1); ?></span>
              <span class="tag-dot bg-[#e02424] mx-2"></span>
              <?php $tag_2 = function_exists('get_field') && get_field('hero_tag_2', 'option') ? get_field('hero_tag_2', 'option') : 'Innovation'; ?>
              <span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#1a56db]"><?php echo esc_html($tag_2); ?></span>
              <span class="tag-dot bg-[#e02424] mx-2"></span>
              <?php $tag_3 = function_exists('get_field') && get_field('hero_tag_3', 'option') ? get_field('hero_tag_3', 'option') : 'Impact'; ?>
              <span class="text-[11px] font-bold tracking-[0.18em] uppercase text-[#e02424]"><?php echo esc_html($tag_3); ?></span>
            </div>

            <!-- H1 -->
            <h1 id="hero-title" class="text-4xl md:text-5xl lg:text-[3.5rem] font-bold text-gray-900 leading-tight mb-5">
              <?php echo function_exists('get_field') && get_field('hero_title', 'option') ? get_field('hero_title', 'option') : 'Building The<br />
              Future <span style="color:#1a56db;">Ecosystem</span>'; ?>
            </h1>

            <!-- Description -->
            <p id="hero-desc" class="text-sm text-gray-500 leading-relaxed max-w-md mb-8">
              <?php echo function_exists('get_field') && get_field('hero_description', 'option') ? get_field('hero_description', 'option') : 'AUREUS GLOBAL kiến tạo và vận hành hệ sinh thái công nghệ
              toàn diện dựa trên trí tuệ nhân tạo, dữ liệu và đổi mới sáng tạo,
              mang lại giá trị bền vững cho doanh nghiệp và xã hội.'; ?>
            </p>

            <!-- CTA Buttons -->
            <div id="hero-ctas" class="flex flex-wrap gap-4 mb-12">
              <a href="#ecosystem"
                class="btn-primary flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.14em] px-6 py-3 rounded"
              >
                Explore Ecosystem
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path d="M5 12h14M13 6l6 6-6 6"/>
                </svg>
              </a>
              <a href="#investor"
                class="btn-outline flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.14em] px-6 py-3 rounded"
              >
                Investor Relations
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path d="M5 12h14M13 6l6 6-6 6"/>
                </svg>
              </a>
            </div>

            <!-- Scroll to discover -->
            <div id="hero-scroll" class="flex items-center gap-3">
              <!-- Mouse icon -->
              <div class="w-[22px] h-[34px] rounded-full border-2 border-gray-400 flex justify-center pt-[6px]">
                <div class="scroll-dot"></div>
              </div>
              <span class="text-[10px] font-semibold uppercase tracking-[0.2em] text-gray-400">Scroll to discover</span>
            </div>
          </div>

          <!-- ── RIGHT: 3D Logo Visual ── -->
          <div id="hero-logo-wrap" class="flex items-center justify-center lg:justify-end relative">

            <!-- Radial glow behind logo -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
              <div style="
                width: 480px; height: 480px; border-radius: 50%;
                max-width: 90vw; max-height: 90vw;
                background: radial-gradient(circle, rgba(26,86,219,0.12) 0%, rgba(26,86,219,0.04) 40%, transparent 70%);
                filter: blur(2px);
              "></div>
            </div>

            <!-- Grid lines decoration -->
            <div class="absolute inset-0 pointer-events-none" style="
              background-image:
                linear-gradient(rgba(26,86,219,0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(26,86,219,0.06) 1px, transparent 1px);
              background-size: 60px 60px;
              border-radius: 50%;
              mask-image: radial-gradient(circle, black 0%, transparent 65%);
              -webkit-mask-image: radial-gradient(circle, black 0%, transparent 65%);
            "></div>

            <!-- Logo platform + float -->
            <div class="logo-platform relative z-10">
              <!-- Glow ring -->
              <div class="absolute -inset-8 rounded-full" style="
                background: radial-gradient(circle, rgba(26,86,219,0.09) 0%, transparent 65%);
                animation: floatLogo 4s ease-in-out infinite;
              "></div>

              <!-- The AG logo -->
              <?php $hero_img = function_exists('get_field') && get_field('hero_main_image', 'option') ? get_field('hero_main_image', 'option') : false; ?>
              <img
                src="<?php echo $hero_img ? esc_url($hero_img['url']) : esc_url( get_template_directory_uri() ) . '/assets/images/logo-aureus-global.png'; ?>"
                alt="<?php echo $hero_img ? esc_attr($hero_img['alt']) : 'Aureus Global – Building The Future Ecosystem'; ?>"
                class="logo-float logo-blend relative z-10"
                style="width: 420px; max-width: 90vw; object-fit: contain;"
                onerror="this.style.opacity='0.3'"
              />

              <!-- Ellipse ground shadow -->
              <div style="
                margin-top: -24px;
                width: 280px; height: 18px;
                border-radius: 50%;
                background: radial-gradient(ellipse, rgba(26,86,219,0.2) 0%, transparent 70%);
                filter: blur(8px);
                margin-left: auto; margin-right: auto;
                animation: floatLogo 4s ease-in-out infinite;
              "></div>
            </div>
          </div>
        </div>
      </div>

      <!-- ── BOTTOM RIGHT: Watch Intro ── -->
      <div id="hero-watch" class="absolute bottom-8 right-0 z-20 hidden md:block" style="filter: drop-shadow(0 4px 12px rgba(0,0,0,0.08));">
        <div class="flex items-center bg-white" style="clip-path: polygon(1.5rem 0, 100% 0, 100% 100%, 0 100%); padding: 1.25rem 2.5rem 1.25rem 3rem;">
          
          <button class="watch-btn" id="watch-intro-btn" aria-label="Watch Intro video">
            <div class="play-circle">
              <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24" style="color:#1a56db">
                <path d="M8 5v14l11-7z"/>
              </svg>
            </div>
            <span class="text-[11px] font-bold uppercase tracking-wider text-gray-900"><?php echo function_exists('get_field') && get_field('intro_video_text', 'option') ? esc_html(get_field('intro_video_text', 'option')) : 'Xem Intro'; ?></span>
          </button>

          <div class="w-px h-4 bg-gray-200 mx-4"></div>

          <span class="text-[11px] font-bold text-gray-900 tracking-wider"><?php echo function_exists('get_field') && get_field('intro_video_duration', 'option') ? esc_html(get_field('intro_video_duration', 'option')) : '01:35'; ?></span>
          
        </div>
      </div>

    </section>

    <!-- ═══════════════════ ECOSYSTEM SECTION ═══════════════════ -->
    <section id="ecosystem" class="bg-white py-20 xl:py-28 overflow-hidden" style="overflow-x:hidden;">
      <div class="max-w-screen-xl mx-auto px-6 xl:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-[340px_1fr] gap-12 xl:gap-16 items-center">

          <!-- LEFT: Text -->
          <div class="eco-left">
            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#1a56db] mb-4">Hệ Sinh Thái</p>
            <h2 class="text-3xl xl:text-4xl font-bold text-gray-900 leading-snug mb-5">
              <?php echo function_exists('get_field') && get_field('eco_title', 'option') ? get_field('eco_title', 'option') : 'Một Tầm Nhìn.<br />Đa Sức Mạnh.'; ?>
            </h2>
            <p class="text-sm text-gray-500 leading-relaxed mb-8 max-w-xs">
              <?php echo function_exists('get_field') && get_field('eco_description', 'option') ? get_field('eco_description', 'option') : 'Hệ sinh thái được vận hành như một cơ thể
              thống nhất, kết nối dữ liệu, công nghệ, con người
              và vốn để tạo ra giá trị đột phá.'; ?>
            </p>
            <a href="#" aria-label="<?php esc_attr_e('Khám phá thêm về Hệ Sinh Thái Aureus Global', 'aureus'); ?>" class="eco-discover inline-flex items-center gap-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#1a56db] hover:gap-3 transition-all duration-300">
              Khám phá thêm
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </div>

          <!-- RIGHT: Network Diagram -->
          <div class="network w-full flex items-center justify-center relative">
            <!-- <svg class="absolute inset-0 w-full h-full pointer-events-none z-[1]" viewBox="0 0 1000 780" preserveAspectRatio="none">
              <polygon class="line" points="500,95 180,285 300,630 700,630 820,285" fill="none" />
              <line class="line connect" x1="500" y1="390" x2="500" y2="95" />
              <line class="line connect" x1="500" y1="390" x2="180" y2="285" />
              <line class="line connect" x1="500" y1="390" x2="820" y2="285" />
              <line class="line connect" x1="500" y1="390" x2="300" y2="630" />
              <line class="line connect" x1="500" y1="390" x2="700" y2="630" />
            </svg> -->

            <!-- <div class="ring ring-1"></div> -->
            <div class="ring ring-2"></div>

            <div class="dot" style="left:50%; top:30%;"></div>
            <div class="dot" style="left:35%; top:60%;"></div>
            <div class="dot" style="left:65%; top:60%;"></div>

            <?php if ( function_exists('have_rows') && have_rows('ecosystem_nodes', 'option') ) : ?>
              <?php while ( have_rows('ecosystem_nodes', 'option') ) : the_row(); 
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
            </div>
            <?php endif; ?>

          </div><!-- /network -->
          
          <div id="tooltip" class="tooltip">
            <div id="tooltipTitle" class="tooltip-title"></div>
            <div id="tooltipDesc" class="tooltip-desc"></div>
            <div id="tooltipTag" class="tooltip-tag"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════════════════ STATS TICKER BAR ═══════════════════ -->
    <section id="stats" class="stats-ticker" aria-label="Key metrics">
      <div class="max-w-screen-2xl mx-auto">
        <div class="ticker-track" id="ticker-track">
          <?php if ( function_exists('have_rows') && have_rows('stats_list', 'option') ) : ?>
            <?php while ( have_rows('stats_list', 'option') ) : the_row(); ?>
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


          <!-- 1: AI Projects -->
          <div class="ticker-item">
            <div class="ticker-icon" aria-hidden="true">
              <!-- Brain/AI icon -->
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                <path d="M12 2a4 4 0 0 1 4 4v1a4 4 0 0 1-4 4 4 4 0 0 1-4-4V6a4 4 0 0 1 4-4z"/>
                <path d="M8 11v2a4 4 0 0 0 8 0v-2"/>
                <path d="M12 17v4M8 21h8"/>
                <circle cx="6" cy="8" r="2"/>
                <circle cx="18" cy="8" r="2"/>
                <line x1="8" y1="8" x2="6" y2="8"/>
                <line x1="16" y1="8" x2="18" y2="8"/>
              </svg>
            </div>
            <div class="min-w-0">
              <div class="flex items-baseline gap-0.5">
                <span class="ticker-num" data-target="120" data-suffix="+">0</span>
                <span style="font-size:1.1rem;font-weight:800;color:#111827;">+</span>
              </div>
              <p class="ticker-cat">AI Projects</p>
              <p class="ticker-sub">Đã triển khai</p>
            </div>
          </div>

          <!-- 2: Enterprise Clients -->
          <div class="ticker-item">
            <div class="ticker-icon" style="color:#e02424;border-color:#fee2e2;background:#fff5f5;" aria-hidden="true">
              <!-- Users/enterprise icon -->
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
              </svg>
            </div>
            <div class="min-w-0">
              <div class="flex items-baseline gap-0.5">
                <span class="ticker-num" data-target="250" data-suffix="+" style="color:#e02424;">0</span>
                <span style="font-size:1.1rem;font-weight:800;color:#e02424;">+</span>
              </div>
              <p class="ticker-cat">Enterprise Clients</p>
              <p class="ticker-sub">Khách hàng doanh nghiệp</p>
            </div>
          </div>

          <!-- 3: Data Assets -->
          <div class="ticker-item">
            <div class="ticker-icon" aria-hidden="true">
              <!-- Database icon -->
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                <ellipse cx="12" cy="5" rx="9" ry="3"/>
                <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/>
                <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>
              </svg>
            </div>
            <div class="min-w-0">
              <div class="flex items-baseline gap-0.5">
                <span class="ticker-num">15PB</span>
                <span style="font-size:1.1rem;font-weight:800;color:#111827;">+</span>
              </div>
              <p class="ticker-cat">Data Assets</p>
              <p class="ticker-sub">Dữ liệu được quản lý</p>
            </div>
          </div>

          <!-- 4: Companies -->
          <div class="ticker-item">
            <div class="ticker-icon" aria-hidden="true">
              <!-- Building icon -->
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                <rect x="3" y="3" width="18" height="18" rx="2"/>
                <path d="M9 3v18M15 3v18M3 9h18M3 15h18"/>
              </svg>
            </div>
            <div class="min-w-0">
              <div class="flex items-baseline gap-0.5">
                <span class="ticker-num" data-target="4" data-suffix="">0</span>
              </div>
              <p class="ticker-cat">Companies</p>
              <p class="ticker-sub">Công ty thành viên</p>
            </div>
          </div>

          <!-- 5: Talents -->
          <div class="ticker-item">
            <div class="ticker-icon" style="color:#e02424;border-color:#fee2e2;background:#fff5f5;" aria-hidden="true">
              <!-- Person icon -->
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
              </svg>
            </div>
            <div class="min-w-0">
              <div class="flex items-baseline gap-0.5">
                <span class="ticker-num" data-target="500" data-suffix="+" style="color:#e02424;">0</span>
                <span style="font-size:1.1rem;font-weight:800;color:#e02424;">+</span>
              </div>
              <p class="ticker-cat">Talents</p>
              <p class="ticker-sub">Nhân sự toàn hệ sinh thái</p>
            </div>
          </div>

          <!-- 6: Countries -->
          <div class="ticker-item">
            <div class="ticker-icon" aria-hidden="true">
              <!-- Globe/gear icon -->
              <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
              </svg>
            </div>
            <div class="min-w-0">
              <div class="flex items-baseline gap-0.5">
                <span class="ticker-num" data-target="10" data-suffix="+">0</span>
                <span style="font-size:1.1rem;font-weight:800;color:#111827;">+</span>
              </div>
              <p class="ticker-cat">Countries</p>
              <p class="ticker-sub">Hiện diện toàn cầu</p>
            </div>
          </div>

        
          <?php endif; ?>
</div><!-- /ticker-track -->
      </div>
    </section>

    <!-- ═══════════════════ OUR COMPANIES SECTION ═══════════════════ -->
    <section id="companies" class="companies-section py-16 xl:py-24">
      <div class="max-w-screen-xl mx-auto px-6 xl:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-[220px_1fr] gap-6 xl:gap-10 items-start">

          <!-- LEFT: Text -->
          <div class="co-left pt-2">
            <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#1a56db] mb-5">Our Companies</p>
            <h2 class="text-2xl xl:text-3xl font-bold text-gray-900 leading-snug mb-5 line-clamp-3">
              <?php echo function_exists('get_field') && get_field('companies_title', 'option') ? get_field('companies_title', 'option') : 'Four Core Pillars. One Strong Ecosystem.'; ?>
            </h2>
            <p class="text-[13px] text-gray-500 leading-relaxed mb-7">
              <?php echo function_exists('get_field') && get_field('companies_description', 'option') ? get_field('companies_description', 'option') : 'Bốn công ty thành viên – bốn năng lực cốt lõi –
              một hệ sinh thái hợp lực để dẫn dắt tương lai.'; ?>
            </p>
            <a href="#ecosystem" aria-label="<?php esc_attr_e('Xem tất cả các công ty thành viên', 'aureus'); ?>" class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.18em] text-[#1a56db] hover:gap-4 transition-all duration-300">
              View All Companies
              <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </div>

          <!-- RIGHT: 4 Company Cards -->
          <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-2 lg:gap-4" id="co-cards">
          <?php if ( function_exists('have_rows') && have_rows('companies_list', 'option') ) : ?>
            <?php while ( have_rows('companies_list', 'option') ) : the_row(); 
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
                  <h3 class="text-[0.6875rem] font-extrabold uppercase tracking-[0.08em] text-[#1e3a8a] whitespace-nowrap"><?php echo esc_html(get_sub_field('name')); ?></h3>
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
                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" aria-label="<?php echo esc_attr($link['title'] ? $link['title'] : 'Tìm hiểu thêm về công ty này'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">
                  <?php echo esc_html($link['title'] ? $link['title'] : 'Learn More'); ?>
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
                <?php endif; ?>
              </div>
            </div>
            <?php endwhile; ?>
          <?php else : ?>


            <!-- Card 1: Aureus Lab -->
            <div class="group bg-white border border-[#e5eaf4] rounded-[0.875rem] overflow-hidden flex flex-col transition-all duration-300 hover:shadow-[0_0.625rem_2.5rem_rgba(26,86,219,0.11)] hover:-translate-y-1">
              <div class="pt-[0.875rem] px-4 pb-[0.625rem] flex items-center gap-[0.625rem] border-b border-[#eff6ff]">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-labs.png" alt="Aureus Lab" class="w-9 h-9 object-contain mix-blend-multiply shrink-0" />
                <div class="min-w-0">
                  <h3 class="text-[0.6875rem] font-extrabold uppercase tracking-[0.08em] text-[#1e3a8a] whitespace-nowrap">Aureus Lab</h3>
                  <div class="inline-flex items-center gap-1 mt-[0.1875rem]">
                    <span class="text-[0.5938rem] text-gray-500 font-medium whitespace-nowrap">R&amp;D – AI – Core Technology</span>
                  </div>
                </div>
              </div>
              <div class="relative w-full aspect-video overflow-hidden">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_lab.png" alt="AI research lab with team working on machine learning" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105" />
              </div>
              <div class="p-4 pb-[1.125rem] flex flex-col flex-1">
                <p class="text-[0.7813rem] text-gray-500 leading-[1.65] flex-1 mb-[0.875rem]">Nghiên cứu, phát triển AI, Machine Learning, Big Data và các công nghệ cốt lõi.</p>
                <a href="#" aria-label="<?php esc_attr_e('Tìm hiểu thêm về công ty này', 'aureus'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">
                  Learn More
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
              </div>
            </div>

            <!-- Card 2: DIP Tech -->
            <div class="group bg-white border border-[#e5eaf4] rounded-[0.875rem] overflow-hidden flex flex-col transition-all duration-300 hover:shadow-[0_0.625rem_2.5rem_rgba(26,86,219,0.11)] hover:-translate-y-1">
              <div class="pt-[0.875rem] px-4 pb-[0.625rem] flex items-center gap-[0.625rem] border-b border-[#eff6ff]">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dip-tech-3d-cam.png" alt="DIP Tech" class="w-9 h-9 object-contain mix-blend-multiply shrink-0" />
                <div class="min-w-0">
                  <h3 class="text-[0.6875rem] font-extrabold uppercase tracking-[0.08em] text-[#1e3a8a] whitespace-nowrap">DIP Tech</h3>
                  <div class="inline-flex items-center gap-1 mt-[0.1875rem]">
                    <span class="text-[0.5938rem] text-gray-500 font-medium whitespace-nowrap">Enterprise Solutions &amp; Operations</span>
                  </div>
                </div>
              </div>
              <div class="relative w-full aspect-video overflow-hidden">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dip_tech.png" alt="Server room enterprise infrastructure" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105" />
              </div>
              <div class="p-4 pb-[1.125rem] flex flex-col flex-1">
                <p class="text-[0.7813rem] text-gray-500 leading-[1.65] flex-1 mb-[0.875rem]">Cung cấp giải pháp công nghệ và vận hành cho doanh nghiệp và tổ chức.</p>
                <a href="#" aria-label="<?php esc_attr_e('Tìm hiểu thêm về công ty này', 'aureus'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">
                  Learn More
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
              </div>
            </div>

            <!-- Card 3: Aureus Digital -->
            <div class="group bg-white border border-[#e5eaf4] rounded-[0.875rem] overflow-hidden flex flex-col transition-all duration-300 hover:shadow-[0_0.625rem_2.5rem_rgba(26,86,219,0.11)] hover:-translate-y-1">
              <div class="pt-[0.875rem] px-4 pb-[0.625rem] flex items-center gap-[0.625rem] border-b border-[#eff6ff]">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-digital.png" alt="Aureus Digital" class="w-9 h-9 object-contain mix-blend-multiply shrink-0" />
                <div class="min-w-0">
                  <h3 class="text-[0.6875rem] font-extrabold uppercase tracking-[0.08em] text-[#1e3a8a] whitespace-nowrap">Aureus Digital</h3>
                  <div class="inline-flex items-center gap-1 mt-[0.1875rem]">
                    <span class="text-[0.5938rem] text-gray-500 font-medium whitespace-nowrap">Digital Growth &amp; Marketing</span>
                  </div>
                </div>
              </div>
              <div class="relative w-full aspect-video overflow-hidden">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_digital.png" alt="Digital marketing analytics dashboard" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105" />
              </div>
              <div class="p-4 pb-[1.125rem] flex flex-col flex-1">
                <p class="text-[0.7813rem] text-gray-500 leading-[1.65] flex-1 mb-[0.875rem]">Tăng trưởng thương hiệu và hiệu quả kinh doanh dựa trên dữ liệu và công nghệ.</p>
                <a href="#" aria-label="<?php esc_attr_e('Tìm hiểu thêm về công ty này', 'aureus'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">
                  Learn More
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
              </div>
            </div>

            <!-- Card 4: Aureus Ventures -->
            <div class="group bg-white border border-[#e5eaf4] rounded-[0.875rem] overflow-hidden flex flex-col transition-all duration-300 hover:shadow-[0_0.625rem_2.5rem_rgba(26,86,219,0.11)] hover:-translate-y-1">
              <div class="pt-[0.875rem] px-4 pb-[0.625rem] flex items-center gap-[0.625rem] border-b border-[#eff6ff]">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-ventures.png" alt="Aureus Ventures" class="w-9 h-9 object-contain mix-blend-multiply shrink-0" />
                <div class="min-w-0">
                  <h3 class="text-[0.6875rem] font-extrabold uppercase tracking-[0.08em] text-[#1e3a8a] whitespace-nowrap">Aureus Ventures</h3>
                  <div class="inline-flex items-center gap-1 mt-[0.1875rem]">
                    <span class="text-[0.5938rem] text-gray-500 font-medium whitespace-nowrap">Technology Investment</span>
                  </div>
                </div>
              </div>
              <div class="relative w-full aspect-video overflow-hidden">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_ventures.png" alt="Smart city skyline technology investment" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105" />
              </div>
              <div class="p-4 pb-[1.125rem] flex flex-col flex-1">
                <p class="text-[0.7813rem] text-gray-500 leading-[1.65] flex-1 mb-[0.875rem]">Đầu tư vào các công ty công nghệ tiềm năng, tạo giá trị dài hạn.</p>
                <a href="#" aria-label="<?php esc_attr_e('Tìm hiểu thêm về công ty này', 'aureus'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">
                  Learn More
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
              </div>
            </div>

          
          <?php endif; ?>
</div><!-- /co-cards -->
        </div>
      </div>
    </section>
        <!-- ═══════════════════ INVESTOR RELATIONS + NEWS SECTION ═══════════════════ -->
    <section id="investor" class="ir-news-section">
      <div class="max-w-screen-xl mx-auto px-6 xl:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr_260px] gap-0 items-center overflow-hidden">

          <!-- LEFT: Investor Relations text -->
          <div class="ir-left py-4 lg:pr-4">
            <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#1a56db] mb-2">Quan hệ Cổ đông</p>
            <h2 class="text-xl xl:text-2xl font-bold text-gray-900 leading-snug mb-2 line-clamp-2">
              <?php echo function_exists('get_field') && get_field('investor_title', 'option') ? get_field('investor_title', 'option') : 'Tầm nhìn Dài hạn. Tăng trưởng Bền vững.'; ?>
            </h2>
            <p class="text-[12.5px] text-gray-500 leading-relaxed mb-2 lg:mb-4 line-clamp-2">
              <?php echo function_exists('get_field') && get_field('investor_description', 'option') ? get_field('investor_description', 'option') : 'Chiến lược dài hạn dựa trên quản trị minh bạch,
              tài chính vững mạnh và đổi mới không ngừng.'; ?>
            </p>
            <a href="#investment" aria-label="<?php esc_attr_e('Tìm hiểu thêm về Quan hệ Cổ đông', 'aureus'); ?>" class="btn-primary inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.14em] px-5 py-2.5 rounded">
              Tìm hiểu thêm
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </div>

          <!-- CENTER: 4 Pillars -->
          <div class="ir-pillars py-8">
          <?php if ( function_exists('have_rows') && have_rows('investor_pillars', 'option') ) : ?>
            <?php while ( have_rows('investor_pillars', 'option') ) : the_row(); ?>
            <div class="pillar-item">
              <div class="pillar-icon" aria-hidden="true">
                <?php echo get_sub_field('icon_svg'); ?>
              </div>
              <p class="pillar-label"><?php echo esc_html(get_sub_field('title')); ?></p>
              <p class="pillar-sub"><?php echo esc_html(get_sub_field('subtitle')); ?></p>
            </div>
            <?php endwhile; ?>
          <?php else : ?>


            <!-- GOVERNANCE -->
            <div class="pillar-item">
              <div class="pillar-icon" aria-hidden="true">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                  <line x1="12" y1="22.08" x2="12" y2="12"/>
                </svg>
              </div>
              <p class="pillar-label">Governance</p>
              <p class="pillar-sub">Quản trị minh bạch</p>
            </div>

            <!-- STRATEGY -->
            <div class="pillar-item">
              <div class="pillar-icon" aria-hidden="true">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                  <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/>
                  <polyline points="16 7 22 7 22 13"/>
                </svg>
              </div>
              <p class="pillar-label">Strategy</p>
              <p class="pillar-sub">Chiến lược dài hạn</p>
            </div>

            <!-- FINANCIALS -->
            <div class="pillar-item">
              <div class="pillar-icon" aria-hidden="true">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                  <rect x="2" y="7" width="20" height="14" rx="2"/>
                  <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                  <line x1="12" y1="12" x2="12" y2="16"/>
                  <line x1="10" y1="14" x2="14" y2="14"/>
                </svg>
              </div>
              <p class="pillar-label">Financials</p>
              <p class="pillar-sub">Tài chính vững mạnh</p>
            </div>

            <!-- ESG & IMPACT -->
            <div class="pillar-item">
              <div class="pillar-icon" aria-hidden="true">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                  <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
              </div>
              <p class="pillar-label">ESG &amp; Impact</p>
              <p class="pillar-sub">Phát triển bền vững</p>
            </div>

          
          <?php endif; ?>
</div><!-- /ir-pillars -->

          <!-- RIGHT: News & Insights -->
          <div class="ir-news py-4 lg:pl-8" id="ir-news-panel">            <!-- News items data (JS will swap) -->
            <div id="news-display">
              <div class="relative">
<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_news.png" alt="Aureus Global 2030 strategic conference event" class="news-card-img" id="news-img" />
             <div class="absolute bottom-2 left-2 rounded-lg px-2 py-1 border border-gray-500/50 hover:border-white">
 <a href="#" class="news-read-more" id="news-link">
                Đọc thêm
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </a>
             </div>
              </div>
              <p class="news-title" id="news-headline">AUREUS GLOBAL công bố tầm nhìn chiến lược 2030</p>
            </div>

            <!-- Navigation -->
            <div class="news-nav" role="navigation" aria-label="News navigation">
              <button class="news-nav-btn" id="news-prev" aria-label="Previous news">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M11 6l-6 6 6 6"/></svg>
              </button>
              <button class="news-nav-btn" id="news-next" aria-label="Next news">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </button>
              <div class="news-dots" role="tablist" aria-label="News slides">
                <button class="news-dot active" role="tab" aria-selected="true" aria-label="News 1"></button>
                <button class="news-dot" role="tab" aria-selected="false" aria-label="News 2"></button>
                <button class="news-dot" role="tab" aria-selected="false" aria-label="News 3"></button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
        <!-- ═══════════════════ NEWS SECTION ═══════════════════ -->
    <section id="news" class="news-section" aria-label="Tin tức & Sự kiện">
      <div class="max-w-screen-xl mx-auto px-6 xl:px-10">

        <!-- Section header -->
        <div class="news-section-header">
          <div>
            <p class="news-eyebrow"><?php echo function_exists("get_field") && get_field('news_section_eyebrow', 'option') ? esc_html(get_field('news_section_eyebrow', 'option')) : "Tin tức &amp; Sự kiện"; ?></p>
            <h2 class="news-section-title"><?php echo function_exists("get_field") && get_field('news_section_title', 'option') ? esc_html(get_field('news_section_title', 'option')) : "Cập nhật mới nhất"; ?></h2>
          </div>
          <a href="#" class="news-view-all">
            Xem tất cả
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>

        <div class="news-layout">

          <!-- LEFT: Featured article (big) -->
          <!-- LEFT: Featured article (big) -->
          <?php
          $featured_news = new WP_Query( array(
              'post_type'           => 'post',
              'posts_per_page'      => 1,
              'ignore_sticky_posts' => 1,
          ) );
          if ( $featured_news->have_posts() ) :
              while ( $featured_news->have_posts() ) : $featured_news->the_post();
          ?>
          <article class="news-featured">
            <div class="news-featured-img-wrap">
              <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('large', array('class' => 'news-featured-img', 'loading' => 'lazy')); ?>
              <?php else : ?>
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_news.png" alt="<?php the_title_attribute(); ?>" class="news-featured-img" loading="lazy" />
              <?php endif; ?>
              <span class="news-badge"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></span>
            </div>
            <div class="news-featured-body">
              <p class="news-date">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                <?php echo get_the_date(); ?>
              </p>
              <h3 class="news-featured-title line-clamp-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="news-featured-excerpt line-clamp-3"><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
              <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Đọc bài viết: %s', 'aureus' ), get_the_title() ) ); ?>" class="news-featured-cta">
                Đọc bài viết
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </a>
            </div>
          </article>
          <?php
              endwhile;
              wp_reset_postdata();
          endif;
          ?>

          <!-- RIGHT: News list (horizontal cards) -->
          <div class="news-list">
          <?php
          $list_news = new WP_Query( array(
              'post_type'           => 'post',
              'posts_per_page'      => 4,
              'offset'              => 1, // Skip the first one which is featured
              'ignore_sticky_posts' => 1,
          ) );
          if ( $list_news->have_posts() ) :
              while ( $list_news->have_posts() ) : $list_news->the_post();
          ?>
            <article class="news-list-item">
              <div class="news-list-thumb">
              <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105', 'loading' => 'lazy')); ?>
              <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_news.png" alt="<?php the_title_attribute(); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 ease-in-out group-hover:scale-105" />
              <?php endif; ?>
              </div>
              <div class="news-list-body">
                <span class="news-badge news-badge--sm"><?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo esc_html( $categories[0]->name ); } ?></span>
                <h3 class="news-list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="news-list-date"><?php echo get_the_date(); ?></p>
              </div>
            </article>
          <?php
              endwhile;
              wp_reset_postdata();
          endif;
          ?>
          </div><!-- /news-list -->

        </div><!-- /news-layout -->
      </div>
    </section>

    <!-- ═══════════════════ PARTNERS SECTION ═══════════════════ -->
    <section id="partners" class="partners-section" aria-label="Đối tác chiến lược">
      <div class="partners-header">
        <p class="partners-eyebrow"><?php echo function_exists("get_field") && get_field('partners_eyebrow', 'option') ? esc_html(get_field('partners_eyebrow', 'option')) : "Đối tác Chiến lược"; ?></p>
        <h2 class="partners-title"><?php echo function_exists("get_field") && get_field('partners_title', 'option') ? esc_html(get_field('partners_title', 'option')) : "Cùng Kiến tạo Tương lai"; ?></h2>
        <p class="partners-sub"><?php echo function_exists("get_field") && get_field('partners_description', 'option') ? esc_html(get_field('partners_description', 'option')) : "Hợp tác với các doanh nghiệp, tổ chức hàng đầu trong và ngoài nước để xây dựng hệ sinh thái công nghệ bền vững."; ?></p>
      </div>

      <!-- ROW 1: scroll left -->
      <div class="partners-track-wrap" aria-hidden="true">
        <div class="partners-track partners-track--left">
          <?php if ( function_exists('have_rows') && have_rows('partners_track_1', 'option') ) : ?>
            <!-- Set A -->
            <?php while ( have_rows('partners_track_1', 'option') ) : the_row(); 
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
            <?php while ( have_rows('partners_track_1', 'option') ) : the_row(); 
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

          <!-- Set A -->
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-labs.png"     alt="Aureus Lab" /></div>
          <div class="partner-logo-item partner-text-item"><span>Google Cloud</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-digital.png"  alt="Aureus Digital" /></div>
          <div class="partner-logo-item partner-text-item"><span>Microsoft Azure</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dip-tech-3d-cam.png"       alt="DIP Tech" /></div>
          <div class="partner-logo-item partner-text-item"><span>AWS</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-ventures.png" alt="Aureus Ventures" /></div>
          <div class="partner-logo-item partner-text-item"><span>Nvidia</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-holding.png"         alt="Aureus Holding" /></div>
          <div class="partner-logo-item partner-text-item"><span>Meta AI</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"   alt="Aureus Global" /></div>
          <div class="partner-logo-item partner-text-item"><span>OpenAI</span></div>
          <!-- Set B (duplicate for seamless loop) -->
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-labs.png"     alt="Aureus Lab" /></div>
          <div class="partner-logo-item partner-text-item"><span>Google Cloud</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-digital.png"  alt="Aureus Digital" /></div>
          <div class="partner-logo-item partner-text-item"><span>Microsoft Azure</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dip-tech-3d-cam.png"       alt="DIP Tech" /></div>
          <div class="partner-logo-item partner-text-item"><span>AWS</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-ventures.png" alt="Aureus Ventures" /></div>
          <div class="partner-logo-item partner-text-item"><span>Nvidia</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-holding.png"         alt="Aureus Holding" /></div>
          <div class="partner-logo-item partner-text-item"><span>Meta AI</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"   alt="Aureus Global" /></div>
          <div class="partner-logo-item partner-text-item"><span>OpenAI</span></div>
        
          <?php endif; ?>
        </div>
      </div>

      <!-- ROW 2: scroll right -->
      <div class="partners-track-wrap" aria-hidden="true">
        <div class="partners-track partners-track--right">
          <?php if ( function_exists('have_rows') && have_rows('partners_track_2', 'option') ) : ?>
            <!-- Set A -->
            <?php while ( have_rows('partners_track_2', 'option') ) : the_row(); 
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
            <?php while ( have_rows('partners_track_2', 'option') ) : the_row(); 
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

          <!-- Set A -->
          <div class="partner-logo-item partner-text-item"><span>Samsung SDS</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"   alt="Aureus Global" /></div>
          <div class="partner-logo-item partner-text-item"><span>FPT Software</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-holding.png"         alt="Aureus Holding" /></div>
          <div class="partner-logo-item partner-text-item"><span>Viettel Group</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-ventures.png" alt="Aureus Ventures" /></div>
          <div class="partner-logo-item partner-text-item"><span>VinAI</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dip-tech-3d-cam.png"       alt="DIP Tech" /></div>
          <div class="partner-logo-item partner-text-item"><span>Momo</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-digital.png"  alt="Aureus Digital" /></div>
          <div class="partner-logo-item partner-text-item"><span>Zalo</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-labs.png"     alt="Aureus Lab" /></div>
          <!-- Set B (duplicate) -->
          <div class="partner-logo-item partner-text-item"><span>Samsung SDS</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"   alt="Aureus Global" /></div>
          <div class="partner-logo-item partner-text-item"><span>FPT Software</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-holding.png"         alt="Aureus Holding" /></div>
          <div class="partner-logo-item partner-text-item"><span>Viettel Group</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-ventures.png" alt="Aureus Ventures" /></div>
          <div class="partner-logo-item partner-text-item"><span>VinAI</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/dip-tech-3d-cam.png"       alt="DIP Tech" /></div>
          <div class="partner-logo-item partner-text-item"><span>Momo</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-digital.png"  alt="Aureus Digital" /></div>
          <div class="partner-logo-item partner-text-item"><span>Zalo</span></div>
          <div class="partner-logo-item"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-labs.png"     alt="Aureus Lab" /></div>
        
          <?php endif; ?>
        </div>
      </div>

    </section>
<?php get_footer(); ?>
