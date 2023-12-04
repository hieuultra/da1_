<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List total_revenue</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List total_revenue
            </div>
            <div class="card-body">

                <form action="?act=date" method="post">
                    <input type="date" name="dateod" id=""> &nbsp;
                    <input type="submit" class="btn btn-primary" value="CHECK" name="check">
                </form>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Date_order</th>
                            <th>Total_price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($total) ) {
                        ?>
                            <?php foreach ($total as $value) :
                                extract($value);
                            ?>
                                <tr>
                                    <td><?= $date_only ?></td>
                                    <td><?= number_format($total, 0, ",", ".") . '$' ?></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php
                        } else {; ?>
                            <?php if (isset($total1) && is_array($total1)) { ?>
                                <?php foreach ($total1 as $t) :
                                    extract($t) ?>

                                    <tr>
                                        <td><?= $date_order ?></td>
                                        <td><?=number_format($total, 0, ",", ".") . '$' ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</main>