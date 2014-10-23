@extends('layouts.full-width')

@section('content')

<div class="row">
    <div class="small-12 column">
        <h2>Stripe Customers</h2>

    </div>
    <div class="small-12 column">
        <table>
            <tr>
                <th>ID</th>
                <th>Description</th>
            </tr>
            <?php
            foreach ($customers->data as $customer):
                echo "<tr>";
                echo "<td>" . $customer->id . "</td>";
                echo "<td>" . $customer->description . "</td>";
                echo "</tr>";
            endforeach;
            ?>
        </table>
    </div>
</div>
@stop