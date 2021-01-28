<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_user_details($db, $order_id,$user_id){
  $sql="
  SELECT
        ec_details.price,
        ec_details.amount,
        ec_details.price * ec_details.amount AS sales_amount,
        items.name
      FROM
        ec_details
      JOIN
        items
      ON
        ec_details.item_id =  items.item_id
      WHERE
        order_id = ?
      AND exists(SELECT * FROM ec_histories WHERE order_id = ? AND user_id = ?)
        ";
   return fetch_all_query($db, $sql, [$order_id,$order_id,$user_id]);
  }
function get_manage_details($db, $order_id){
  $sql="
  SELECT
        ec_details.price,
        ec_details.amount,
        ec_details.price * ec_details.amount AS sales_amount,
        items.name
      FROM
        ec_details
      JOIN
        items
      ON
        ec_details.item_id =  items.item_id
      WHERE
        order_id = ?
        ";
  return fetch_all_query($db, $sql, [$order_id]);
}

function get_user_histories($db, $sql, $order_id, $user_id){
  $sql="
      SELECT 
        ec_histories.order_id, 
        created, 
        SUM(price * amount) AS total_amount
      FROM 
          ec_historis
      JOIN 
          ec_details 
      ON 
          ec_historis.order_id = ec_details.order_id
      WHERE 
          ec_histories.order_id = ? AND user_id = ?
      GROUP BY 
          ec_histories.order_id
          ";
    return fetch_all_query($db, $sql, [$order_id,$user_id]);
}

function get_manage_histories($db,$order_id) {
  $sql ="
      SELECT 
        ec_histories.order_id, 
        created, 
        SUM(price * amount) AS total_amount
      FROM 
        ec_historis
      JOIN 
        ec_details 
      ON 
        ec_historis.order_id = ec_details.order_id
      WHERE 
        ec_histories.order_id = ?
      GROUP BY 
        ec_histories.order_id
      ";
  return fetch_all_query($db, $sql,[$order_id]);
}