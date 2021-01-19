

--購入明細テーブル--
CREATE TABLE `ec_histories` (
    `order_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ec_histories`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--購入詳細テーブル--
CREATE TABLE `ec_details` (
    `order_id` int(11) NOT NULL,
    `item_id` int(11) NOT NULL,
    `amount` int(11) NOT NULL,
    `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ec_details`
  ADD PRIMARY KEY (order_id, item_id),
  ADD KEY `item_id` (`item_id`);