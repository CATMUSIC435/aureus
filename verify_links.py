import re, sys
sys.stdout.reconfigure(encoding='utf-8')

files = ['index.html','index2.html','index3.html','index4.html',
         'index5.html','index6.html','index7.html','index8.html']

for fname in files:
    content = open(fname, encoding='utf-8').read()
    print('=== ' + fname + ' ===')
    # Check desktop nav links
    matches = re.findall(r'data-nav="([^"]+)"[^>]*>([^<]+)<', content)
    for nav_val, text in matches:
        # find corresponding href
        href_match = re.search(r'href="([^"]+)"\s+data-nav="' + re.escape(nav_val) + '"', content)
        if not href_match:
            href_match = re.search(r'data-nav="' + re.escape(nav_val) + r'"[^>]*href="([^"]+)"', content)
        href = href_match.group(1) if href_match else '?'
        print('  ' + nav_val.ljust(22) + '-> href=' + href)
    print()
