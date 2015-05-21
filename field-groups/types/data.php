<?php 
$group = array (
  'key' => 'group_5469d2f5c7388',
  'title' => 'Types',
  'fields' => 
  array (
    0 => 
    array (
      'key' => 'field_5469d2f5c8e4b',
      'label' => 'Label',
      'name' => 'label',
      'prefix' => '',
      'type' => 'text',
      'instructions' => 'General name for the post type, usually plural. ',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    1 => 
    array (
      'key' => 'field_5469d2f5c8e98',
      'label' => 'Singular Label',
      'name' => 'singular_label',
      'prefix' => '',
      'type' => 'text',
      'instructions' => 'Name for one object of this post type. ',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    2 => 
    array (
      'key' => 'field_5469d2f5c8efa',
      'label' => 'Description',
      'name' => 'description',
      'prefix' => '',
      'type' => 'text',
      'instructions' => 'A short descriptive summary of what the post type is.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    3 => 
    array (
      'key' => 'field_5469d2f5c8f5b',
      'label' => 'Menu Position',
      'name' => 'menu_position',
      'prefix' => '',
      'type' => 'number',
      'instructions' => 'The position in the menu order the post type should appear.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'min' => 1,
      'max' => 200,
      'step' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    4 => 
    array (
      'key' => 'field_5469d2f5c8fbc',
      'label' => 'Menu Icon',
      'name' => 'menu_icon',
      'prefix' => '',
      'type' => 'text',
      'instructions' => 'The url to the icon to be used for this menu or the name of the icon from the iconfont',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    5 => 
    array (
      'key' => 'field_5469d2f5c901c',
      'label' => 'Show UI',
      'name' => 'show_ui',
      'prefix' => '',
      'type' => 'true_false',
      'instructions' => 'Whether to generate a default UI for managing this post type in the admin.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
    ),
    6 => 
    array (
      'key' => 'field_5469d2f5c90d2',
      'label' => 'Hierarchical',
      'name' => 'hierarchical',
      'prefix' => '',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 0,
    ),
    7 => 
    array (
      'key' => 'field_5469d2f5c9152',
      'label' => 'Supports',
      'name' => 'supports',
      'prefix' => '',
      'type' => 'checkbox',
      'instructions' => 'Registers support of certain feature(s) for a given post type.',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => 
      array (
        'title' => 'title',
        'editor' => 'editor',
        'author' => 'author',
        'thumbnail' => 'thumbnail',
        'excerpt' => 'excerpt',
        'trackbacks' => 'trackbacks',
        'custom-fields' => 'custom-fields',
        'comments' => 'comments',
        'revisions' => 'revisions',
        'page-attributes' => 'page-attributes',
        'post-formats' => 'post-formats',
      ),
      'default_value' => 
      array (
        'title' => 'title',
        'content' => 'content',
      ),
      'layout' => 'vertical',
    ),
    8 => 
    array (
      'key' => 'field_5469d2f5c91bd',
      'label' => 'Has Archive',
      'name' => 'has_archive',
      'prefix' => '',
      'type' => 'true_false',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => 
      array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'message' => '',
      'default_value' => 1,
    ),
  ),
  'location' => 
  array (
    0 => 
    array (
      0 => 
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'acf_type',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'seamless',
  'label_placement' => 'left',
  'instruction_placement' => 'field',
  'hide_on_screen' => '',
);