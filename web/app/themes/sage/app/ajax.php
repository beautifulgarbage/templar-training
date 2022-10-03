<?php

namespace App;


function ajax_load_search() {
  //$search_term       = $_GET['search_term'];
    echo(true);
  //echo \Roots\view('partials/ajax/search-results', ['search_term' => $search_term] );
  die();
}

add_action('wp_ajax_nopriv_ajax_load_search', __NAMESPACE__ . '\\ajax_load_search');
add_action('wp_ajax_ajax_load_search', __NAMESPACE__ . '\\ajax_load_search');