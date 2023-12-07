<?php 
    function payment_momo($partnerCode, $orderId, $amount, $orderInfo, $orderType, $transId, $payType) {
        $sql = "INSERT INTO `payment_momo` (`partner_code`, `order_id`, `amount`, `order_info`, `order_type`, `trans_id`, `pay_type`) 
        VALUES ('$partnerCode', '$orderId', '$amount', '$orderInfo', '$orderType', '$transId', '$payType');";
        pdo_execute($sql);
    }
?>