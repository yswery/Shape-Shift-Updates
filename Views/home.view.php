<?php

    foreach ($viewData as $key => $value) { ?>
        <legend><?= $key ?></legend>
<div class="table">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th style="text-align: center">Coin</th>
            <th style="text-align: center">Rate_BTC</th>
            <th style="text-align: center">Limit</th>
            <th style="text-align: center">Fee</th>
            <th style="text-align: center">Time</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($value as $d) { ?>
            <tr>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $d['coin'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $d['rate_btc'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $d['limit'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $d['fee'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $d['created_at'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>