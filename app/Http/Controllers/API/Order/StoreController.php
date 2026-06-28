<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $order = DB::transaction(function () use ($data) {
            $userId = $data['user_id'] ?? null;

            if (!$userId && $data['create_new_account']) {
                $userId = $this->createUser($data)->id;
            }

            $order = Order::create([
                'user_id' => $userId,
                'total_price' => $data['total_price'],
                'shipping_first_name' => $data['first_name'],
                'shipping_last_name' => $data['last_name'],
                'shipping_email' => $data['email'],
                'shipping_phone' => $data['phone'],
                'shipping_address_line' => $data['address_line'],
                'shipping_address_line_2' => $data['address_line_2'] ?? null,
                'shipping_city' => $data['city'],
                'shipping_state' => $data['state'],
                'shipping_country' => $data['country'],
                'shipping_postal_code' => $data['postcode'],
            ]);

            foreach ($data['items'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                ]);
            }

            return $order;
        });

        $this->sendOrderConfirmationEmail($order->load('items'));

        return $order;
    }

    private function createUser(array $data): User
    {
        $password = Str::random(12);
        $hash = Hash::make($password);

        $user = User::create([
            'name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $hash,
            'phone' => $data['phone'],
            'address' => $data['address_line'],
            'address_line_2' => $data['address_line_2'] ?? null,
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'postal_code' => $data['postcode'],
        ]);

        Log::info('New account created at checkout, sending password email', [
            'to' => $user->email,
            'subject' => 'Your new account password',
            'body' => "Welcome! An account has been created for you. Your password is: {$password}",
        ]);

        return $user;
    }

    private function sendOrderConfirmationEmail(Order $order): void
    {
        Log::info('Sending order confirmation email', [
            'to' => $order->shipping_email,
            'subject' => "Order #{$order->id} confirmation",
            'order' => $order->toArray(),
        ]);
    }
}
