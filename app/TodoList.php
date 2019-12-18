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

    protected $categoryLists =
        [
            'research' => '調査',
            'system_design' => 'システム設計',
            'coding' => 'コーディング',
            'coordination' => '調整業',
            'writing' => '文章作成業',
            'others' => 'そのほか',
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

    public function toJapaneseCategoryName($categoryName): string
    {
        return $this->categoryLists[$categoryName];
    }

    /**
     *
     *
     * @param  string  $value
     * @return string
     */
    public function getCategoryAttribute($value)
    {
        return $this->toJapaneseCategoryName($value);
    }
}
