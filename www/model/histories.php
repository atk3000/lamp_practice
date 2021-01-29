<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_user_histories($db, $user_id,$order_id = null) {
    $params = [$user_id];
  $sql ="
    SELECT
        ec_histories.order_id,
        ec_histories.created,
        SUM(ec_details.price *  ec_details.amount) AS ordertotal
    FROM
        ec_details
    JOIN
        ec_histories
    ON
        ec_histories.order_id = ec_details.order_id
    WHERE
        ec_histories.user_id = ?";
    if ($order_id !== null) {
        $sql .= " AND ec_histories.order_id = ?";
     $params[] = $order_id;
    }
    $sql .=
    " GROUP BY
        ec_details.order_id
    ORDER BY
        created desc
  ";
  return fetch_all_query($db, $sql, $params);
}

function get_manage_histories($db) {
    $sql ="
      SELECT
          ec_histories.order_id,
          ec_histories.created,
          SUM(ec_details.price *  ec_details.amount) AS ordertotal
      FROM
          ec_details
      JOIN
          ec_histories
      ON
          ec_histories.order_id = ec_details.order_id
      GROUP BY
          ec_details.order_id
      ORDER BY
          created desc
    ";
    return fetch_all_query($db, $sql);
  }
  