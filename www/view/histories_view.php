<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
</head>

<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if (count($histories) > 0) { ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>明細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($histories as $history) { ?>
            <tr>
              <td><?php print(h($history['order_id'])); ?></td>
              <td><?php print(h($history['created'])); ?></td>
              <td><?php print(h($history['ordertotal'])); ?></td>
              <td>
                <form action="details.php" method="post">
                  <input type="submit" value="購入明細表示" class="btn btn-primary btn-block">
                  <input type="hidden" name="order_id" value="<?php print(h($history['order_id'])); ?>">
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p class="text-danger">注文履歴はありません。</p>
    <?php } ?>
  </div>
</body>

</html>