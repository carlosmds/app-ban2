<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function orders()
    {
        $orderData = DB::select("
            select 
                o.id AS order_id,
                COUNT(oi.id) AS items_quantity, 
                IFNULL(SUM((r.days_of_rent * g.day_rental_value)), 0) AS rental_value, 
                IFNULL(SUM(IF((p.id = NULL), 0, (g.value - (g.value * (COALESCE(p.discount, 0))/100)))), 0) AS purchase_value
            from orders o 
                left join order_items oi on oi.order_id = o.id 
                left join games g on oi.game_id = g.id
                left join purchases p on oi.purchase_id = p.id
                left join rentals r on oi.rental_id = r.id 
            group by o.id
        ");

        return $orderData;
    }

    public function games()
    {
        $gamesData = DB::select("
            select
                g.id AS game_id,
                g.name AS game_name,
                IFNULL(SUM(r.days_of_rent), 0) AS days_rented,
                COUNT(oi.purchase_id) AS purchases_quantity
            from
                games g 
                join order_items oi on oi.game_id = g.id
                left join rentals r on oi.rental_id = r.id 
            group by g.id, g.name
        ");

        return $gamesData;
    }

    public function customers()
    {
        $customersData = DB::select("
            select 
                c.id as customer_id, 
                c.name as customer_name, 
                c.date_of_birth as cusomter_date_of_birth,
                COUNT(o.id) as orders_quantity,
                COUNT(oi.purchase_id) as purchases_quantity,
                COUNT(oi.rental_id) as rentals_quantity
            from 
                customers c 
                left join orders o on o.customer_id = c.id
                left join order_items oi on o.id = oi.order_id
            group by c.id, c.name, c.date_of_birth 
        ");

        return $customersData;
    }
}
