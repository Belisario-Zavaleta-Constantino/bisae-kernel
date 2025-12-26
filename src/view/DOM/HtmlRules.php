<?php
final class HtmlRules
{
    public const VOID_ELEMENTS = [
        'br', 'img', 'input', 'meta', 'link', 'hr'
    ];

    public const REQUIRED_PARENTS = [
        'li' => ['ul', 'ol'],
        'tr' => ['table', 'thead', 'tbody', 'tfoot'],
        'td' => ['tr'],
        'th' => ['tr'],
    ];

    public const ALLOWED_CHILDREN = [
        'ul' => ['li'],
        'ol' => ['li'],
        'table' => ['thead', 'tbody', 'tfoot', 'tr'],
        'tr' => ['td', 'th'],
    ];
}
