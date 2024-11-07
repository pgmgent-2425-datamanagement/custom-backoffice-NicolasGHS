<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\GuitarModel;
use App\Models\OrderGuitarModel;


class OrderController extends BaseController {

    public function index() {
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrders();

        $activeOrdersCount = $orderModel->countActiveOrders();
        $totalOrdersCount = $orderModel->countAllOrders();

        $this->loadView('/orders', [
            'title' => 'Orders',
            'orders' => $orders,
            'activeOrdersCount' => $activeOrdersCount,
            'totalOrdersCount' => $totalOrdersCount,

        ]);
    } 

    public function addOrderForm() {
        $guitarModel = new GuitarModel();
        $guitars = $guitarModel->getAllGuitars();

        $this->loadView('/add-order', [
            'title' => 'Nieuwe bestelling Toevoegen',
            'guitars' => $guitars
        ]);
    }

    public function storeOrder() {
        $user_id = $_POST['user_id'];
        $status = $_POST['status'];
        $price = $_POST['price'];
        $order_date = $_POST['order_date'];
        $guitars = $_POST['guitars'];

        $order = new OrderModel();
        $order->setUserId($user_id);
        $order->setStatus($status);
        $order->setPrice($price);
        $order->setOrderDate($order_date);
        $order->save();

        $orderId = $order->getOrderId();

        if (!empty($guitars)) {
            $orderGuitarModel = new OrderGuitarModel();  // Deze model moet je zelf maken als die nog niet bestaat
            foreach ($guitars as $guitarId) {
                $orderGuitarModel->addGuitarToOrder($orderId, $guitarId);
            }
        }

        header('Location: /orders');
        exit;
    }

    public function editOrderForm($orderId) {
        $orderModel = new OrderModel();
        $order = $orderModel->findById($orderId);

        if (!$order) {
            // Als order niet is gevonden -> terug naar lijst
            header('Location: /orders');
            exit;
        }

        $orderGuitarModel = new OrderGuitarModel();
        $guitars = $orderGuitarModel->getGuitarsForOrder($orderId);  

        $guitarModel = new GuitarModel();
        $allGuitars = $guitarModel->getAllGuitars();

        $this->loadView('/edit-order', [
            'title' => 'Bestelling Bewerken',
            'order' => $order,
            'guitars' => $allGuitars,
            'orderGuitars' => $guitars
        ]);
    }

    public function updateOrder($orderId) {
        $user_id = $_POST['user_id'];
        $status = $_POST['status'];
        $price = $_POST['price'];
        $order_date = $_POST['order_date'];

    
        $order = new OrderModel();
        $order->setUserId($user_id);
        $order->setOrderId($orderId);
        $order->setStatus($status);
        $order->setPrice($price);
        $order->setOrderDate($order_date);
        $order->update();
    
        header('Location: /orders');
        exit;
    }

    public function deleteOrder($orderId) {
        $orderGuitarModel = new OrderGuitarModel();
        $orderGuitarModel->deleteGuitarsFromOrder($orderId); 
           
        $order = new OrderModel();
        $order->setOrderId($orderId);  
        $order->delete();
    
        header('Location: /orders');
        exit;
    }

    public function dashboard() {
        $orderModel = new OrderModel();
        $activeOrdersCount = $orderModel->countActiveOrders();
    
        $this->loadView('/', [
            'title' => 'Dashboard',
            'activeOrdersCount' => $activeOrdersCount,
        ]);
    }
    


}