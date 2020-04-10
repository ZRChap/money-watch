<?php include 'header.php'; ?>

<div class="table-wrap">
    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Income</th>

        <?php populate_table_headers($db); ?>

        </tr>
    </thead>
    <tbody>

        <tr>
        <th scope="row">Week 1</th>
        <td>550</td>
        <?php populate_plan_table_data($db); ?>
        </tr>

        <tr>
        <th scope="row">Week 2</th>
        <td>550</td>
        <?php populate_plan_table_data($db); ?>
        </tr>

        <tr>
        <th scope="row">Week 3</th>
        <td>550</td>
        <?php populate_plan_table_data($db); ?>
        </tr>

        <tr>
        <th scope="row">Week 4</th>
        <td>550</td>
        <?php populate_plan_table_data($db); ?>
        </tr>

        <th scope="row">Totals</th>
        <td>2200</td>
        <?php populate_plan_table_data_totals($db); ?>
        </tr>

    </tbody>
    </table>
</div>
