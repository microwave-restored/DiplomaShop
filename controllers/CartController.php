<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\OrderProduct;
use app\models\Product;

const SECRET_KEY = 'eyJ2ZXJzaW9uIjoiUDJQIiwiZGF0YSI6eyJwYXlpbl9tZXJjaGFudF9zaXRlX3VpZCI6InIxYnI0ai0wMCIsInVzZXJfaWQiOiI3OTA2NDIzNzUxNSIsInNlY3JldCI6ImJkOTdmNThmZmYzN2FmYTA1NzkzNzQ1YWY0NDI0MDNlMjU1ZmFlNWY3NTBmY2IwNjI3NDUxZWU3ZDI4YWUyYmUifX0=';

class CartController extends AppController
{

    public function actionChangeCart()
    {
        $id = \Yii::$app->request->get('id');
        $qty = \Yii::$app->request->get('qty');
        $product = Product::findOne($id);
        if(empty($product)){
            return false;
        }
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionAdd($id)
    {
        $product = Product::findOne($id);
        if(empty($product)){
            return false;
        }
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        if(\Yii::$app->request->isAjax){
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionShow()
    {
        $session = \Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionDelItem()
    {
        $id = \Yii::$app->request->get('id');
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        if(\Yii::$app->request->isAjax){
            return $this->renderPartial('cart-modal', compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionClear()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->renderPartial('cart-modal', compact('session'));
    }

    public function actionCheckout()
    {
        $this->setMeta("Оформление заказа :: " . \Yii::$app->name);
        $session = \Yii::$app->session;

        $order = new Order();
        $order_product = new OrderProduct();
        if($order->load(\Yii::$app->request->post()))
        {
            $order->qty = $session['cart.qty'];
            $order->total = $session['cart.sum'];
            $transaction = \Yii::$app->getDb()->beginTransaction();
            if(!$order->save() || !$order_product->saveOrderProducts($session['cart'], $order->id))
            {
                $transaction->rollBack();
            }
            else
            {
                $billPayments = new \Qiwi\Api\BillPayments(SECRET_KEY);
                $transaction->commit();
                $cookies = \Yii::$app->response->cookies;
                $cookies->add(new \yii\web\Cookie([
                'name' => 'email',
                'value' => $order->email
                ]));
                $publicKey = '48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPwhXbWEZRhWPrAF4xuJ6GJ9SDZbDyb9YZwkAEiHxFQ4fSejZxjn7UafuRkQJbhcWMfFGEmN7gjYWdKViKkXcc9r4HY2PMc4igtP3FyA75e';
                $params = [
                'publicKey' => $publicKey,
                'amount' => $order->total,
                'billId' => $billId = $billPayments->generateId(),
                'lifetime' => $lifetime = $billPayments->getLifetimeByDay(1),
                'successUrl' => 'http://yii2.loc/cart/check',
                'email' => $order->email,
                ];
                $link = $billPayments->createPaymentForm($params);
                return $this->redirect($link);
            }
        }

        return $this->render('checkout', compact('session', 'order', 'order_product'));
    }

    public function actionCheck()
    {
        $this->setMeta("Оплата прошла успешно :: " . \Yii::$app->name);
        $home = '/home';
        $session = \Yii::$app->session;
        $session->open();
        $cookies = \Yii::$app->request->cookies;

        //return $this->render('check', compact('session', 'order', 'order_product'));
        return $this->render('check', ['session'=>$session, 'order'=>$order, 'email'=>$cookies->getValue('email')]);
	}

    public function actionPrint()
    {
        $home ='/home';
        $session = \Yii::$app->session;
        $session->open();

        if(empty($session['cart']))
        {
            return $this->redirect('/home');
		}
        
        $cookies = \Yii::$app->request->cookies;

            \Yii::$app->mailer->compose('order', ['session' => $session])
                ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName']])
                ->setTo($_COOKIE['email'])
                ->setSubject('Заказ на сайте')
                ->send();

        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        return $this->render('/home/index', ['session'=>$session, 'order'=>$order, 'email'=>$cookies->getValue('email')]);
	}

    public function actionHome()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        return $this->render('/home/index');
	}
}