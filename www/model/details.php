<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_detail($db, $order_id){
  $sql="
  SELECT
        ec_details.price,
        ec_details.amount,
        ec_details.created,
        SUM(ec_details.price * ec_details.amount) AS total,
        items.name
      FROM
        ec_details
      JOIN
        items
      ON
        ec_details.item_id =  items.item_id
      WHERE
        order_id = ?
      GROUP BY
      ec_details.price, ec_details.amount, ec_details.created, items.name
        ";
  return fetch_all_query($db, $sql, [$order_id]);
}