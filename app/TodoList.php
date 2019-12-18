<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo_lists';

    protected $colorCodeLists =
        [
            'research' => '#ffcc66',
            'system_design' => '#00ff99',
            'coding' => '#0066ff',
            'coordination' => '#cc66ff',
            'writing' => '#ffff00',
            'others' => '#75a3a3',
        ];

    /**
     *
     * カテゴリー名に応じてカラーコードを返します。
     *
     * @param $categoryName
     */
    public function toCategoryColor($categoryName): string
    {
        return $this->colorCodeLists[$categoryName];
    }
}
