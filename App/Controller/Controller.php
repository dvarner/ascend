<?php namespace App\Controller;

use Ascend\Core\BaseController;
use App\Model\ForumCategories;

class Controller extends BaseController {

    /**
     * Forum
     */
    public function getCategoryListById($categoryId = null) {

        // forum_categories (id, parent_id, organize_id, name, detail)

        $cat = ForumCategories::where('parent_id', '=', $categoryId)
            ->orderBy('organized_id', asc)
            ->get();

        return $cat;
    }
}