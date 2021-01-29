<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
</head>

<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細</h1>

  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if (count($header) > 0) { ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($header as $history) { ?>
            <tr>
              <td><?php print(h($history['order_id'])); ?></td>
              <td><?php print(h($history['created'])); ?></td>
              <td><?php print(h($history['total_amount'])); ?></td>
            </tr>
          <?php } ?>
        </tbody>
        <?php } else { ?>
      <p class="text-danger">注文履歴はありません。</p>
      <?php } ?>
      </table>

      <?php if (count($details) > 0) { ?>
        <table class="table table-bordered">
          <thead class="thead-light">
            <tr>
              <th>商品名</th>
              <th>価格</th>
              <th>購入数</th>
              <th>小計</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($details as $detail) { ?>
              <tr>
                <td><?php print(h($detail['name'])); ?></td>
                <td><?php print(h($detail['price'])); ?></td>
                <td><?php print(h($detail['amount'])); ?></td>
                <td><?php print(h($detail['sales_amount'])); ?></td>
              </tr>
            <?php } ?>
          <?php } else { ?>
            <p class="text-danger">商品の明細はありません。</p>
          <?php } ?>
          </tbody>
        </table>
</body>

</html>