<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('user_sponsor')) {
    function user_sponsor() {
        $user = Auth::user();
        return $user->sponsor;
    }
}

if (!function_exists('buildTree')) {
    function buildTree(array $items, $parentId = 0) {
        $branch = array();
        foreach ($items as $item) {
            if ($item['parent_id'] == $parentId) {
                $children = buildTree($items, $item['id']);
                if ($children) {
                    $item['children'] = $children;
                }
                $branch[] = $item;
            }
        }
        return $branch;
    }
}