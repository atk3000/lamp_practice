<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_user_histories($db, $user_id) {
  $sql ="
    SELECT
        ec_hisrtoris.order_id
        ec_histories.created,
        SUM(ec_details.price *  ec_details.amount) AS ordertotal
    FROM
        ec_details
    JOIN
        ec_histories
    ON
        ec_histories.order_id = ec_details.order_id
    WHERE
        ec_histories.user_id = ?
    GROUP BY
        ec_details.order_id
    ORDER BY
        created desc
  ";
  return fetch_all_query($db, $sql, [$user_id]);
}

function get_manage_histories($db) {
    $sql ="
      SELECT
          ec_historis.order.id,
          ec_histories.created,
          SUM(ec_details.price *  ec_details.amount) AS ordertotal
      FROM
          ec_histories.order_id = ec_details.order.id
      GROUP BY
          order_id
      ORDER BY
          created desc
    ";
    return fetch_all_query($db, $sql);
  }
  