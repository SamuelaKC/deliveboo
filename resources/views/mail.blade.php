

<div class="container">

    <h3>
        Deliveboo
    </h3>
    <h1>Hai ricevuto un nuovo ordine!!!</h1>
    <div>Da parte di: {{ $order->name_surname }}</div>
    <div>Indirizzo: {{ $order->address }}</div>
    <div>Telefono: {{ $order->phone_number}}</div>
    <div>Dettagli Ordine: {{ $order->details }}</div>
    <hr>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome Piatto</th>
      <th scope="col">Quantità</th>
      <th scope="col">Aggiunte</th>
    </tr>
  </thead>
  <tbody>
  
      @foreach ($order->plate as $plate)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $plate->name }}</td>
            <td>{{ $plate->pivot->quantity }}</td>
            <td>{{ $plate->pivot->addition }}</td>
        </tr>
      
      @endforeach
     
  </tbody>
</table>

</div>