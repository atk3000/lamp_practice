<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>購入履歴</title>
  </head>
  <body>
    <h1>購入履歴</h1>
    <table>
    <thead>
        <tr>
          <th>注文番号</th>
          <th>購入日時</th>
          <th>合計金額</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($histories as $history){ ?>
        <tr>
          <td><?php print(h($history['order_id'])); ?></td>
          <td><?php print(h($history['created'])); ?></td>
          <td></td>
          <td></td>
          <td>
          <form method="post" action="">
            <input type="submit" value="購入明細表示" class="btn btn-primary btn-block">
            <input type="hidden" name="order_id"
            value="<?php print(h($history['order_id']));?>">
          </form>
          </td>
        </tr>
       <?php } ?>
      </tbody>
    </table>

    <table>
      <thead>
        <tr>
          <th>商品名</th>
          <th>商品価格</th>
          <th>購入数</th>
          <th>小計</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($details as $detail){ ?>
        <tr>
          <td><?php print($detail['name']); ?></td>
          <td><?php print($detail['price']); ?></td>
          <td><?php print($detail['amount']); ?></td>
          <td><?php print($detail['ordertotal']); ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </body>
</html>
  </body>
</html>