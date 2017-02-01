<?php

/**
 * extends Blog
 *
 */


class BlogSharedCategoriesExtension extends DataExtension
{
    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName("Categories");
        $fields->removeByName("Tags");
        $fields->addFieldsToTab(
            "Root.Categorisation",
            array(
                GridField::create(
                    "Categories",
                    "Categories",
                    $this->owner->Categories(),
                    GridFieldConfig_RecordEditor ::create()
                )
            )
        );
        $fields->addFieldsToTab(
            "Root.Tags",
            array(
                GridField::create(
                    "Tags",
                    "Tags",
                    $this->owner->Tags(),
                    GridFieldConfig_RecordEditor ::create()
                )
            )
        );
    }

    /**
     *
     * @return DataList
     */
    public function UsedCategories()
    {
        $categories = BlogCategory::get()
            ->filter(array('BlogID' => $this->owner->ID))
            ->sort(array('Title' => 'ASC'));
        foreach ($categories as $category) {
            if ($category->BlogPosts()->count() == 0) {
                $categories = $categories->exclude(array('BlogCategory.ID' => $category->ID));
            }
        }

        return $categories;
    }

    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function UsedTags()
    {
        $tags = BlogTag::get();
        foreach ($tags as $tag) {
            if ($tag->BlogPosts()->count() == 0) {
                $tags = $tags->exclude(array('BlogTag.ID' => $tag->ID));
            }
        }
        return $tags;
    }


    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function Tags()
    {
        return BlogTag::get();
    }

    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function Categories()
    {
        return BlogCategory::get();
    }

    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function getTags()
    {
        return BlogTag::get();
    }

    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function getCategories()
    {
        return BlogCategory::get();
    }
}
