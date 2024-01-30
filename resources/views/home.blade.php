<?php
//funzione che restituisce la data nel formato dd-MM-yyyy e il timestamp
function getDateTime($datetime)
{
    $date = strtotime($datetime);
    return [date('d-m-Y H:i', $date), $date];
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Train Station</title>
    <!-- css + js -->
    @vite('resources/js/app.js')
</head>

<body>
    <main class="container">
        <h1 class="text-center p-5">Train Station</h1>
        <form action="" method="get" class="d-flex align-items-center gap-2 mb-2 justify-content-end">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="all" id="flexCheckDefault" name="trains" @if (isset($get)) checked @endif>
                <label class="form-check-label" for="flexCheckDefault">
                  All Trains
                </label>
              </div>
            <button type="submit" class="btn btn-outline-primary btn-sm">Submit</button>
        </form>
        <table class="table table-striped border text-center">
            <thead>
                <tr>
                    <th scope="col">Train code</th>
                    <th scope="col">Company</th>
                    <th scope="col">Departure station</th>
                    <th scope="col">Arrival station</th>
                    <th scope="col">Departure time</th>
                    <th scope="col">Arrival time</th>
                    <th scope="col">Number of carriages</th>
                    <th scope="col">On Time</th>
                    <th scope="col">Cancelled</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    {{-- se il timestamp è maggiore o uguale a quello di oggi oppure se esiste la variabile get --}}
                    @if ((getDateTime($train['departure_time'])[1] >= time()) || isset($get))
                        <tr>
                            <th scope="row">{{ $train['train_code'] }}</th>
                            <td>{{ $train['company'] }}</td>
                            <td>{{ $train['departure_station'] }}</td>
                            <td>{{ $train['arrival_station'] }}</td>
                            <td>{{ getDateTime($train['departure_time'])[0] }}</td>
                            <td>{{ getDateTime($train['arrival_time'])[0] }}</td>
                            <td>{{ $train['number_of_carriages'] }}</td>
                            <td>{{ $train['is_on_time'] }}</td>
                            <td>{{ $train['is_cancelled'] }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </main>

</body>

</html>
