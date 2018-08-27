<?php
/*******************************************************************************
 カスタム投稿タイプ -- スタッフ
********************************************************************************/

function ing_register_colum_post_type() {
  register_post_type( 'colum', //投稿タイプ名
   array(
    'label' => 'colum',  //投稿タイプを翻訳するための複数形の名前
    'labels' =>
    array(
      'name' => __( 'コラム' ),  //投稿タイプの一般名
      'singular_name' => __( 'コラム' ),  //この投稿タイプのオブジェクト1個の名前
      'menu_name' => __( 'コラム' ),  //メニュー項目の名前
      'all_items' => __( 'すべてのコラム' ),  //メニューの「すべての〜」に使うテキスト
      'add_new' => __( '新規作成' ),  //新規追加」のテキスト
      'add_new_item' => __( '新しいコラムの作成' ),  //「新規〜を追加」のテキスト
      'edit_item' => __( 'コラムを編集' ),  //〜を編集」のテキスト
      'new_item' => __( '新しいコラム' ),  //「新規〜」のテキスト
      'view_item' => __( 'コラムを編集します' ),  //「〜を表示」のテキスト
      'search_items' => __( '検索' ),  //「〜を検索」のテキスト
      'not_found' =>  __( 'コラムはありません' ),  //「〜が見つかりませんでした」のテキスト
      'not_found_in_trash' => __( 'ごみ箱にコラムはありません' ),  //ゴミ箱内に〜が見つかりませんでした」のテキスト
      'featured_image' => __( 'アイキャッチ画像' ),
      'set_featured_image' => __( 'アイキャッチ画像を設定' ),
      'remove_featured_image' => __( 'アイキャッチ画像を削除' ),
      'use_featured_image' => __( 'アイキャッチ画像に使用' ),
      'filter_items_list' => __( 'コラム一覧を絞り込む' ),
      'items_list' => __( 'コラム一覧' ),
    ),
    'public' => true,
    'exclude_from_search' => false,//この投稿タイプの投稿をフロントエンドの検索結果から除外するかどうか
    'show_ui' => true,//この投稿タイプを管理するデフォルト UI を生成するかどうか。
    'show_in_menu' => true,
    'menu_position' => 9,
    'menu_icon' => 'dashicons-edit',
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array( 'title','editor','thumbnail' ),
    'has_archive' => true,
    'rewrite' => array( 'slug' => '', 'with_front' => false ),
  ));
}
add_action( 'init', 'ing_register_colum_post_type' );


// パーマリンク設定
function ing_register_colum_permalinks($link, $post){
  if($post->post_type === 'colum'){
    return home_url('/colum/'.$post->ID . '.html');
  } else {
    return $link;
  }
}
add_filter( 'post_type_link', 'ing_register_colum_permalinks', 1, 2 );


// パーマリンク リライトルール設定
function ing_add_colum_rewrite_rules($rules){
  $new_rule = array(
    'colum/([0-9]+)/?.html$' => 'index.php?post_type=colum&p=$matches[1]'
  );
  return $new_rule + $rules;
}
add_filter( 'rewrite_rules_array', 'ing_add_colum_rewrite_rules' );

?>
