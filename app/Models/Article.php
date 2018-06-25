<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    /**
     * 关联分类表
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 关联标签表
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tag()
    {
        return $this->belongsToMany(Tag::class,'article_tags');
    }

    public function storeData($params)
    {
        // 如果没有描述;则截取文章内容的前200字作为描述
        if (empty($params['description'])) {
            $description = preg_replace(array('/[~*>#-]*/', '/!?\[.*\]\(.*\)/', '/\[.*\]/'), '', $params['content']);
            $data['description'] = re_substr($description, 0, 200, true);
        }

        $tag_ids = $params['tag_ids'];
        unset($params['tag_ids']);
        $params['category_id'] = intval($params['category_id']);

        //添加数据
//        dd($params);
        $result = self::create($params);
        if ($result) {
            // 给文章添加标签
            $articleTag = new ArticleTag();
            $articleTag->addTagIds($result, $tag_ids);
            return $result;
        }else{
            return false;
        }
    }
}
