<?php

namespace App\Helpers\Facades;
use App\Orders;
use App\ConnectionCount;

class GraphGenerate
{
    public function generate_order_graph($time_period){
        $start_date = $this->generate_start_date($time_period);
        $orders = Orders::where('creating_order_date','>',$start_date)->get();
        $date = array();
        $date[] = $start_date;
        $count = array();
        foreach ($orders as $order){
            if(!in_array($order->creating_order_date,$date)){
                $date[] = $order->creating_order_date;
                $count[$order->creating_order_date] = 1;
            }
            else{
                $count[$order->creating_order_date]++;
            }
        }
        return ['date' => $date,'count' => $count];
    }
    public function generate_connection_count_graph($time_period){
        $start_date = $this->generate_start_date($time_period);
        $connections = ConnectionCount::where('date','>',$start_date)->get();
        $date = array();
        $date[] = $start_date;
        $count = array();
        foreach ($connections as $connection){
            if(!in_array($connection->date,$date)){
                $date[] = $connection->date;
                $count[$connection->date] = $connection->connection_count;
            }
        }
        return ['date' => $date,'count' => $count];

    }
    private function generate_start_date($time_period){
        $date_elements  = explode(".",date("Y.m.d"));
        switch ($time_period){
            case 'month':
                $start_date = date('c', mktime(0,0,0,$date_elements[1],1,$date_elements[0]));
                break;
            case '3 months':
                $start_date = date('c', mktime(0,0,0,$date_elements[1] - 3,1,$date_elements[0]));
                break;
            case '6 months':
                $start_date = date('c', mktime(0,0,0,$date_elements[1] - 6,1,$date_elements[0]));
                break;
            case 'year':
                $start_date = date('c', mktime(0,0,0,$date_elements[1],1,$date_elements[0] - 1));
                break;
            default:
                $start_date = date('c', mktime(0,0,0,$date_elements[1] - 1,1,$date_elements[0]));
        }
        return substr($start_date,0,10);
    }
}