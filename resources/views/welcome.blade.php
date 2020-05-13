 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
       <tr>
            <td style="border: 1px solid red; text-align: center " >{{ $order->get_product->product_name}}</td>
            <td style="border: 1px solid red; text-align: center " >{{ $order->product_price}}</td>
            <td style="border: 1px solid red; text-align: center " >{{ $order->product_quantity}}</td>
        </tr>

     @endforeach
    </tbody>
  </table>
