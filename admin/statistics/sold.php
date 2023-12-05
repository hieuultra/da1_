<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List products_sold</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List products_sold
            </div>
            <div class="card-body">

                <form action="?act=datesold" method="post">
                    <input type="date" name="date" id=""> &nbsp;
                    <input type="submit" class="btn btn-primary" value="CHECK" name="check">
                </form>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Date_order</th>
                            <th>Total_quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($totals) ) {
                        ?>
                            <?php foreach ($totals as $value) :
                                extract($value);
                                
                            ?>
                                <tr>
                                    <td><?= $date_only ?></td>
                                    <td><?= number_format($quan, 0, ",", ".")  ?></td>
                                </tr>

                            <?php endforeach; ?>
                        <?php
                        } else {; ?>
                            <?php if (isset($totalsold) && is_array($totalsold)) { ?>
                                <?php foreach ($totalsold as $t) :
                                    extract($t) ?>

                                    <tr>
                                        <td><?= $date_order ?></td>
                                        <td><?=number_format($quan, 0, ",", ".")  ?></td>
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