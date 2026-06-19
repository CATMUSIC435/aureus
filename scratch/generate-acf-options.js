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
    createField('Tab Header', 'tab_header', 'tab'),
    createField('Chữ Placeholder Tìm Kiếm', 'header_search_placeholder', 'text', '', { default_value: 'Tìm kiếm...' }),

    createField('Tab Footer (Chung)', 'tab_footer_general', 'tab'),
    createField('Mô tả Footer (Dưới Logo)', 'footer_description', 'textarea', '', { rows: 3 }),
    createRepeater('Mạng xã hội (Socials)', 'footer_socials', [
        createField('Icon (Mã SVG)', 'icon_svg', 'textarea', '', { rows: 3 }),
        createField('Đường link (URL)', 'link', 'url')
    ]),

    createField('Tab Cột Menu (Footer Columns)', 'tab_footer_cols', 'tab', '', { instructions: 'Lưu ý: Để sửa các đường link bên trong cột, vui lòng vào "Giao diện > Menu". Dưới đây chỉ là chỗ đổi Tên cột.' }),
    createField('Tiêu đề Cột 1', 'footer_col_1_title', 'text', '', { default_value: 'Hệ Sinh Thái' }),
    createField('Tiêu đề Cột 2', 'footer_col_2_title', 'text', '', { default_value: 'Công nghệ' }),
    createField('Tiêu đề Cột 3', 'footer_col_3_title', 'text', '', { default_value: 'Đầu tư' }),
    createField('Tiêu đề Cột 4', 'footer_col_4_title', 'text', '', { default_value: 'Quan hệ Cổ đông' }),
    createField('Tiêu đề Cột 5', 'footer_col_5_title', 'text', '', { default_value: 'Về Chúng Tôi' }),
    createField('Tiêu đề Cột 6', 'footer_col_6_title', 'text', '', { default_value: 'Tuyển dụng' }),

    createField('Tab Bản quyền & Liên hệ', 'tab_footer_legal', 'tab'),
    createField('Dòng Bản quyền (Copyright)', 'footer_copyright', 'text', '', { default_value: '© {year} AUREUS GLOBAL. All rights reserved.', instructions: 'Sử dụng {year} để hiển thị năm hiện tại tự động.' }),
    createRepeater('Các link pháp lý (Chính sách...)', 'footer_legal_links', [
        createField('Tiêu đề', 'title', 'text'),
        createField('Đường link (URL)', 'url', 'url')
    ]),
    createField('Email Liên hệ', 'contact_email', 'email', '', { default_value: 'contact@aureus.global' }),
    createField('Số điện thoại Liên hệ', 'contact_phone', 'text', '', { default_value: '+84 28 7310 8888' })
];

const acfGroup = {
    key: 'group_aureus_options',
    title: 'Tùy chỉnh Theme (Header & Footer)',
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
    menu_order: 0,
    position: 'normal',
    style: 'default',
    label_placement: 'top',
    instruction_placement: 'label',
    hide_on_screen: '',
    active: true,
    description: 'Cấu hình các thành phần dùng chung như Header và Footer'
};

const finalJSON = [acfGroup];

fs.writeFileSync('c:/Users/catmu/Downloads/template-aureus/acf-options-export.json', JSON.stringify(finalJSON, null, 4), 'utf8');
console.log('ACF Options JSON Generated.');
