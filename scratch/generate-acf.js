const fs = require('fs');

const generateKey = (prefix) => prefix + '_' + Math.random().toString(36).substr(2, 9);

const createField = (label, name, type, parentKey = '', extra = {}) => {
    return {
        key: generateKey('field'),
        label,
        name,
        type,
        instructions: '',
        required: 0,
        conditional_logic: 0,
        wrapper: { width: '', class: '', id: '' },
        ...extra
    };
};

const createRepeater = (label, name, sub_fields) => {
    return createField(label, name, 'repeater', '', {
        collapsed: '',
        min: 0,
        max: 0,
        layout: 'table',
        button_label: 'Thêm dòng mới',
        sub_fields
    });
};

const fields = [
    // Tab Hero
    createField('Tab Hero', 'tab_hero', 'tab'),
    createField('Từ khóa 1', 'hero_tag_1', 'text', '', { default_value: 'Intelligence' }),
    createField('Từ khóa 2', 'hero_tag_2', 'text', '', { default_value: 'Innovation' }),
    createField('Từ khóa 3', 'hero_tag_3', 'text', '', { default_value: 'Impact' }),
    createField('Tiêu đề chính', 'hero_title', 'textarea', '', { rows: 3 }),
    createField('Mô tả chính', 'hero_description', 'textarea', '', { rows: 3 }),
    createField('Hình ảnh 3D nổi', 'hero_main_image', 'image', '', { return_format: 'array', preview_size: 'medium' }),
    createField('Chữ nút Video', 'intro_video_text', 'text', '', { default_value: 'Xem Intro' }),
    createField('Thời lượng Video', 'intro_video_duration', 'text', '', { default_value: '01:35' }),

    // Tab Hệ sinh thái
    createField('Tab Hệ sinh thái', 'tab_ecosystem', 'tab'),
    createField('Tiêu đề Hệ sinh thái', 'eco_title', 'text'),
    createField('Mô tả Hệ sinh thái', 'eco_description', 'textarea', '', { rows: 3 }),
    createRepeater('Danh sách Mạng lưới (Nodes)', 'ecosystem_nodes', [
        createField('Là Node Trung Tâm?', 'is_center_node', 'true_false', '', { message: 'Chọn nếu đây là logo nằm giữa' }),
        createField('Vị trí Top (%)', 'position_top', 'text', '', { default_value: '50%' }),
        createField('Vị trí Left (%)', 'position_left', 'text', '', { default_value: '50%' }),
        createField('Logo', 'logo', 'image', '', { return_format: 'array', preview_size: 'thumbnail' }),
        createField('Tên Công ty', 'title', 'text'),
        createField('Mô tả ngắn', 'description', 'textarea', '', { rows: 2 }),
        createField('Thẻ tag (VD: Holding)', 'tag', 'text')
    ]),

    // Tab Các chỉ số
    createField('Tab Các chỉ số', 'tab_stats', 'tab'),
    createRepeater('Danh sách Chỉ số (Stats)', 'stats_list', [
        createField('Nổi bật (Màu đỏ)?', 'is_highlighted', 'true_false', '', { message: 'Tick để hiện màu đỏ' }),
        createField('Icon (Mã SVG)', 'icon_svg', 'textarea', '', { rows: 3 }),
        createField('Số liệu (Dành cho hiệu ứng nhảy số)', 'target_number', 'number'),
        createField('Ký tự hậu tố (+, PB...)', 'suffix', 'text'),
        createField('Văn bản hiển thị mặc định', 'display_text', 'text'),
        createField('Tiêu đề', 'title', 'text'),
        createField('Phụ đề', 'subtitle', 'text')
    ]),

    // Tab Công ty thành viên
    createField('Tab Công ty thành viên', 'tab_companies', 'tab'),
    createField('Tiêu đề Công ty', 'companies_title', 'text'),
    createField('Mô tả Công ty', 'companies_description', 'textarea', '', { rows: 3 }),
    createRepeater('Danh sách Công ty', 'companies_list', [
        createField('Logo', 'logo', 'image', '', { return_format: 'array', preview_size: 'thumbnail' }),
        createField('Tên Công ty', 'name', 'text'),
        createField('Lĩnh vực', 'category', 'text'),
        createField('Hình ảnh Cover', 'image', 'image', '', { return_format: 'array', preview_size: 'medium' }),
        createField('Mô tả', 'description', 'textarea', '', { rows: 4 }),
        createField('Link (Tìm hiểu thêm)', 'link', 'link', '', { return_format: 'array' })
    ]),

    // Tab Quan hệ cổ đông
    createField('Tab Cổ đông', 'tab_investor', 'tab'),
    createField('Tiêu đề Cổ đông', 'investor_title', 'text'),
    createField('Mô tả Cổ đông', 'investor_description', 'textarea', '', { rows: 3 }),
    createRepeater('Danh sách Trụ cột (Pillars)', 'investor_pillars', [
        createField('Icon (Mã SVG)', 'icon_svg', 'textarea', '', { rows: 3 }),
        createField('Tiêu đề', 'title', 'text'),
        createField('Phụ đề', 'subtitle', 'text')
    ]),

    // Tab Tin tức
    createField('Tab Tin tức', 'tab_news', 'tab'),
    createField('Tiêu đề nhỏ (Eyebrow)', 'news_section_eyebrow', 'text', '', { default_value: 'Tin tức & Sự kiện' }),
    createField('Tiêu đề chính', 'news_section_title', 'text', '', { default_value: 'Cập nhật mới nhất' }),
    createField('Chọn bài viết hiển thị', 'homepage_selected_news', 'relationship', '', { 
        instructions: 'Chọn tối đa 5 bài viết. Bài viết đầu tiên sẽ là bài nổi bật to nhất. Nếu bỏ trống, trang sẽ tự động lấy các bài viết mới nhất.',
        post_type: ['post'],
        taxonomy: '',
        filters: ['search', 'taxonomy'],
        return_format: 'id',
        min: 0,
        max: 5,
        elements: ['featured_image']
    }),

    // Tab Đối tác
    createField('Tab Đối tác', 'tab_partners', 'tab'),
    createField('Tiêu đề nhỏ (Eyebrow)', 'partners_eyebrow', 'text', '', { default_value: 'Đối tác Chiến lược' }),
    createField('Tiêu đề chính', 'partners_title', 'text', '', { default_value: 'Cùng Kiến tạo Tương lai' }),
    createField('Mô tả Đối tác', 'partners_description', 'textarea', '', { rows: 3 }),
    createRepeater('Hàng Đối tác 1', 'partners_track_1', [
        createField('Chỉ hiển thị chữ?', 'is_text_only', 'true_false'),
        createField('Văn bản (Nếu chỉ hiện chữ)', 'text', 'text'),
        createField('Logo (Nếu hiển thị ảnh)', 'logo', 'image', '', { return_format: 'array', preview_size: 'thumbnail' })
    ]),
    createRepeater('Hàng Đối tác 2', 'partners_track_2', [
        createField('Chỉ hiển thị chữ?', 'is_text_only', 'true_false'),
        createField('Văn bản (Nếu chỉ hiện chữ)', 'text', 'text'),
        createField('Logo (Nếu hiển thị ảnh)', 'logo', 'image', '', { return_format: 'array', preview_size: 'thumbnail' })
    ])
];

const acfGroup = {
    key: 'group_aureus_frontpage',
    title: 'Cấu hình Trang Chủ (Aureus Global)',
    fields: fields,
    location: [
        [
            {
                param: 'options_page',
                operator: '==',
                value: 'theme-general-settings'
            }
        ]
    ],
    menu_order: 1, // Order 1 so it appears after Header/Footer
    position: 'normal',
    style: 'default',
    label_placement: 'top',
    instruction_placement: 'label',
    hide_on_screen: '',
    active: true,
    description: 'Cấu hình nội dung cho trang chủ (Chuyển sang Options)'
};

const finalJSON = [acfGroup];

fs.writeFileSync('c:/Users/catmu/Downloads/template-aureus/acf-frontpage-export.json', JSON.stringify(finalJSON, null, 4), 'utf8');
console.log('ACF JSON Generated for Options Page.');
