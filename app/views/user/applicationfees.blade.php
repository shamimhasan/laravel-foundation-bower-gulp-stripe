@extends('layouts.full-width')

@section('content')

<div class="row">
    <div class="small-12 column">
        <h2>Stripe Application Fees</h2>

    </div>
    <div class="small-12 column">
        <table>
            <tr>
                <th>ID</th>
                <th>Charge ID</th>
                <th>Account</th>
                <th>Currency</th>
                <th>refunded</th>
            </tr>
            <?php
            foreach ($fees->data as $fee):
                echo "<tr>";
                echo "<td>" . $fee->id . "</td>";
                echo "<td>" . $fee->charge . "</td>";
                echo "<td>" . $fee->account . "</td>";
                echo "<td>" . $fee->currency . "</td>";
                echo "<td>" . ($fee->refunded) ? 'Yes' : 'No' . "</td>";
                echo "</tr>";
            endforeach;
            ?>
        </table>
    </div>
</div>
@stop