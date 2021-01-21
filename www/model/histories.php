<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_user_histories($db, $user_id) {
  $sql ="
    SELECT
        ec_hisrtoris.order.id
        ec_histories.created,
        SUM(ec_details.price *  ec_details.amount) AS ordertotal
    FROM
        ec_histories.order_id = ec_details.order.id
    WHERE
        user_id = ?
    GROUP BY
        order_id
    ORDER BY
        created desc
  ";
  return fetch_all_query($db, $sql, [$user_id]);
}

function get_manage_histories($db, $order_id) {
    $sql ="
      SELECT
          ec_hisrtoris.order.id
          ec_histories.created,
          SUM(ec_details.price *  ec_details.amount) AS ordertotal
      FROM
          ec_histories.order_id = ec_details.order.id
      WHERE
          user_id = ?
      GROUP BY
          order_id
      ORDER BY
          created desc
    ";
    return fetch_all_query($db, $sql, [$order_id]);
  }
  