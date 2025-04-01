<?php

namespace App\Traits;

trait SlugCheck
{
    protected function getStorySlugExist($slug, $model, $slugField = 'slug', $idField = 'id', $itemId = null)
    {
        $query = $model::query()->where($slugField, '=', $slug);

        if ($itemId) {
            $query->where($idField, '!=', $itemId);
        }

        $existSlug = $query->first();

        if ($existSlug) {
            $slug = $slug . rand(1, 50);
            return $this->getStorySlugExist($slug, $model, $slugField, $idField, $itemId);
        }

        return $slug;
    }
}
