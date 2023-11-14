<style>
    #i {
        margin-left: 600px;
    }

    /* #t {
        margin-left: 160px;
    } */
</style>

<body>
    <div class="container-fluid px-4">
        <h1 class="mb-4" id="i">Bill_detail</h1>
        <div class="card mb-4">
            <div class="card-body" id="t">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name_pro</th>
                            <th>Image_pro</th>
                            <th>Price_pro</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <?php
                        foreach ($spbill as $sp) {
                            extract($sp);
                            $tt = $price_pro - (($price_pro * $discount) / 100);
                            $hinhpath = "./upload/" . $image_pro;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src='" . $hinhpath . "' height='70'>";
                            } else {
                                $hinh = "No photo";
                            }
                            echo ' <tr>
                            <td>' . $name_pro . '</td>
                            <td>' . $hinh . '</td>
                            <td>' . number_format($tt, 0, ",", ".") . '$' . '</td>
                            <td>' . $quantity . '</td>
                            <td>' . number_format($total, 0, ",", ".") . '$' . '</td>
                                     </tr>';
                        }
                    
                    ?>

                </table>
            </div>
        </div>
    </div>