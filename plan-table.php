
<div class="table-wrap">
    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Income</th>

        <?php populate_table_headers($db, "plan"); ?>

        <th scope="col">Week Total</th>
        <th scope="col">Spending Money</th>
        
        </tr>
    </thead>
    <tbody>
        <?php populate_table_data($db, "plan"); ?>

        <tr>
        
        <th scope="row">Totals</th>

        <?php populate_table_data_totals($db, "plan"); ?>

        </tr>
    </tbody>
    </table>
</div>