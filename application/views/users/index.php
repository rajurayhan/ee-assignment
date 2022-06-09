<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Active and Verified Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container"> 
            <div class="row">
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Active Users</th>
                                <th>Active Users With Products</th>
                                <th>Active Products</th>
                                <th>Active Products With No User</th>
                                <th>Selected Active Products Quantity</th>
                                <th>Summerized Total Price</th>
                                <th>User Wise Price Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $active_users ?></td>
                                <td><?php echo $active_users_with_active_products ?></td>
                                <td><?php echo $active_products ?></td>
                                <td><?php echo $active_products_with_no_user ?></td>
                                <td><?php echo $selected_active_products_count ?></td>
                                <td><?php echo $summerized_total_price ?></td>
                                <td><?php 
                                    echo '<ul>';
                                    foreach ($user_wise_total as $key => $user_total) {
                                        echo "<li>Name: ".$user_total['name']." - ".$user_total['total_price']."</li>";
                                    }
                                    echo '</ul>';
                                ?></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>