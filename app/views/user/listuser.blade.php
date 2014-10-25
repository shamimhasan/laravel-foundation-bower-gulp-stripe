@extends('layouts.full-width')

@section('content')

<div class="row">
    <div class="small-12 column">
        <h2>Stripe User for Customer {{ $customer }}</h2>

    </div>
    <div class="small-12 column">
        <table>
            <tr>
                <th>ID</th>
                <th>customer_id</th>
                <th>user_id</th>
                <th>description</th>
                <th>email</th>
                <th>cards</th>
                <th>default_card</th>
            </tr>
            <?php
            foreach ($users as $user):
                echo "<tr>";
                echo "<td>" . $user->id . "</td>";
                echo "<td>" . $user->customer_id . "</td>";
                echo "<td>" . $user->user_id . "</td>";
                echo "<td>" . $user->description . "</td>";
                echo "<td>" . $user->email . "</td>";
                echo "<td>" . $user->cards . "</td>";
                echo "<td>" . $user->default_card . "</td>";
                echo "</tr>";
            endforeach;
            ?>
        </table>
    </div>
</div>
@stop