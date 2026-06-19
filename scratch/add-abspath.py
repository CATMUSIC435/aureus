import os

directory = 'aureus-theme'
abspath_line = "if ( ! defined( 'ABSPATH' ) ) exit;\n"

for root, dirs, files in os.walk(directory):
    for file in files:
        if file.endswith('.php'):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            # Check if ABSPATH already exists
            if "defined( 'ABSPATH' )" not in content and "defined('ABSPATH')" not in content:
                # Find the first <?php and insert after it
                if content.startswith('<?php'):
                    parts = content.split('<?php', 1)
                    new_content = '<?php\n' + abspath_line + parts[1]
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
                elif '<?php' in content:
                    parts = content.split('<?php', 1)
                    new_content = parts[0] + '<?php\n' + abspath_line + parts[1]
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
print("ABSPATH checks added.")
