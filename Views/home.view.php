
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
        foreach ($viewData as $data) { ?>
            <tr>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $data['coin'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $data['rate_btc'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $data['limit'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $data['fee'] ?></td>
                <td class="col-md-1 col-sm-1" style="text-align: center"> <?= $data['created_at'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
