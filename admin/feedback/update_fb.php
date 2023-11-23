<?php
if (is_array($suafb)) {
    extract($suafb);
}
?>
<div class="container-fluid mt-4 px-4">
    <h1 class="mt-4">Update Feedback</h1>
    <form action="?act=update_fb" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <!-- <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Infor_user</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Name_user:<?= $suafb[0]['name_user'] ?></h6>
                </div>
            </div>
        </div> -->
        <div class="card-body">
            <table id="datatablesSimple">
                <tbody>
                    <div class="mb-3">
                        <label class="form-label">Status_Feedback</label>
                        <select class="form-select" name="id_status_fb">
                            <?php
                            foreach ($dsstfb as $ds) {

                                if ($ds['id_status_fb'] == $id_status_fb) $s = "selected";
                                else $s = "";
                                echo '<option value="' . $ds['id_status_fb'] . '" ' . $s . '>' . $ds['name_fb'] . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                </tbody>
            </table>
        </div>



        <input type="submit" class="btn btn-primary" value="Update" name="editfb">
        <a href="?act=list_fb">
            <input type="button" class="btn btn-primary" value="Lisr_Feedback">
        </a>
    </form>
</div>