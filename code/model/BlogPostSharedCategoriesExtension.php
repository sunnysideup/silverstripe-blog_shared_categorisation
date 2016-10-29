<?php

/**
 * extends BlogPost
 *
 */

class BlogPostSharedCategoriesExtension extends DataExtension
{
    private static $categories_checkboxes = true;

    private static $tags_checkboxes = true;
    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function UsedCategories()
    {
        return $this->owner->Parent()->UsedCategories();
    }

    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function UsedTags()
    {
        return $this->owner->Parent()->UsedTags();
    }

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        if (Config::inst()->get("BlogPostSharedCategoriesExtension", "categories_checkboxes") == true) {
            $fields->replaceField(
                "Categories",
                CheckboxSetField::create(
                    'Categories',
                    _t('BlogPost.Categories', 'Categories'),
                    BlogCategory::get()->sort(array('Title'=>'ASC'))->map("ID", "Title"),
                    $this->owner->Categories()
                )
            );
        }
        if (Config::inst()->get("BlogPostSharedCategoriesExtension", "tags_checkboxes") == true) {
            $fields->replaceField(
                "Tags",
                CheckboxSetField::create(
                    'Tags',
                    _t('BlogPost.Tags', 'Tags'),
                    BlogTag::get()->sort(array('Title'=>'ASC'))->map("ID", "Title"),
                    $this->owner->Tags()
                )
            );
        }
        return $fields;
    }
}
