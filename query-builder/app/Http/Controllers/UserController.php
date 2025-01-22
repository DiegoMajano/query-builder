<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Obtiene los pedidos del usuario con ID 2
    public function getOrdersById2(){

        $orders = DB::table('orders')->where('user_id', 2)->get();
        return response()->json($orders, 200);

    }

    // Obtiene todos los pedidos junto con la información del usuario
    public function getOrders(){

        $orders = DB::table('orders')->select()->join('users', 'user_id', '=', 'users.id')->get();
        return response()->json($orders, 200);

    }

    // Obtiene los pedidos cuyo total esté entre 100 y 150
    public function getOrdersByTotal(){

        $orders = DB::table('orders')->whereBetween('total', [100, 150])->get();
        return response()->json($orders, 200);

    }

    // Obtiene los usuarios cuyo nombre comienza con la letra 'R'
    public function getUsersWithNameStartsR(){

        $users = DB::table('users')->where('name', 'LIKE', 'R%')->get();
        return response()->json($users, 200);

    }

    // Obtiene todos los pedidos del usuario con ID 5
    public function getAllOrdersByUser5(){

        $orders = DB::table('orders')->where('user_id', 5)->get();
        return response()->json($orders, 200);

    }

    // Obtiene todos los pedidos ordenados por el total de forma descendente
    public function getAllOrdersData(){

        $orders = DB::table('orders')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->orderBy('orders.total', 'desc')
                    ->get(['orders.*', 'users.name as user_name']);
        return response()->json($orders, 200);

    }

    // Obtiene la suma total del campo 'total' de todos los pedidos
    public function getTotalOrdersSum(){

        $totalSum = DB::table('orders')->sum('total');
        return response()->json($totalSum, 200);

    }

    // Obtiene el pedido más económico junto con el nombre del usuario
    public function getCheapestOrder(){

        $cheapestOrder = DB::table('orders')
                            ->join('users', 'orders.user_id', '=', 'users.id')
                            ->orderBy('orders.total', 'asc')
                            ->first(['orders.*', 'users.name as user_name']);
        return response()->json($cheapestOrder, 200);
        
    }

    // Obtiene los productos, cantidad total y monto total de cada usuario, agrupados por usuario
    public function getOrderByUser(){

        $groupedOrders = DB::table('orders')
                            ->select('user_id', 
                                DB::raw('GROUP_CONCAT(product) as products'), 
                                DB::raw('SUM(quantity) as total_quantity'), 
                                DB::raw('SUM(total) as total_amount'))
                            ->groupBy('user_id')
                            ->get();
        return response()->json($groupedOrders, 200);
        
    }
}
