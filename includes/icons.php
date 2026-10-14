<?php
/* Inline SVG line icons (24x24, currentColor). Usage: <?= icon('scale') ?> */

function icon(string $name, string $class = 'ico'): string
{
    static $paths = [
        'compare'  => '<path d="M12 3v18M5 21h14"/><path d="m3 13 3-7 3 7a3.5 3.5 0 0 1-6 0Z"/><path d="m15 13 3-7 3 7a3.5 3.5 0 0 1-6 0Z"/><path d="M6 6h12"/>',
        'moon'     => '<path d="M20 14.5A8 8 0 1 1 9.5 4a6.5 6.5 0 0 0 10.5 10.5Z"/>',
        'truck'    => '<path d="M3 6h11v10H3zM14 9h4l3 3.5V16h-7"/><circle cx="7" cy="17.5" r="1.8"/><circle cx="17" cy="17.5" r="1.8"/>',
        'sort'     => '<path d="M4 6h11M4 12h8M4 18h5"/><path d="M18 5v14m0 0-3-3m3 3 3-3"/>',
        'mic'      => '<rect x="9" y="3" width="6" height="11" rx="3"/><path d="M5.5 11a6.5 6.5 0 0 0 13 0M12 17.5V21"/>',
        'shops'    => '<path d="M3 9.5 5 4h14l2 5.5"/><path d="M3 9.5a3 3 0 0 0 6 0 3 3 0 0 0 6 0 3 3 0 0 0 6 0"/><path d="M5 12v8h14v-8M10 20v-5h4v5"/>',
        'weight'   => '<path d="M6.5 8h11l2.5 12H4L6.5 8Z"/><circle cx="12" cy="5" r="2"/><path d="M10 14h4"/>',
        'khata'    => '<path d="M5 3h12a2 2 0 0 1 2 2v16H7a2 2 0 0 1-2-2V3Z"/><path d="M5 17a2 2 0 0 1 2-2h12M9 7h6M9 11h4"/>',
        'bell'     => '<path d="M6 16V11a6 6 0 0 1 12 0v5l1.5 2h-15L6 16Z"/><path d="M10 21h4"/>',
        'chime'    => '<path d="M6 16V11a6 6 0 0 1 12 0v5l1.5 2h-15L6 16Z"/><path d="M10 21h4M3 7.5A9 9 0 0 1 5.5 4M21 7.5A9 9 0 0 0 18.5 4"/>',
        'copy'     => '<rect x="8" y="8" width="12" height="12" rx="2"/><path d="M16 8V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2"/>',
        'list'     => '<rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4V3h6v1M9 10h6M9 14h6M9 18h3"/>',
        'receipt'  => '<path d="M6 3h12v18l-3-2-3 2-3-2-3 2V3Z"/><path d="M9 8h6M9 12h6M9 16h3"/>',
        'wallet'   => '<path d="M4 7a2 2 0 0 1 2-2h11v4"/><path d="M4 7v11a2 2 0 0 0 2 2h14V9H6a2 2 0 0 1-2-2Z"/><circle cx="16" cy="14.5" r="1.2"/>',
        'percent'  => '<path d="M19 5 5 19"/><circle cx="7" cy="7" r="2.5"/><circle cx="17" cy="17" r="2.5"/>',
        'pin'      => '<path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.5"/>',
        'shop'     => '<path d="M4 10v10h16V10M3 10l2-6h14l2 6H3Z"/><path d="M9.5 20v-5h5v5"/>',
        'tag'      => '<path d="M3 12V4h8l10 10-8 8L3 12Z"/><circle cx="7.5" cy="8" r="1.5"/>',
        'shield'   => '<path d="M12 3 5 6v5.5c0 4.5 3 8 7 9.5 4-1.5 7-5 7-9.5V6l-7-3Z"/><path d="m9 12 2 2 4-4"/>',
        'arrow'    => '<path d="M5 12h14m-5-5 5 5-5 5"/>',
        'left'     => '<path d="m15 5-7 7 7 7"/>',
        'right'    => '<path d="m9 5 7 7-7 7"/>',
        'search'   => '<circle cx="11" cy="11" r="6.5"/><path d="m16 16 4.5 4.5"/>',
        'clock'    => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
        'check'    => '<path d="m5 12.5 4.5 4.5L19 7.5"/>',
        'mail'     => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/>',
    ];
    return '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9"'
        . ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">'
        . ($paths[$name] ?? '') . '</svg>';
}
