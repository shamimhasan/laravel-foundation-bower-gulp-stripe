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
                <th>Stripe User ID</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            foreach ($customers as $customer):
                echo "<tr>";
                echo "<td>" . $customer->id . "</td>";
                echo "<td>" . $customer->stripe_user_id . "</td>";
                echo "<td><a href='" . URL::to('alluser/' . $customer->id) . "'>Get All User</a></td>";
                echo "<td><a href='" . URL::to('listuser/' . $customer->id) . "'>List All User</a></td>";
                echo "</tr>";
            endforeach;
            ?>
        </table>
    </div>
</div>
@stop